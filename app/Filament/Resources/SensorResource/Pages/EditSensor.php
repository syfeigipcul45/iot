<?php

namespace App\Filament\Resources\SensorResource\Pages;

use App\Filament\Resources\SensorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSensor extends EditRecord
{
    protected static string $resource = SensorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
