<?php

if (! function_exists('config_get')) {
    /**
     * Assign high numeric IDs to a config item to force appending.
     *
     * @param array $envVariables
     * @return string
     */
    function config_get()
    {
        return file_get_contents(config_path('database.json'));
    }
}
