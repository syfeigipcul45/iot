<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LogSensorResource\Pages;
use App\Filament\Resources\LogSensorResource\RelationManagers;
use App\Models\LogSensor;
use App\Models\Sensor;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LogSensorResource extends Resource
{
    protected static ?string $model = Sensor::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Log Sensor';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
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
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal'),
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
                // Filter::make('time_multiple_of_30')
                //     ->label('Time Multiple of 30 Seconds')
                //     ->query(function ($query) {
                //         $query->whereRaw('SECOND(created_at) % 30 = 0');
                //     }),
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
            'index' => Pages\ListLogSensors::route('/'),
            // 'create' => Pages\CreateSensor::route('/create'),
            // 'edit' => Pages\EditSensor::route('/{record}/edit'),
        ];
    }
}
