<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\GalleryResource;
use Illuminate\Container\Attributes\Storage;

class EditGallery extends EditRecord
{
    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function ($record) {
                    File::deleteDirectory(public_path() . '/storage/galleries/gallery-' . $record->id);
                })
        ];
    }
}
