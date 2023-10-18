<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallRequest;
use App\Services\Install;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

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
        $dbHost = $request->input('db_host');
        $dbName = $request->input('db_name');
        $dbUser = $request->input('db_user');
        $dbPassword = $request->input('db_password');

        $service->installDB($dbType, $dbHost, $dbName, $dbUser, $dbPassword);

        Artisan::call('migrate');
        Artisan::call('db:seed');

        //$adminName = $request->input('admin_name'); TODO Написать создание администратора после интеграции с moonshine2
        //$adminEmail = $request->input('admin_email');
        //$adminPassword = Hash::make($request->input('admin_password'));



        /*
         * TODO Принять меры защиты по окончанию установки (ключ авторизации или удаление файлов установки)
         */

        return view('install.complete');
    }

}
