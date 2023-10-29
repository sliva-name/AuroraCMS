<?php

declare(strict_types=1);

namespace App\AdminPanel\Resources;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Traits\Fields\WithBadge;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Новости';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Заголовок', 'title'),
                Textarea::make('Текст поста', 'text'),
                Text::make('Лайки', 'likes', fn($item) => $item->likes()->count())->badge('green')
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'string', 'min:5'],
            'text' => ['required', 'string', 'min:10'],
        ];
    }

    public function metrics(): array
    {
        return [
            ValueMetric::make('Записей')
                ->value(Post::count()),
            ValueMetric::make('Лайков')
                ->value(Like::count()),
        ];
    }
}
