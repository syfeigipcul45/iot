<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SensorResource\Pages;
use App\Filament\Resources\SensorResource\RelationManagers;
use App\Models\Sensor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SensorResource extends Resource
{
    protected static ?string $model = Sensor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('attachment')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('temperature')->label('Temperature'),
                Tables\Columns\TextColumn::make('humidity')->label('Humidity'),
                Tables\Columns\TextColumn::make('lux')->label('Light Sensor (lux)'),
                Tables\Columns\TextColumn::make('rain_time')->label('Rain Time'),
                Tables\Columns\TextColumn::make('rain_accu')->label('Rain Accu'),
                Tables\Columns\TextColumn::make('rain_raw')->label('Rain Raw'),
                Tables\Columns\TextColumn::make('rain_hour')->label('Rain Hour'),
                Tables\Columns\TextColumn::make('soil_moisture')->label('Soil Moisture'),
                Tables\Columns\TextColumn::make('wind_speed')->label('Wind Speed'),
                Tables\Columns\TextColumn::make('wind_direction')->label('Wind Direction'),
                Tables\Columns\TextColumn::make('pm2_5')->label('PM2.5'),
                Tables\Columns\TextColumn::make('pm10')->label('PM10'),
                Tables\Columns\TextColumn::make('pm1_0')->label('PM1.0'),
                Tables\Columns\TextColumn::make('soil_nitrogen')->label('Nitrogen'),
                Tables\Columns\TextColumn::make('soil_phosporus')->label('Phosporus'),
                Tables\Columns\TextColumn::make('soil_kalium')->label('Kalium'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ])
        ;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSensors::route('/'),
            // 'create' => Pages\CreateSensor::route('/create'),
            // 'edit' => Pages\EditSensor::route('/{record}/edit'),
        ];
    }
}
