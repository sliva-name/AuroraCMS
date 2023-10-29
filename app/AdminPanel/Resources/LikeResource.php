<?php

declare(strict_types=1);

namespace App\AdminPanel\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class LikeResource extends ModelResource
{
    protected string $model = Like::class;

    protected string $title = 'Лайки';
    protected array $parentRelations = ['user'];
    protected bool $usePagination = false;

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
