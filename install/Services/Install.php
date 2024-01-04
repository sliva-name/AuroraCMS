<?php

namespace Install\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class Install
{
    public function installDB(string $dbType, string $dbHost, string $dbPort, string $dbName, string $dbUser, ?string $dbPassword): void
    {
        $config = json_encode([
            'DB_CONNECTION' => $dbType,
            'DB_HOST' => $dbHost,
            'DB_PORT' => $dbPort,
            'DB_DATABASE' => $dbName,
            'DB_USERNAME' => $dbUser,
            'DB_PASSWORD' => $dbPassword,
        ]);

        File::put(config_path('database.json'), $config);

        Artisan::call('config:clear');
        Artisan::call('migrate');
        //Artisan::call('db:seed');
    }
    public function createAdmin(string $adminEmail, string $adminName, string $adminPassword): void
    {
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
