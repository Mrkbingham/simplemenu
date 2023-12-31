<?php

namespace App\Filament\Resources;

use Str;
use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Menus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('brand_name')
                                    ->label('Restaurant Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Menu::class, 'slug', ignoreRecord: true),

                                Forms\Components\ViewField::make('Menu Link')
                                    ->view('forms.components.page-link')
                                    ->hidden(fn (string $operation): bool => $operation === 'create'),

                                Forms\Components\MarkdownEditor::make('brand_slogan')
                                    ->label('Slogan / Tagline')
                                    ->columnSpan('full'),
                            ])
                            ->columns(2),
                        Forms\Components\Section::make('Contact')
                            ->schema([
                                // Phone number field
                                Forms\Components\TextInput::make('phone_number')
                                    ->tel(),

                                // Email field
                                Forms\Components\TextInput::make('email')
                                    ->email(),

                                Forms\Components\Textarea::make('address')
                                    ->columnSpan('full'),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        // Menu Styles
                        Forms\Components\Section::make('Menu Styles')
                            ->schema([
                                Forms\Components\FileUpload::make('logo')
                                    ->image()
                                    ->imageEditor(),

                                Forms\Components\ColorPicker::make('header_bg_color')
                                    ->label('Header Color')
                                    ->default('#ffffff'),
                                Forms\Components\ColorPicker::make('header_text_color')
                                    ->label('Header Text Color')
                                    ->default('#000000'),
                                Forms\Components\ColorPicker::make('body_bg_color')
                                    ->label('Body Color')
                                    ->default('#ffffff'),
                                Forms\Components\ColorPicker::make('body_text_color')
                                    ->label('Body Text Color')
                                    ->default('#000000'),
                                Forms\Components\ColorPicker::make('footer_bg_color')
                                    ->label('Footer Color')
                                    ->default('#ffffff'),
                                Forms\Components\ColorPicker::make('footer_text_color')
                                    ->label('Footer Text Color')
                                    ->default('#000000'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
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
            RelationManagers\MenuCategoryRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
