<?php

use MoonShine\Exceptions\MoonShineNotFoundException;
use MoonShine\Forms\LoginForm;
use MoonShine\Http\Middleware\Authenticate;
use MoonShine\Http\Middleware\SecurityHeadersMiddleware;
use MoonShine\Models\MoonshineUser;
use MoonShine\MoonShineLayout;
use MoonShine\Pages\ProfilePage;

return [
    # Директория, где располагаются ресурсы
    'dir' => 'app/AdminPanel',
    # При изменении директории необходимо поменять и namespace согласно psr-4
    'namespace' => 'App\AdminPanel',

    'title' => env('ADMIN_TITLE', 'AuroraCMS'),
    # Вы можете изменить логотип, указав путь (пример - /images/logo.svg)
    'logo' => env('MOONSHINE_LOGO'),
    'logo_small' => env('MOONSHINE_LOGO_SMALL'),

    'route' => [
        # По какому url будет доступна панель управления
        # Если оставить значение пустым, то панель будет доступна от /
        'prefix' => env('MOONSHINE_ROUTE_PREFIX', 'admin'),
        # Префикс формирования url для страниц
        'single_page_prefix' => 'page',
        # Группы middlewares в панели
        'middlewares' => [
            SecurityHeadersMiddleware::class,
        ],
        # Можно поменять исключение для 404 (для ModelNotFound нужно реализовать самостоятельно)
        'notFoundHandler' => MoonShineNotFoundException::class,
    ],
    # Если вы хотите заменить MoonshineUser на свою модель, то можно отключить дефолтные миграции
    'use_migrations' => true,

    # Вкл/Выкл уведомления
    'use_notifications' => true,

    # Class для рендеринга основного шаблона страницы
    'layout' => MoonShineLayout::class,

    # Filesystem Disk по умолчанию
    'disk' => 'public',

    'forms' => [
        # форма аунтификации
        'login' => LoginForm::class
    ],

    'pages' => [
        # Страница дашборда
        'dashboard' => App\AdminPanel\Pages\Dashboard::class,
        # Страница профиля
        'profile' => ProfilePage::class
    ],

    # Импорт и экспорт по умолчанию у ModelResource
    'model_resources' => [
        'default_with_import' => false,
        'default_with_export' => false,
    ],

    'auth' => [
        # Вкл/Выкл аутентификацию. Если false, то панель будет доступна всем
        'enable' => true,
        'middleware' => Authenticate::class,
        'fields' => [
            'username' => 'email',
            'password' => 'password',
            'name' => 'name',
            'avatar' => 'avatar',
        ],
        # Если используете собственный guard, provider
        'guard' => 'moonshine',
        'guards' => [
            'moonshine' => [
                'driver' => 'session',
                'provider' => 'moonshine',
            ],
        ],
        'providers' => [
            'moonshine' => [
                'driver' => 'eloquent',
                'model' => MoonshineUser::class,
            ],
        ],
    ],

    # Возможные варианты переводов
    'locales' => [
        'ru',
    ],

    'tinymce' => [
        # Роут файлового менеджера, подробности в разделе Поля
        'file_manager' => false, // or 'laravel-filemanager' prefix for lfm
        'token' => env('MOONSHINE_TINYMCE_TOKEN', ''),
        'version' => env('MOONSHINE_TINYMCE_VERSION', '6'),
    ],

    # Аутентификация через соц. сети и socialite, перечисляем драйверы и указываем логотип
    'socialite' => [
        // 'driver' => 'path_to_image_for_button'
    ],
];
