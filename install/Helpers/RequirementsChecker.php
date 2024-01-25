<?php

namespace Install\Helpers;

use Symfony\Component\Routing\Requirement\Requirement;

class RequirementsChecker
{
    public function checkExtensions(array $extensions): \Illuminate\Support\Collection
    {
        $results = [];

        foreach ($extensions as $extension) {
           $results[] = [$extension => extension_loaded($extension)];
        }
        return collect($results);
    }

}
