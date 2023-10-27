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
        <div class="flex lg:w-1/2 lg:py-0 py-4 w-full flex-col justify-center items-center">
            <form action="{{ route('install.install') }}" method="post">
            <div class="lg:w-[600px] w-full step1">
                <div class="flex-col flex">
                    <h1 class="title_page">Установка 1/3</h1>
                    <p class="description">Настройка подключения к базе данных</p>
                </div>
                <div class="content-install">
                        <div class="flex flex-col gap-[30px]">
                            @csrf
                            <div class="input">
                                <label class="label" for="db_host">Хост базы данных</label>
                                <input id="db_host" type="text" name="db_host" class="input_install" placeholder="localhost" value="{{ old('db_host') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="db_port">Порт базы данных</label>
                                <input id="db_port" type="text" name="db_port" class="input_install" placeholder="3306" value="{{ old('db_port') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="db_name">Имя базы данных</label>
                                <input id="db_name" type="text" name="db_name" class="input_install" placeholder="aurora" value="{{ old('db_name') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="db_user">Пользователь базы данных</label>
                                <input id="db_user" type="text" name="db_user" class="input_install" placeholder="Пользователь" value="{{ old('db_user') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="db_password">Пароль базы данных</label>
                                <input id="db_password" type="password" name="db_password" class="input_install" placeholder="Пароль" value="{{ old('db_password') }}">
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
                <button type="submit" id="step1" class="button_install">Далее</button>

            </div>

            <div class="w-[600px] hidden step2">
                <div class="flex justify-between">
                    <div class="flex-col flex">
                        <h1 class="title_page">Установка 2/3</h1>
                        <p class="description">Создание учетной записи администратора</p>
                    </div>
                    <button id="step2_back" class="flex justify-center items-center w-[87px]" style="border-radius: 12px;background: #D9D9D9;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23" viewBox="0 0 24 23" fill="none">
                            <path d="M0.454507 10.1965C-0.131279 10.7823 -0.131279 11.732 0.454507 12.3178L10.0004 21.8637C10.5862 22.4495 11.536 22.4495 12.1218 21.8637C12.7076 21.278 12.7076 20.3282 12.1218 19.7424L3.63649 11.2571L12.1218 2.77186C12.7076 2.18607 12.7076 1.23633 12.1218 0.650539C11.536 0.0647529 10.5862 0.0647529 10.0004 0.650539L0.454507 10.1965ZM23.4849 9.75714L1.51517 9.75714L1.51517 12.7571L23.4849 12.7571L23.4849 9.75714Z" fill="black"/>
                        </svg>
                    </button>
                </div>

                    <div class="content-install">
                        <div class="flex flex-col gap-[30px]">
                            <div class="input">
                                <label class="label" for="admin_email">Email</label>
                                <input id="admin_email" type="text" name="admin_email" class="input_install" placeholder="admin@gmail.com" value="{{ old('admin_email') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="admin_name">Имя пользователя</label>
                                <input id="admin_name" type="text" name="admin_name" class="input_install" placeholder="Админ" value="{{ old('admin_name') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="admin_password">Пароль пользователя</label>
                                <input id="admin_password" type="password" name="admin_password" class="input_install" placeholder="Пароль" value="{{ old('admin_password') }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="step2" class="button_install">Далее</button>
            </div>

            <div class="w-[600px] hidden step3">
                <div class="flex justify-between">
                    <div class="flex-col flex">
                        <h1 class="title_page">Установка 3/3</h1>
                        <p class="description">Основные настройки CMS</p>
                    </div>
                    <button id="step3_back" class="flex justify-center items-center w-[87px]" style="border-radius: 12px;background: #D9D9D9;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23" viewBox="0 0 24 23" fill="none">
                            <path d="M0.454507 10.1965C-0.131279 10.7823 -0.131279 11.732 0.454507 12.3178L10.0004 21.8637C10.5862 22.4495 11.536 22.4495 12.1218 21.8637C12.7076 21.278 12.7076 20.3282 12.1218 19.7424L3.63649 11.2571L12.1218 2.77186C12.7076 2.18607 12.7076 1.23633 12.1218 0.650539C11.536 0.0647529 10.5862 0.0647529 10.0004 0.650539L0.454507 10.1965ZM23.4849 9.75714L1.51517 9.75714L1.51517 12.7571L23.4849 12.7571L23.4849 9.75714Z" fill="black"/>
                        </svg>
                    </button>
                </div>

                    <div class="content-install">
                        <div class="flex flex-col gap-[30px]">
                            <div class="input">
                                <label class="label" for="data1">Email</label>
                                <input id="data1" type="text" name="data1" class="input_install" placeholder="admin@gmail.com" value="{{ old('data1') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="data2">Имя пользователя</label>
                                <input id="data2" type="text" name="data2" class="input_install" placeholder="Админ" value="{{ old('data2') }}">
                            </div>
                            <div class="input">
                                <label class="label" for="data3">Пароль пользователя</label>
                                <input id="data3" type="text" name="data3" class="input_install" placeholder="Пароль" value="{{ old('data3') }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="button_install">Далее</button>
            </div>
            </form>
        </div>
        <div class="lg:flex hidden w-1/2 flex-col justify-center items-center" style="background: #EBEBEC">
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
        width: 100%;
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
    .button_install:hover{
        background: #6070FD;
    }
</style>
<script>
    document.getElementById('step1').addEventListener('click', (e) => {
        e.preventDefault()
        document.querySelector('.step1').classList.toggle('hidden')
        document.querySelector('.step2').classList.toggle('hidden')
    })
    document.getElementById('step2').addEventListener('click', (e) => {
        e.preventDefault()
        document.querySelector('.step2').classList.toggle('hidden')
        document.querySelector('.step3').classList.toggle('hidden')
    })
    document.getElementById('step2_back').addEventListener('click', (e) => {
        e.preventDefault()
        document.querySelector('.step1').classList.toggle('hidden')
        document.querySelector('.step2').classList.toggle('hidden')
    })
    document.getElementById('step3_back').addEventListener('click', (e) => {
        e.preventDefault()
        document.querySelector('.step2').classList.toggle('hidden')
        document.querySelector('.step3').classList.toggle('hidden')
    })
</script>
</body>
</html>
