<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Page;
use Filament\Tables;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Group;

use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use FilamentTiptapEditor\TiptapEditor;

use Filament\Forms\Components\FileUpload;

use Filament\Tables\Filters\SelectFilter;
use FilamentTiptapEditor\Enums\TiptapOutput;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\PageResource\Pages;


class PageResource extends Resource
{
    use Translatable;
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Page Details')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Title')
                            ->required()
                            ->translatable(),


                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('excerpt')
                            ->translatable()
                            ->columnSpan(2),

                        TiptapEditor::make('content')
                            ->extraInputAttributes([
                                'style' => 'height: 300px',
                            ])

                            ->output(TiptapOutput::Json)
                            ->translatable()
                            ->columnSpanFull()

                    ])->columnSpan(2)->columns(2),
                Group::make()->schema([
                    Section::make('Media')->schema([
                        FileUpload::make('featured_image')
                            ->label('Featured Image')
                            ->image()

                            ->maxSize(1024)
                            ->columnSpanFull(),

                        Toggle::make('show_featured')
                            ->label('Show Featured Image On Single Page')


                    ]),
                    Group::make()->schema([
                        Section::make('Actions')->schema([
                            Forms\Components\Select::make('category_id')
                                ->relationship('category', 'name')
                                ->getOptionLabelFromRecordUsing(fn(Category $record) => $record->name)
                                ->label('Category'),
                            Forms\Components\Toggle::make('active')->required(),
                            //Forms\Components\Select::make('user_id')->relationship('user', 'name')->required(),
                        ])

                    ])
                ]),




            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('category.name'),


                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('user.name')
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
            ])->defaultSort('updated_at', 'desc')
            ->filters([
                SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->getOptionLabelFromRecordUsing(fn(Category $record) => $record->name)
                    ->label('Category'),
                SelectFilter::make('user_id')
                    ->relationship('user', 'name')
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->name)
                    ->label('User'),
            ])
            ->actions([
                Action::make('view')
                    ->url(function (Page $record) {
                        return route('page.single', ['page' => $record->slug]);
                    }),

                //: string => route('page.single', $record->slug)),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),

            'edit' => Pages\EditPage::route('/{record}/edit'),

        ];
    }
    public static function getTranslatableLocales(): array
    {
        return ['en', 'el'];
    }

}
