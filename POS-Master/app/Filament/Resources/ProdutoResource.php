<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdutoResource\Pages;
use App\Filament\Resources\ProdutoResource\RelationManagers;
use App\Models\Produto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class ProdutoResource extends Resource
{
    protected static ?string $model = Produto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('fornecedor_id')
                ->label('Fornecedor')
                ->relationship('fornecedor', 'nome')
                ->required()
                ->searchable()
                ->preload(),

            Forms\Components\TextInput::make('cor')
                ->required() 
                ->maxLength(255),

            TextInput::make('nome')
                ->label('nome')
                ->required(),

            TextInput::make('material')
                ->label('material')
                ->required(),

            TextInput::make('preco')
                ->label('preco')
                ->numeric()
                ->required(),

            TextInput::make('quantidade')
                ->label('quantidade')
                ->numeric()
                ->required(),

            TextInput::make('estoque_minimo')
                ->label('estoque_minimo')
                ->numeric()
                ->required(),

            Select::make('garantia_estendida')
                ->label('garantia_estendida')
                ->options([
                    'sim' => 'Sim',
                    'não' => 'Não',
            ])
            ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fornecedor.nome')
                ->label('Fornecedor')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('nome')
                ->label('Nome')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('preco')
                ->label('Preco')
                ->money('BRL')
                ->sortable(),

            Tables\Columns\TextColumn::make('quantidade')
                ->label('Quantidade')
                ->sortable(),

            Tables\Columns\TextColumn::make('estoque_minimo')
                ->label('Estoque Mínimo')
                ->sortable(),

            Tables\Columns\TextColumn::make('garantia_estendida')
                ->label('Garantia_Estendida')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'sim' => 'success',
                    'não'  => 'info',
                })
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Criado em')
                ->dateTime('d/m/Y H:i')
                ->sortable()
                ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('fornecedor_id')
                ->relationship('fornecedor', 'nome')
                ->label('Fornecedor'),

            Tables\Filters\SelectFilter::make('garantia_estendida')
                ->options([
                    'sim' => 'Sim',
                    'não'  => 'Não',
                ])
                ->label('Garantia_Estendida'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProdutos::route('/'),
            'create' => Pages\CreateProduto::route('/create'),
            'edit' => Pages\EditProduto::route('/{record}/edit'),
        ];
    }
}
