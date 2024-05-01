<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkuResource\Pages;
use App\Filament\Resources\SkuResource\RelationManagers;
use App\Models\Attribute;
use App\Models\Sku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkuResource extends Resource
{
    protected static ?string $model = Sku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Rate limiting')
                    ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->relationship('product', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('sku')
                            ->label('SKU')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('unit_amount')
                            ->required()
                            ->numeric(),
                    ]),
                Forms\Components\Section::make('Variants')
                    ->description('Variants of the product')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Forms\Components\Select::make('attribute_id')
                                    ->options(Attribute::query()->pluck('name', 'id'))
                                    ->default(Attribute::query()->where('id', 1)->pluck('id')->first())
                                    ->required(),
                                Forms\Components\TextInput::make('value')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->columns(2)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit_amount')
                    ->numeric()
                    ->sortable(),
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
            'product' => RelationManagers\ProductRelationManager::class,
            'attributes' => RelationManagers\AttributesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkus::route('/'),
            'create' => Pages\CreateSku::route('/create'),
            'edit' => Pages\EditSku::route('/{record}/edit'),
        ];
    }
}
