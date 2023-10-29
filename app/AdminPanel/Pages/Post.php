<?php

declare(strict_types=1);

namespace App\AdminPanel\Pages;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\TextBlock;
use MoonShine\Models\MoonshineUserRole;
use MoonShine\Pages\Page;

class Post extends Page
{
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Новости';
    }

    public function components(): array
	{
		return [
            Grid::make([
                Column::make([
                    Block::make([
                        TextBlock::make('Title 1', 'Text 1')
                    ])
                ])->columnSpan(6),
                Column::make([
                    Block::make([
                        TextBlock::make('Title 2', 'Text 2')
                    ])
                ])->columnSpan(6),
            ])
        ];
	}
    public function beforeRender(): void
    {
        if (auth()->user()->moonshine_user_role_id !== MoonshineUserRole::DEFAULT_ROLE_ID) {
            abort(403);
        }
    }
}
