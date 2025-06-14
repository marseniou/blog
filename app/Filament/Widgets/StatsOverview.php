<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', \App\Models\User::count()),
            Stat::make('Total Pages', \App\Models\Page::count()),
            Stat::make('Total Categories', \App\Models\Category::count()),
            Stat::make('Total Galleries', \App\Models\Gallery::count()),
            Stat::make('Total Members', \App\Models\Member::count()),
        ];
    }
}
