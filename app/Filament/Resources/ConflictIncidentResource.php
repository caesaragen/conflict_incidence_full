<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConflictIncidentResource\Pages;
use App\Filament\Resources\ConflictIncidentResource\RelationManagers;
use App\Models\ConflictIncident;
use App\Models\IncidentType;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ConflictIncidentResource extends Resource
{
    protected static ?string $model = ConflictIncident::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        $user = Auth::user()->pluck('name', 'id');
        // dd($user);
        return $form
            ->schema(
                [
                Forms\Components\Select::make('user_id')
                    ->label('Reported by')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('verified_by')
                    ->options(User::all()->pluck('name', 'id')),
                Forms\Components\TextInput::make('conservation_area')
                    ->required()
                    ->maxLength(255),
            Forms\Components\TextInput::make('station')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('outpost')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('reporting_date_from')
                    ->required(),
                Forms\Components\DatePicker::make('reporting_date_to')
                    ->required(),
                Forms\Components\TextInput::make('serial_number'),
                Forms\Components\Select::make('incident_type')
                    ->required()
                    ->options(IncidentType::all()->pluck('name', 'code')),
                Forms\Components\TextInput::make('affected')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('area')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('animal_responsible')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('action_taken')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kws_ob_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('x_coordinate')
                    ->maxLength(255),
                Forms\Components\TextInput::make('y_coordinate')
                    ->maxLength(255),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                [
                Tables\Columns\TextColumn::make('user.name')
                ->label('Reported by'),
                Tables\Columns\TextColumn::make('verified_by'),
                Tables\Columns\TextColumn::make('conservation_area'),
                Tables\Columns\TextColumn::make('station'),
                Tables\Columns\TextColumn::make('outpost'),
                Tables\Columns\TextColumn::make('reporting_date_from')
                    ->date(),
                Tables\Columns\TextColumn::make('reporting_date_to')
                    ->date(),
                Tables\Columns\TextColumn::make('serial_number'),
                Tables\Columns\TextColumn::make('incident_type'),
                Tables\Columns\TextColumn::make('affected'),
                Tables\Columns\TextColumn::make('area'),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('animal_responsible'),
                Tables\Columns\TextColumn::make('action_taken'),
                Tables\Columns\TextColumn::make('kws_ob_number'),
                Tables\Columns\TextColumn::make('x_coordinate'),
                Tables\Columns\TextColumn::make('y_coordinate'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                ]
            )
            ->filters(
                [
                //
                ]
            )
            ->actions(
                [
                Tables\Actions\EditAction::make(),
                ]
            )
            ->bulkActions(
                [
                Tables\Actions\DeleteBulkAction::make(),
                ]
            );
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
            'index' => Pages\ListConflictIncidents::route('/'),
            'create' => Pages\CreateConflictIncident::route('/create'),
            'edit' => Pages\EditConflictIncident::route('/{record}/edit'),
        ];
    }    
}
