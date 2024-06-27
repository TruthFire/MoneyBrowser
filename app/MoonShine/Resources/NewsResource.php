<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\News;
use App\MoonShine\Pages\News\NewsDetailPage;
use App\MoonShine\Pages\News\NewsFormPage;
use App\MoonShine\Pages\News\NewsIndexPage;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Pages\Page;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<News>
 */
class NewsResource extends ModelResource
{
    protected string $model = News::class;

    protected string $title = 'News';

    /**
     * @return list<Page>
     */
    public function pages(): array
    {
        return [
            NewsIndexPage::make($this->title()),
            NewsFormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            NewsDetailPage::make(__('moonshine::ui.show')),
        ];
    }

    /**
     * @param News $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
