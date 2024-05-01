<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttributeSkuResource\Pages;
use App\Filament\Resources\AttributeSkuResource\RelationManagers;
use App\Models\AttributeSku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttributeSkuResource extends Resource
{
    protected static ?string $model = AttributeSku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('attribute_id')
                    ->relationship('attribute', 'name')
                    ->required(),
                Forms\Components\Select::make('sku_id')
                    ->relationship('sku', 'id')
                    ->required(),
                Forms\Components\TextInput::make('value')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('attribute.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sku.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAttributeSkus::route('/'),
            'create' => Pages\CreateAttributeSku::route('/create'),
            'edit' => Pages\EditAttributeSku::route('/{record}/edit'),
        ];
    }
}
