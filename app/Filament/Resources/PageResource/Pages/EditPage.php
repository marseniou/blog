<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Models\Page;
use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\PageResource;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if($data['featured_image'] === null) {
            $data['show_featured'] = false;
        }
        $record->update($data);

        return $record;
    }
}
