<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\News;

use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\DetailPage;
use Throwable;

class NewsDetailPage extends DetailPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Text::make('ru_title'),
            Text::make('ru_content'),
            Text::make('en_title'),
            Text::make('en_content'),
            Switcher::make('is_visible'),

        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<MoonShineComponent>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
