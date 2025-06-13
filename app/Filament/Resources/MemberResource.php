<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Member;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use FilamentTiptapEditor\TiptapEditor;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use FilamentTiptapEditor\Enums\TiptapOutput;
use App\Filament\Resources\MemberResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MemberResource\RelationManagers;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Team Members')
                    ->schema([
                        TextInput::make('name')
                            ->minLength(2)
                            ->maxLength(255)
                            // ->live()
                            // ->debounce(250)
                            // ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->translatable(),


                        TextInput::make('slug')
                            ->disabledOn('edit')
                            ->required()->unique(ignoreRecord: true),
                        TextInput::make('position')

                            ->translatable(),
                        TextInput::make('university')

                            ->translatable(),
                        RichEditor::make('excerpt')

                            ->translatable()

                            ->columnSpanFull(),
                        TiptapEditor::make('content')
                            ->extraInputAttributes([
                                'style' => 'height: 300px',
                            ])

                            ->output(TiptapOutput::Json)
                            ->translatable()

                            ->columnSpanFull()



                    ])->columnSpan(2)->columns(2),
                Group::make()->schema([
                    Section::make('Image')
                        ->schema([
                            FileUpload::make('image'),
                            //->enablePackageConversionDefinitions(),
                        ])->columnSpan(1),
                    Section::make('Active')->schema([

                        Checkbox::make('active')->label('Is Active'),
                        //Checkbox::make('collaborator')->label('Collaborator'),
                        //TextInput::make('weight')->label('Weight')->numeric()->default(0),

                    ]),

                ]),



            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('position'),
                TextColumn::make('university')
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
