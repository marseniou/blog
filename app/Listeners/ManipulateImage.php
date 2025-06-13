<?php

namespace App\Listeners;

use App\Events\ImageProcess;
use App\Models\Picture;
use Intervention\Image\Image;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Intervention\Image\Drivers\Imagick\Driver;

class ManipulateImage implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ImageProcess $event): void
    {
        $pic = Picture::where('url', $event->path)->first();
        $manager = new ImageManager(new Driver());

        // read image from filesystem
        $image = $manager->read(public_path() . '/storage/' . $event->path);
        if ($image->width() >= $image->height()) {
            $image->scale(width: 800);
        } else {
            $image->scale(height: 800);
        }

        $path = explode('/', $event->path);
        // dd($path);
        array_splice($path, 2, 0, 'webp');
        $newpath = implode('/', $path);
        if (!File::exists(public_path() . '/storage' . '/' . $path[0] . '/' . $path[1] . '/webp')) {
            File::makeDirectory(public_path() . '/storage' . '/' . $path[0] . '/' . $path[1] . '/webp');
        }
        $c = explode('.', $newpath);
        $c[1] = 'webp';
        $newpath = implode('.', $c);
        $image->toWebp(config('my-image-library.compression_quality'))->save(public_path() . '/storage/' . $newpath);
        $pic->url_webp = $newpath;
        $pic->save();

    }
}
