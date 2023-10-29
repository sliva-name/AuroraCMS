<?php

namespace Install;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Install\Requests\InstallRequest;
use Install\Services\Install;

class InstallController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('install.index');
    }

    public function install(InstallRequest $request, Install $service): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $request->validated();

        $dbType = $request->input('db_type');
        $dbHost = $request->input('db_host') ?? '127.0.0.1';
        $dbPort = $request->input('db_port') ?? 3306;
        $dbName = $request->input('db_name');
        $dbUser = $request->input('db_user');
        $dbPassword = $request->input('db_password');

        $adminEmail = $request->input('admin_email');
        $adminName = $request->input('admin_name');
        $adminPassword = $request->input('admin_password');

        $appName = $request->input('app_name');

        $service->installDB($dbType, $dbHost, $dbPort, $dbName, $dbUser, $dbPassword);
        $service->createAdmin($adminEmail, $adminName, $adminPassword);
        $service->installApp($appName);



        return view('install.complete');
    }

}
