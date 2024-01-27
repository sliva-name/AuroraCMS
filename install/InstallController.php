<?php

namespace Install;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Install\Helpers\DatabaseManager;
use Install\Helpers\PermissionChecker;
use Install\Helpers\RequirementsChecker;
use Install\Requests\InstallRequest;
use Install\Services\Install;

class InstallController extends Controller
{
    public function index(Install $service)
    {
        $validRequirements = $service->installRequirementsCheck(new RequirementsChecker());
        $validPermissions = $service->installPermissionFolderCheck(new PermissionChecker());
        $validRequirementsContainFalse = false;
        $validPermissionsContainFalse = false;

        foreach ($validRequirements as $validRequirement) {
            if (!$validRequirement->loaded) {
                $validRequirementsContainFalse = true;
                break;
            }
        }

        foreach ($validPermissions as $validPermission) {
            if (!$validPermission->permissions) {
                $validRequirementsContainFalse = true;
                break;
            }
        }

        return view('install.index', compact('validRequirements', 'validPermissions', 'validRequirementsContainFalse', 'validPermissionsContainFalse'));
    }

    public function install(InstallRequest $request, Install $service)
    {
        $request->validated();

        $appName = $request->input('app_name');

        try {
            $service->installDB($request, new DatabaseManager());
            $service->createAdmin($request);
            return view('install.complete');
        } catch (Exception $e) {
            return to_route('install.index')->with(['error' => $e->getMessage()]);
        }




    }

}
