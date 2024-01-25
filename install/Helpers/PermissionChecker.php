<?php

namespace Install\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class PermissionChecker
{
    public function checkPermission(array $folders): Collection
    {
        $results = [];

        foreach ($folders as $folder) {
              $results[] = [$folder => [$this->permissionFolderCheck($folder), substr(sprintf('%o', fileperms($folder)), -4)]];
        }
        return collect($results);
    }
    private function permissionFolderCheck($folder): bool
    {
        return File::exists($folder) && File::isReadable($folder) && File::isWritable($folder);
    }
}
