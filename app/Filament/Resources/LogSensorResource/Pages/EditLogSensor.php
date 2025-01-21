<?php

namespace App\Filament\Resources\LogSensorResource\Pages;

use App\Filament\Resources\LogSensorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLogSensor extends EditRecord
{
    protected static string $resource = LogSensorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
