<?php

namespace App\Filament\Resources\GalleryResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Picture;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Events\ImageProcess;
use Illuminate\Support\Facades\File;
use App\Tables\Columns\PictureColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextInputColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PicturesRelationManager extends RelationManager
{
    protected static string $relationship = 'pictures';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('url')
                    ->image()
                    ->multiple()
                    ->directory(function () {
                        return 'galleries/gallery-' . $this->getOwnerRecord()->id;
                    })
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('url')
            ->reorderable('weight')
            ->columns([
                Stack::make([
                    PictureColumn::make('url'),
                    TextInputColumn::make('caption')
                        ->placeholder('caption')
                        ->extraAttributes(['class' => 'space-y-4'])
                ]),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])


            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
                CreateAction::make()



                    ->using(function (array $data, string $model): Model {
                        $id = $this->getOwnerRecord()->id;

                        $models = [];
                        foreach ($data['url'] as $url) {

                            $data['url'] = $url;
                            $data['gallery_id'] = $id;
                            $models[] = $model::create($data);
                            ImageProcess::dispatch($url);
                        }
                        return $models[0];
                    })
            ])

            ->actions([
                //Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make()
                    ->after(function ($record) {
                        $smallPath = $this->expandUrl($record->url);

                        //dd($smallPath);

                        File::delete(public_path('/storage/' . $record->url));
                        File::delete(public_path('/storage/' . $smallPath));
                    })
            ])
            ->bulkActions([
                /*  Tables\Actions\BulkActionGroup::make([
                     Tables\Actions\DeleteBulkAction::make(),
                 ]), */
            ]);
    }
    public function expandUrl($url): string
    {
        $path = explode('/', $url);
        $ext = explode('.', end($path));
        $ext = $ext[0] . '.webp';
        return implode('/', array_slice($path, 0, 2)) . '/webp/' . $ext;
    }

}
