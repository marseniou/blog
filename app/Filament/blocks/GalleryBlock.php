<?php
namespace App\Filament\Blocks;

use App\Models\Gallery;
use Filament\Forms\Components\Select;
use FilamentTiptapEditor\TiptapBlock;
use App\Models\Gallery as GalleryModel;
use Filament\Forms\Components\TextInput;


class GalleryBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.gallery';

    public string $rendered = 'blocks.rendered.gallery';
    public string $width = 'xl';

    public bool $slideOver = true;

    public ?string $icon = 'heroicon-o-film';
    public function getFormSchema(): array
    {


        return [

            Select::make('gallery')
                ->label('Choose Gallery')
                ->options(
                    auth()->user()->galleries->pluck('name', 'id')
                )

        ];
    }
}
