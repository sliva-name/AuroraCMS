<?php

namespace Install\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'db_type' => ['required', 'string'],
            'db_host' => ['nullable'],
            'db_port' => ['nullable'],
            'db_name' => ['required', 'string'],
            'db_user' => ['required', 'string'],
            'db_password' => ['nullable'],
            'admin_name' => ['required', 'string'],
            'admin_email' => ['required', 'string'],
            'admin_password' => ['required', 'string'],
            'app_name' => ['required', 'string'],
            'data2' => ['required', 'string'],
            'data3' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'db_type.required' => 'Тип базы данных обязателен для заполнения',
            'db_name.required' => 'Имя базы данных обязательно для заполнения',
            'db_user.required' => 'Пользователь базы данных обязателен для заполнения',
            'admin_name.required' => 'Имя пользователя обязательно для заполнения',
            'admin_email.required' => 'Email обязателен для заполнения',
            'admin_password.required' => 'Пароль пользователя обязателен для заполнения',
            'app_name.required' => 'Название сайта обязательно для заполнения',
            'data2.required' => 'Данные обязательны для заполнения',
            'data3.required' => 'Данные обязательны для заполнения',
            'db_type.string' => 'Тип базы данных должен быть строкой',
            'db_name.string' => 'Имя базы данных должно быть строкой',
            'db_user.string' => 'Пользователь базы данных должен быть строкой',
            'admin_name.string' => 'Имя пользователя должно быть строкой',
            'admin_email.string' => 'Email должен быть строкой',
            'admin_password.string' => 'Пароль пользователя должно быть строкой',
            'app_name.string' => 'Название сайта обязательно должно быть строкой',
            'data2.string' => 'Данные обязательны для заполнения',
            'data3.string' => 'Данные обязательны для заполнения',
        ];
    }
}
