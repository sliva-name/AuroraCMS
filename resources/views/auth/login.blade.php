@extends('layouts.auth')
@section('left_content')
    <div class="flex justify-center w-1/2 h-screen mt-[91px]" >
        <div class="flex flex-col gap-[29px]">
            <h1 class="title_auth">Авторизация</h1>
            <div class="flex gap-[14px]">
                <p class="question">Вы новый пользователь?</p>
                <a class="answer" href="{{ route('register') }}">Зарегистрироваться</a>
            </div>
            <div class="flex flex-col pt-[49px] pb-[49px]">
                <form class="flex flex-col" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex flex-col gap-[30px]">
                        <input type="email" class="input_auth" placeholder="Почта" name="email" required>
                        <input type="password" class="input_auth" placeholder="Пароль" name="password" required>
                    </div>
                    <a href="#" class="reset__password">Забыли пароль?</a>
                    <button class="button_auth" type="submit">Авторизоваться</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('right_content')
    <x-auth-images/>
@endsection
