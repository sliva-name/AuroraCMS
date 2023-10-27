<?php

if (! function_exists('env_put')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param array $envVariables
     * @return bool
     */
    function env_put(array $envVariables): bool
    {
        try {
            $envFile = base_path('.env');
            $contents = file_get_contents($envFile);

            foreach ($envVariables as $key => $value) {
                $contents = preg_replace("/$key=(.*)/", "$key=$value", $contents);
            }

            file_put_contents($envFile, $contents);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return true;
    }
}
