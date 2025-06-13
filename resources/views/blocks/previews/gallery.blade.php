@php
    $gallery = App\Models\Gallery::find($gallery);

    if ($gallery !== null) {
        $images = $gallery->pictures;
    } else {
        return;
    }

@endphp
<div class="not-prose">

    <div>
        <p>{{ $gallery->name }}</p>
    </div>
    <div class="flex flex-wrap flex-row justify-start align-content-start">
        @foreach ($images as $image)
            <div class="m-4 w-12">
                <img src="/storage/{{ $image->url_webp }}" alt="">
            </div>
        @endforeach

        </ul>
    </div>
</div>
