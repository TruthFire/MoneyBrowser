<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\User;

use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Email;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Number;
use MoonShine\Fields\Text;
use MoonShine\Pages\Crud\FormPage;
use Throwable;

class UserFormPage extends FormPage
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
            Number::make('LVL 1 Referrals')->fill($this->getLvl1RefsCount())->readonly()->disabled(),
            Number::make('LVL 2 Referrals')->fill($this->getLvl2RefsCount())->readonly()->disabled(),
            Number::make('LVL 3 Referrals')->fill($this->getLvl3RefsCount())->readonly()->disabled(),
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

    private function getLvl1RefsCount() {
        return $this->getResource()->getItem()?->getLvl1Referrals()->count();
    }

    private function getLvl2RefsCount() {
        return $this->getResource()->getItem()?->getLvl2Referrals()->count();
    }

    private function getLvl3RefsCount() {
        return $this->getResource()->getItem()?->getLvl3Referrals()->count();
    }
}
