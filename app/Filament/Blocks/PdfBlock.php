<?php
namespace App\Filament\Blocks;

use App\Models\Gallery;
use Directory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use FilamentTiptapEditor\TiptapBlock;
use App\Models\Gallery as GalleryModel;
use Filament\Forms\Components\TextInput;


class PdfBlock extends TiptapBlock
{
    public string $preview = 'blocks.previews.pdf';

    public string $rendered = 'blocks.rendered.pdf';
    public string $width = 'xl';

    public bool $slideOver = true;

    public ?string $icon = 'heroicon-o-document-text';
    public function getFormSchema(): array
    {


        return [

            FileUpload::make('pdf')
                ->acceptedFileTypes(['application/pdf'])
                ->directory('pdfs')
        ];
    }
}
