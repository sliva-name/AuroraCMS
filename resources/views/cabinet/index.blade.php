@extends('layouts.app')
@section('title', 'Профиль игрока '. auth()->user()->name)
@section('content')
    <h1 class="title_page">Твой профиль</h1>
    <div class="flex lg:flex-row md:flex-col gap-[50px]">
        <div class="profile__block">
            <div class="flex flex-col gap-8">
                <div class="flex gap-[40px]">
                    <div class="profile__info">
                        <table class="table-auto w-full border-separate border-spacing-y-[24px]">
                            <tbody class="table__info">
                            <tr>
                                <td>ID аккаунта</td>
                                <th>{{ auth()->user()->id }}</th>
                            </tr>
                            <tr>
                                <td>Игровой ник</td>
                                <th>{{ auth()->user()->name }}</th>
                            </tr>
                            <tr>
                                <td>Почта</td>
                                <th>{{ auth()->user()->email }}</th>
                            </tr>
                            <tr>
                                <td>Последняя активность</td>
                                <th>{{ auth()->user()->last_login_ip }}</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="status_vip">
                        <div class="status_vip-content">
                            <p class="status_position">VIP</p>
                            <div class="progress">
                                <p><span>29 д. 23 ч. 59 с.</span> / 30 д.</p>
                                <div class="progress_bar">
                                    <div class="bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex gap-[40px]">
                    <div class="accept-content">
                        <canvas id="skin_container" data="{{ auth()->user()->skin }}"></canvas>
                        {{--                    <div class="accept-buttons flex">--}}
                        {{--                        <button id="rotate_skin" class="mr-2 button bg-indigo-600 hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">--}}
                        {{--                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.33711 10.2883C5.72812 9.18125 6.36289 8.14024 7.25664 7.25157C10.4305 4.07774 15.5746 4.07774 18.7484 7.25157L19.6168 8.125H17.0625C16.1637 8.125 15.4375 8.85117 15.4375 9.75C15.4375 10.6488 16.1637 11.375 17.0625 11.375H23.5574C24.4562 11.375 25.1824 10.6488 25.1824 9.75V3.25C25.1824 2.35117 24.4562 1.625 23.5574 1.625C22.6586 1.625 21.9324 2.35117 21.9324 3.25V5.85L21.0437 4.95625C16.6004 0.512894 9.39961 0.512894 4.95625 4.95625C3.71719 6.19532 2.82344 7.65274 2.275 9.21172C1.97539 10.0598 2.42227 10.984 3.26523 11.2836C4.1082 11.5832 5.0375 11.1363 5.33711 10.2934V10.2883ZM1.98047 14.691C1.72656 14.7672 1.48281 14.9043 1.28477 15.1074C1.08164 15.3105 0.944531 15.5543 0.873438 15.8184C0.858203 15.8793 0.842969 15.9453 0.832812 16.0113C0.817578 16.0977 0.8125 16.184 0.8125 16.2703V22.75C0.8125 23.6488 1.53867 24.375 2.4375 24.375C3.33633 24.375 4.0625 23.6488 4.0625 22.75V20.1551L4.95625 21.0438C9.39961 25.482 16.6004 25.482 21.0387 21.0438C22.2777 19.8047 23.1766 18.3473 23.725 16.7934C24.0246 15.9453 23.5777 15.0211 22.7348 14.7215C21.8918 14.4219 20.9625 14.8688 20.6629 15.7117C20.2719 16.8188 19.6371 17.8598 18.7434 18.7484C15.5695 21.9223 10.4254 21.9223 7.25156 18.7484L7.24648 18.7434L6.37812 17.875H8.9375C9.83633 17.875 10.5625 17.1488 10.5625 16.25C10.5625 15.3512 9.83633 14.625 8.9375 14.625H2.45781C2.37656 14.625 2.29531 14.6301 2.21406 14.6402C2.13281 14.6504 2.05664 14.6656 1.98047 14.691Z" fill="black"/></svg>--}}
                        {{--                        </button>--}}

                        {{--                        <button id="animate_run_skin" class="mr-2 button bg-indigo-600 hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">--}}
                        {{--                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 2H14V4H4V14H2V4C2 2.89 2.89 2 4 2ZM8 6H18V8H8V18H6V8C6 6.89 6.89 6 8 6ZM12 10H20C21.11 10 22 10.89 22 12V20C22 21.11 21.11 22 20 22H12C10.89 22 10 21.11 10 20V12C10 10.89 10.89 10 12 10ZM14 12V20L20 16L14 12Z" fill="black"/></svg>--}}
                        {{--                        </button>--}}

                        {{--                        <button id="pause_skin" class="mr-2 button bg-indigo-600 hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">--}}
                        {{--                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#000" xmlns="http://www.w3.org/2000/svg"><path d="M14 19H18V5H14M6 19H10V5H6V19Z" fill="#000"/></svg>--}}
                        {{--                        </button>--}}
                        {{--                    </div>--}}
                        <form action="{{ route('cabinet.skin.upload') }}" method="post" id="skin_form" enctype="multipart/form-data">
                            <label class="input-file">
                                <input type="file" name="skin" id="skin__upload">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                        <path d="M6.20898 20H18.2563M12.2327 4V16M12.2327 16L15.7465 12.5M12.2327 16L8.71885 12.5" stroke="#4557F4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Загрузить скин
                                 </span>
                            </label>
                            <label class="input-file">
                                <input type="file" name="cloak" id="cloak__upload">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                        <path d="M6.20898 20H18.2563M12.2327 4V16M12.2327 16L15.7465 12.5M12.2327 16L8.71885 12.5" stroke="#4557F4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Загрузить плащ
                                </span>
                            </label>
                        </form>
                    </div>
                    <div class="status_vip">
                        <div class="status_vip-content">
                            <p class="status_position">VIP</p>
                            <div class="progress">
                                <p><span>29 д. 23 ч. 59 с.</span> / 30 д.</p>
                                <div class="progress_bar">
                                    <div class="bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner w-full">
                    <h1 class="banner__header">Разблокируй всё & Пополни баланс</h1>
                    <p class="banner__text">Для разблокировки всех функций сайта необходимо пополнить баланс</p>
                    <button class="banner__button">Пополнить</button>
                </div>
            </div>
        </div>
{{--        <div class="profile__block">--}}
{{--        </div>--}}
    </div>

    @vite('resources/js/skinView/cabinet.js')
@endsection
