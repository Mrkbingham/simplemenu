<?php

namespace App\Filament\Resources;

use Str;
use App\Filament\Resources\MenuCategoryResource\Pages;
use App\Filament\Resources\MenuCategoryResource\RelationManagers;
use App\Models\Menu;
use App\Models\MenuCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuCategoryResource extends Resource
{
    protected static ?string $model = MenuCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Menus';

    protected static ?string $navigationParentItem = 'Menus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\MarkdownEditor::make('description'),
                    ])
                ->columnSpan(['lg' => 2]),
                Forms\Components\Group::make()
                    ->schema([
                        // Menu Category
                        Forms\Components\Section::make('Menu')
                            ->schema([
                                Forms\Components\Select::make('menu_id')
                                    ->label('Associated Menu')
                                    ->relationship('menus', 'brand_name')
                                    ->required()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('brand_name')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'createOption' ? $set('slug', Str::slug($state)) : null),
                                        Forms\Components\TextInput::make('slug')
                                            ->disabled()
                                            ->dehydrated()
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(Menu::class, 'slug', ignoreRecord: true),
                                        Forms\Components\MarkdownEditor::make('brand_slogan')
                                            ->label('Slogan / Tagline')
                                            ->columnSpan('full')
                                    ]),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1])
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable()
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
            ])
            ->defaultSort('sort')
            ->reorderable('sort');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\MenuItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuCategories::route('/'),
            'create' => Pages\CreateMenuCategory::route('/create'),
            'edit' => Pages\EditMenuCategory::route('/{record}/edit'),
        ];
    }
}
