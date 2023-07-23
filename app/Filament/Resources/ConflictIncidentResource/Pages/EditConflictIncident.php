<?php

namespace App\Filament\Resources\ConflictIncidentResource\Pages;

use App\Filament\Resources\ConflictIncidentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConflictIncident extends EditRecord
{
    protected static string $resource = ConflictIncidentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
