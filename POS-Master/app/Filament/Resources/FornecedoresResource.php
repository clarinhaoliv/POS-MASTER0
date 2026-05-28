<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FornecedoresResource\Pages;
use App\Filament\Resources\FornecedoresResource\RelationManagers;
use App\Models\Fornecedores;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FornecedoresResource extends Resource
{
    protected static ?string $model = Fornecedores::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListFornecedores::route('/'),
            'create' => Pages\CreateFornecedores::route('/create'),
            'edit' => Pages\EditFornecedores::route('/{record}/edit'),
        ];
    }
}
