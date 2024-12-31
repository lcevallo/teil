<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Property;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PropertyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PropertyResource\RelationManagers;


class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $modelLabel ='Immobilie';

    protected static ?string $pluralModelLabel= 'Immobilien';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Heading')
            ->tabs([
                Tabs\Tab::make('Hauptdaten')
                  ->columns(12)
                  ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->columnSpan(12)
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('description')
                        ->columnSpan(12)
                        ->required(),
                    Forms\Components\TextInput::make('country')
                        ->columnSpan(6)
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('city')
                        ->columnSpan(6)
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('address')
                        ->columnSpan(6)
                        ->required()
                        ,
                    Forms\Components\TextInput::make('price')
                        ->columnSpan(3)
                        ->required()
                        ->numeric()
                        ->prefix('$'),
                    Forms\Components\TextInput::make('sqm')
                        ->columnSpan(3)
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('bedrooms')
                        ->columnSpan(2)
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('bathrooms')
                        ->columnSpan(2)
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('garages')
                        ->columnSpan(2)
                        ->required()
                        ->numeric(),
                    Forms\Components\Toggle::make('slider')
                        ->columnSpan(2)
                        ->required(),
                      Forms\Components\Toggle::make('visible')
                          ->columnSpan(4)
                          ->required(),
                    Forms\Components\DatePicker::make('start_date')
                        ->columnSpan(2)
                    ->label('Start Date')
                    ->native(false)
                        ->required(),
                    Forms\Components\DatePicker::make('end_date')
                        ->columnSpan(2)
                        ->label('End Date')
                        ->native(false)
                        ->required()

                ]),
                Tabs\Tab::make('Bilder')

                ->schema([
                    Forms\Components\SpatieMediaLibraryFileUpload::make('Sliderbild')
                    ->columnSpan(6)
                    ->image()
                    ,
                    Forms\Components\SpatieMediaLibraryFileUpload::make('Hauptbilder')
                    ->columnSpan(6)
                    ->image()
                    ->multiple()
                    ,
                ])
                ->columns(12)
            ])->columnSpanFull()
        ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('Title')
                ->searchable()
                ->limit(10),
            Tables\Columns\TextColumn::make('country')
                ->label('Land')
                ->searchable(),
            Tables\Columns\TextColumn::make('price')
                ->money()
                ->alignRight()
                ->sortable(),
            Tables\Columns\TextColumn::make('sqm')
                ->numeric()
                ->alignRight()
                ->sortable(),
            Tables\Columns\TextColumn::make('bedrooms')
                ->numeric()
                ->alignCenter()
                ->sortable(),
            Tables\Columns\TextColumn::make('bathrooms')
                ->numeric()
                ->alignCenter()
                ->sortable(),
            Tables\Columns\TextColumn::make('garages')
                ->numeric()
                ->alignRight()
                ->sortable(),
            Tables\Columns\IconColumn::make('slider')
                ->boolean()
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'view' => Pages\ViewProperty::route('/{record}'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
