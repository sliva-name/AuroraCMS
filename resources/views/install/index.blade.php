<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('layouts.navCabinet')
<x-error></x-error>
<div class="container">
    <div class="flex min-h-screen">
        <div class="flex w-1/2 flex-col justify-center items-center">
            <div class="w-[600px]">
                <div class="flex-col flex">
                    <h1 class="title_page">Установка 1/3</h1>
                    <p class="description">Настройка подключения к базе данных</p>
                </div>
                <form action="{{ route('install.install') }}" method="post">
                <div class="content-install">
                        <div class="flex flex-col gap-[30px]">
                            @csrf
                            <div class="input">
                                <label class="label" for="db_host">Хост базы данных</label>
                                <input id="db_host" type="text" name="db_host" class="input_install" placeholder="localhost" value="{{ old('db_host') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="db_name">Имя базы данных</label>
                                <input id="db_name" type="text" name="db_name" class="input_install" placeholder="Пароль" value="{{ old('db_name') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="db_user">Пользователь базы данных</label>
                                <input id="db_user" type="text" name="db_user" class="input_install" placeholder="Пользователь" value="{{ old('db_user') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="db_password">Пароль базы данных</label>
                                <input id="db_password" type="text" name="db_password" class="input_install" placeholder="Пароль" value="{{ old('db_password') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="db_type">Тип базы данных</label>
                                <select id="db_type" type="text" name="db_type" class="input_install">
                                    <option value="mysql" selected>mysql</option>
                                    <option value="pgsql">pgsql</option>
                                </select>
                            </div>

                        </div>
                </div>
                <button type="submit" class="button_install">Далее</button>
                </form>
            </div>

        </div>
        <div class="flex w-1/2 flex-col justify-center items-center" style="background: #EBEBEC">
        </div>
    </div>
</div>
<style>
    .title_page{
        color: #000;
        font-size: 32px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }
    .description{
        color: rgba(0, 0, 0, 0.50);
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }
    .content-install{
        padding: 49px 0;
    }
    .input_install{
        font-weight: 700;
        border: none;
        display: flex;
        width: 600px;
        height: 50px;
        padding: 15px 20px;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        flex-shrink: 0;
        border-radius: 12px;
        background: #FFF;
    }
    .input_install::placeholder{
        color: #A19FA5;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }
    .label{
        display: block;
        color: #000;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin-bottom: 7px;
    }
    .button_install{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 12px;
        background: #4557F4;
        padding: 20px 0;
        color: #EBEBEC;
        text-align: center;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }
</style>
</body>
</html>
