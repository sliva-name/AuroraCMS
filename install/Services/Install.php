<?php

namespace Install\Services;

use Illuminate\Support\Facades\Artisan;

class Install
{
    public function installDB(string $dbType, string $dbHost, string $dbPort, string $dbName, string $dbUser, string|null $dbPassword): void
    {
        env_put(['DB_CONNECTION' => $dbType,
            'DB_HOST' => $dbHost,
            'DB_PORT' => $dbPort,
            'DB_DATABASE' => $dbName,
            'DB_USERNAME' => $dbUser,
            'DB_PASSWORD' => $dbPassword
        ]);

        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
    public function installApp(): void
    {
        Artisan::call('optimize');
    }
}
