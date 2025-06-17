<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{

    protected static string $resource = PageResource::class;
    public function mutateFormDataBeforeCreate($data): array
    {
        $data['user_id'] = auth()->user()->id;
        return $data;
    }

}
