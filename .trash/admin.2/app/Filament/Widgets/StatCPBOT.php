<?php

namespace App\Filament\Widgets;

use App\Models\Feedback;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatCPBOT extends BaseWidget
{
    protected function getStats(): array
    {
        $goodCount = Feedback::where('type', 'good')->count();
        $badCount = Feedback::where('type', 'bad')->count();
        $feedbackCount = Feedback::where('type', 'feedback')->count();
        $totalCount = Feedback::count();
        return [
            Stat::make('Total', $totalCount)
                ->description('Total de feedbacks')
                ->descriptionIcon('heroicon-o-chart-bar', IconPosition::Before)
                ->color('info'),
            Stat::make('Positivos', $goodCount)
                ->description('Feedbacks positivos')
                ->descriptionIcon('heroicon-o-hand-thumb-up', IconPosition::Before)
                ->color('success'),

            Stat::make('Construtivo', $feedbackCount)
                ->description('Feedbacks Construtivo')
                ->descriptionIcon('heroicon-o-chat-bubble-left-ellipsis', IconPosition::Before)
                ->color('success'),

            Stat::make('Negativos', $badCount)
                ->description('Feedbacks negativos')
                ->descriptionIcon('heroicon-o-hand-thumb-down', IconPosition::Before)
                ->color('danger'),

           
        ];
    }
}
