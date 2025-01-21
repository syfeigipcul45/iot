<?php

namespace App\Filament\Resources\LogSensorResource\Pages;

use App\Filament\Resources\LogSensorResource;
use Filament\Actions;
use Filament\Forms\Components\Builder;
use Filament\Resources\Pages\ListRecords;

class ListLogSensors extends ListRecords
{
    protected static string $resource = LogSensorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public static function query(): Builder
    {
        return parent::query();
    }
}
