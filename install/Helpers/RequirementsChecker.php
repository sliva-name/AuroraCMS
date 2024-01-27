<?php

namespace Install\Helpers;

use Symfony\Component\Routing\Requirement\Requirement;

class RequirementsChecker
{
    public function checkExtensions(array $extensions): \Illuminate\Support\Collection
    {
        return collect($extensions)->map(function ($extension) {
            return (object) [
                'extension' => $extension,
                'loaded' => extension_loaded($extension)
            ];
        });
    }

}
