@extends('layouts.auth')
@section('left_content')
    <div class="flex justify-center w-1/2 h-screen mt-[91px]">
        <div class="flex flex-col gap-[29px]">
            <h1 class="title_auth">Регистрация</h1>
            <div class="flex gap-[14px]">
                <p class="question">У вас уже есть учётная запись?</p>
                <a class="answer" href="{{ route('login') }}">Войти</a>
            </div>
            <div class="flex flex-col pt-[49px] pb-[49px]">
                <form class="flex flex-col" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="flex flex-col gap-[30px]">
                        <input type="text" class="input_auth" placeholder="Ник" value="{{old('name')}}" name="name" required>
                        <input type="email" class="input_auth" placeholder="Почта" value="{{old('email')}}" name="email" required>
                        <input type="password" class="input_auth" placeholder="Пароль" value="{{old('password')}}" name="password" required>
                        <input type="password" class="input_auth" placeholder="Подтвердите пароль" value="{{old('password_confirmation')}}" name="password_confirmation" required>

                        <div class="flex">
                            <div class="flex flex-1 gap-[10px]">
                                <input type="checkbox" id="agreement" class="rounded-[5px] mt-[4px]" required>
                                <label class="block agreement__checkbox" for="agreement">Регистрируясь на сайте, вы принимаете
                                    <a class="flex gap-1 align-center agreement__link" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                            <path d="M5.95666 7.04334L12 1.00001M12 1.00001L6.74268 1M12 1.00001L12 6.25731M12 10.0049V11.0087C12 11.5562 11.5562 12 11.0087 12L1.99133 12C1.44383 12 1 11.5562 1 11.0087L1 1.99133C1 1.44383 1.44383 1 1.99133 1L2.99512 1" stroke="#4557F4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        пользовательское соглашение
                                    </a>
                                </label>
                            </div>
                            <a href="#" class="reset__password">Забыли пароль?</a>
                        </div>
                    </div>

                    <button class="button_auth" type="submit">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('right_content')
    <x-auth-images/>
@endsection
