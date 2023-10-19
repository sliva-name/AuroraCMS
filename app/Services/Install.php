<?php

namespace App\Services;

class Install
{
    public function installDB(string $dbType, string $dbHost, string $dbPort, string $dbName, string $dbUser, string|null $dbPassword): void
    {
        $envFile = base_path('.env');
        $contents = file_get_contents($envFile);

        $envVariables = [
            'DB_CONNECTION' => $dbType,
            'DB_HOST' => $dbHost,
            'DB_PORT' => $dbPort,
            'DB_DATABASE' => $dbName,
            'DB_USERNAME' => $dbUser,
            'DB_PASSWORD' => $dbPassword,
        ];

        foreach ($envVariables as $key => $value) {
            $contents = preg_replace("/$key=(.*)/", "$key=$value", $contents);
        }

        file_put_contents($envFile, $contents);
    }
}
