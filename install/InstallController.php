<?php

namespace Install;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Install\Requests\InstallRequest;
use Install\Services\Install;

class InstallController extends Controller
{
    public function index()
    {
        return view('install.index');
    }

    public function install(InstallRequest $request, Install $service)
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

        try {
            $service->installDB($dbType, $dbHost, $dbPort, $dbName, $dbUser, $dbPassword);
            $service->createAdmin($adminEmail, $adminName, $adminPassword);
            //$service->installApp($appName);
            /*
             * TODO сделать полную замену env и удалять ошибку из сессии (session()->forget('error');)
             * TODO сделать параметр с запуском --no-reload, если не получится единоразово всё заменить в env
             */
        } catch (Exception $e) {
            session(['error' => $e->getMessage()]);
            return to_route('install.index');
        }



        return view('install.complete');
    }

}
