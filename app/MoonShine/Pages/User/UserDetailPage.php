<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\User;

use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Email;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Number;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\DetailPage;
use Throwable;

class UserDetailPage extends DetailPage
{
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Text::make('Name', 'name'),
            Email::make('Email', 'email'),
            Number::make('Balance'),
            Number::make('Daily withdraw limit', 'daily_withdraw_limit'),
            Number::make('Withdraw limit for today', 'current_withdraw_limit'),
            Number::make('LVL 1 Referrals', formatted: static fn($item) => $item->getLvl1Referrals()->count()),
            Number::make('LVL 2 Referrals', formatted: static fn($item) => $item->getLvl2Referrals()->count()),
            Number::make('LVL 3 Referrals', formatted: static fn($item) => $item->getLvl3Referrals()->count()),

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
