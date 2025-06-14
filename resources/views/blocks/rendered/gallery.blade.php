@php
    $gallery = App\Models\Gallery::find($gallery);
    if ($gallery !== null) {
        $images = $gallery->pictures;
    } else {
        return;
    }

@endphp

<div x-data="{ open: false, url: '' }"
    class=" grid md:grid-cols-3 2xl:grid-cols-4 gap-4 max-w-screen-xl mx-auto border border-grey-100 px-8 py-2 rounded-md mb-8">

    @foreach ($images as $image)
        @if ($image->url_webp !== null)
            <div x-on:click="url ='<img src=/storage/{{ $image->url_webp }}>';my_modal_1.showModal()">
                <img class="cursor-pointer w-full h-auto object-cover rounded-md shadow-md hover:shadow-lg transition duration-300"
                    src="/storage/{{ $image->url_webp }}" alt="">
                <p class="text-gray-500 italic text-sm !-mt-6">{{ $image->caption }}</p>
            </div>
        @else
            <div x-on:click="url ='<img src=/storage/{{ $image->url }}>';my_modal_1.showModal()">
                <img class="cursor-pointer w-full h-auto object-cover rounded-md shadow-md hover:shadow-lg transition duration-300"
                    src="/storage/{{ $image->url }}" alt="">
                <p class="text-gray-500 italic text-sm !-mt-6">{{ $image->caption }}</p>
            </div>
        @endif
    @endforeach
    <dialog id="my_modal_1" class="modal">
        <div class="modal-box">

            <p class="" x-html="url"></p>

        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</div>
