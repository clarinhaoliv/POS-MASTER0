<?php

namespace App\Filament\Resources\FornecedoresResource\Pages;

use App\Filament\Resources\FornecedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFornecedores extends EditRecord
{
    protected static string $resource = FornecedoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
