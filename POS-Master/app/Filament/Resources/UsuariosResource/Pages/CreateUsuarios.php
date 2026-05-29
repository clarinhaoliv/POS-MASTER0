<?php

namespace App\Filament\Resources\UsuariosResource\Pages;

use App\Filament\Resources\UsuariosResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUsuarios extends CreateRecord
{
    protected static string $resource = UsuariosResource::class;
    protected function beforeCreate(): void
    {
        $data = $this->data;
    
            if (empty($data['nome'])) {
                Notification::make()
                    ->title('Nome obrigatório')
                    ->body('Informe o nome do Funcionário.')
                    ->danger()
                    ->send();
    
                $this->halt();
            }
    }
}
