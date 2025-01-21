<?php

namespace App\Filament\Resources\LogSensorResource\Pages;

use App\Filament\Resources\LogSensorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLogSensor extends CreateRecord
{
    protected static string $resource = LogSensorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
