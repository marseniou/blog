<?php

namespace App\Filament\App\Pages;

use Filament\Pages\Page;
use App\Models\Page as PageModel;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Concerns\InteractsWithTable;

class ImageLibrary extends Page implements HasTable
{
    use InteractsWithTable;
    protected static ?string $model = PageModel::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static string $view = 'filament.app.pages.image-library';
    public function table(Table $table): Table
    {

        return $table
            ->query(PageModel::query()
                ->where('user_id', auth()->user()->id))
            ->columns([
                Stack::make([
                    ImageColumn::make('featured_image')
                        ->width(350)
                        ->height('auto')
                        ->extraImgAttributes(['class' => 'w-5xl']),

                    TextColumn::make('title')

                ]),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ]);
    }
}
