<?php

namespace App\Filament\Resources\ConflictIncidentResource\Pages;

use App\Filament\Resources\ConflictIncidentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConflictIncidents extends ListRecords
{
    protected static string $resource = ConflictIncidentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
