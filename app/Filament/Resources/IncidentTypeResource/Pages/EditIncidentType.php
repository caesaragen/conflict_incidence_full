<?php

namespace App\Filament\Resources\IncidentTypeResource\Pages;

use App\Filament\Resources\IncidentTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIncidentType extends EditRecord
{
    protected static string $resource = IncidentTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
