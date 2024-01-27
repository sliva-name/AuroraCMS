<?php

namespace Install\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class PermissionChecker
{
    public function checkPermission(array $folders): Collection
    {
        return collect($folders)->map(function ($folder) {
            return (object) [
                'folder' => $folder,
                'permissions' => $this->permissionFolderCheck($folder),
                'octal_permissions' => substr(sprintf('%o', fileperms($folder)), -4),
            ];
        });
    }
    private function permissionFolderCheck($folder): bool
    {
        return File::isReadable($folder) && File::isWritable($folder);
    }
}
