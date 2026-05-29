<?php

namespace App\Filament\Resources\ModelosResource\Pages;

use App\Filament\Resources\ModelosResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateModelos extends CreateRecord
{
    protected static string $resource = ModelosResource::class;
    protected function beforeCreate(): void
    {
        $data = $this->form->getState();

        if (empty($data['id_produto'])) {
            Notification::make()
                ->title('Produto obrigatório')
                ->body('Selecione um produto antes de salvar.')
                ->danger()
                ->send();

            $this->halt();
        }
    }

    protected function afterCreate(): void
    {
        Notification::make()
            ->title('Modelo criado')
            ->body('Cadastro realizado com sucesso.')
            ->success()
            ->send();
    }
}
