<?php

namespace App\Filament\Resources\FornecedoresResource\Pages;

use App\Filament\Resources\FornecedoresResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFornecedores extends CreateRecord
{
    protected static string $resource = FornecedoresResource::class;
    protected function beforeCreate(): void
    {
        $data = $this->data;
    
            if (empty($data['nome'])) {
                Notification::make()
                    ->title('Nome obrigatório')
                    ->body('Informe o nome do Fornecedor.')
                    ->danger()
                    ->send();
    
                $this->halt();
            }
    }
}
