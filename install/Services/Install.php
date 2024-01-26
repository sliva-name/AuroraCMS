<?php

namespace Install\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Install\Helpers\DatabaseManager;
use Install\Helpers\PermissionChecker;
use Install\Helpers\RequirementsChecker;
use Install\Requests\InstallRequest;

class Install
{
    public function installRequirementsCheck(RequirementsChecker $requirementsChecker): \Illuminate\Support\Collection
    {
        return $requirementsChecker->checkExtensions([
            'ctype', 'curl', 'dom', 'fileinfo', 'filter', 'hash', 'mbstring',
            'openssl', 'pcre', 'pdo', 'session', 'tokenizer', 'xml'
        ]);
    }

    public function installPermissionFolderCheck(PermissionChecker $permissionFolderCheker): \Illuminate\Support\Collection
    {
        return $permissionFolderCheker->checkPermission([
            storage_path('framework'),
            storage_path('logs'),
            base_path('bootstrap/cache'),
        ]);
    }

    /**
     * @throws \Exception
     */
    public function installDB(InstallRequest $request, DatabaseManager $databaseManager): void
    {
        $config = json_encode([
            'DB_CONNECTION' => $request->input('db_type'),
            'DB_HOST' => $request->input('db_host') ?? '127.0.0.1',
            'DB_PORT' => $request->input('db_port') ?? 3306,
            'DB_DATABASE' => $request->input('db_name'),
            'DB_USERNAME' => $request->input('db_user'),
            'DB_PASSWORD' => $request->input('db_password')
        ]);

        File::put(config_path('database.json'), $config);

        if (!$databaseManager->checkDatabaseConnection($request)) {
            throw new \Exception('Невозможно установить соединение с базой данных');
        }

        $databaseManager->migrateAndSeed();
    }
    public function createAdmin(InstallRequest $request): void
    {
        $adminEmail = $request->input('admin_email');
        $adminName = $request->input('admin_name');
        $adminPassword = $request->input('admin_password');

        Artisan::call('moonshine:user', [
            '--username' => $adminEmail,
            '--name' => $adminName,
            '--password' => $adminPassword
        ]);
    }

    public function installApp(string $appName): void
    {
        env_put([
            'ADMIN_TITLE' => $appName,
            'APP_NAME' => $appName,
        ]);
        Artisan::call('key:generate');
        Artisan::call('storage:link');
        //Artisan::call('optimize');
    }


}
