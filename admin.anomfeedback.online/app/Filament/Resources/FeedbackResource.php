<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedbackResource\Pages;
use App\Models\Feedback;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;
use Filament\Tables\Actions\Action;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static ?string $navigationLabel = 'Feedbacks';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Textarea::make('feedback')
                ->required()
                ->rows(6),
            Forms\Components\TextInput::make('type')
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->defaultSort('created_at', 'desc')
        ->columns([
            Tables\Columns\TextColumn::make('created_at')
                ->label('Data')
                ->dateTime('d/m/Y H:i')
                ->sortable(),

            Tables\Columns\TextColumn::make('type')
                ->label('Tipo')
                ->searchable()
                ->sortable()
                ->formatStateUsing(function ($state) {
                    return match ($state) {
                        'good' => 'Positivos',
                        'bad' => 'Negativos',
                        'feedback' => 'Construtivos',
                        default => ucfirst($state),
                    };
                }),

            Tables\Columns\TextColumn::make('feedback')
                ->label('Feedback')
                ->toggleable()
                ->limit(100)
                ->wrap(),
        ])
        ->actions([
            Action::make('view')
                ->label('Ver Completo')
                ->modalHeading('Feedback Completo')
                ->modalDescription(fn (Feedback $record) => $record->feedback)
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Fechar')
                ->icon('heroicon-o-eye'),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('type')
                ->label('Tipo de Feedback')
                ->options([
                    'good' => 'Positivo',
                    'bad' => 'Negativo',
                    'feedback' => 'Construtivo',
                ]),
        ]);
}

    public static function canCreate(): bool
{
    return false;
}

public static function canEdit($record): bool
{
    return false;
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFeedback::route('/'),
           // 'create' => Pages\CreateFeedback::route('/create'),
          //  'edit' => Pages\EditFeedback::route('/{record}/edit'),
        ];
    }
}
