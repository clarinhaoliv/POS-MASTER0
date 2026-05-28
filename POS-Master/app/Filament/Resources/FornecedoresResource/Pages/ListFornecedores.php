<?php

namespace App\Filament\Resources\FornecedoresResource\Pages;

use App\Filament\Resources\FornecedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFornecedores extends ListRecords
{
    protected static string $resource = FornecedoresResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
