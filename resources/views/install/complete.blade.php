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
        <div class="flex lg:py-0 py-4 w-full flex-col justify-center items-center">
            <div class="complete-header flex flex-col justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-green-500" width="200px" height="200px" viewBox="0 0 24 24">
                    <g>
                        <path fill="none" d="M0 0h24v24H0z"/>
                        <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z"/>
                    </g>
                </svg>
                <h1 class="text-3xl bold mt-4">Установка завершена!</h1>
            </div>
            <div class="complete-footer flex mt-4">
                <button class="button_install" type="button">Вернуться </button>
            </div>
        </div>
    </div>
</div>
<style>
    .button_install{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 12px;
        background: #4557F4;
        padding: 20px 30px;
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
</body>
</html>
