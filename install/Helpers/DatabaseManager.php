<?php

namespace Install\Helpers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Install\Requests\InstallRequest;
use Symfony\Component\Console\Output\BufferedOutput;

class DatabaseManager
{
    public function migrateAndSeed(): array
    {
        $outputLog = new BufferedOutput;

        return $this->migrate($outputLog);
    }
    private function migrate(BufferedOutput $outputLog): array
    {
        try {
            Artisan::call('migrate', ['--force'=> true], $outputLog);
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 'error', $outputLog);
        }

        return $this->seed($outputLog);
    }
    public function checkDatabaseConnection(InstallRequest $request): bool
    {
        $connection = $request->input('db_type');

        $settings = config("database.connections.$connection");

        config([
            'database' => [
                'default' => $connection,
                'migrations' => 'migrations',
                'connections' => [
                    $connection => array_merge($settings, [
                        'driver' => $connection,
                        'host' => $request->input('db_host') ?? '127.0.0.1',
                        'port' => $request->input('db_port') ?? 3306,
                        'database' => $request->input('db_name'),
                        'username' => $request->input('db_user'),
                        'password' => $request->input('db_password'),
                    ]),
                ],
            ],
        ]);

        DB::purge();

        try {
            DB::connection()->getPdo();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    private function seed(BufferedOutput $outputLog): array
    {
        try {
            Artisan::call('db:seed', ['--force' => true], $outputLog);
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 'error', $outputLog);
        }

        return $this->response(trans('Миграция прошла'), 'success', $outputLog);
    }
    private function response($message, $status, BufferedOutput $outputLog): array
    {
        return [
            'status' => $status,
            'message' => $message,
            'dbOutputLog' => $outputLog->fetch(),
        ];
    }

}
