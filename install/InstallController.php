<?php

namespace Install;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
        $dbHost = $request->input('db_host');
        $dbPort = $request->input('db_port') ?? 3306;
        $dbName = $request->input('db_name');
        $dbUser = $request->input('db_user');
        $dbPassword = $request->input('db_password');

        $service->installDB($dbType, $dbHost, $dbPort, $dbName, $dbUser, $dbPassword);

        //$adminName = $request->input('admin_name'); TODO Написать создание администратора после интеграции с moonshine2
        //$adminEmail = $request->input('admin_email');
        //$adminPassword = Hash::make($request->input('admin_password'));

        //$service->installApp(); TODO Эту строчку перенести в отдельную функцию production

        File::deleteDirectory(base_path('install'));

        return view('install.complete');
    }

}
