@php
    $page = App\Models\Page::where('slug', 'front-page')->first();
@endphp
<div class="mb-8 text-lg text-center leading-5">
    {!! tiptap_converter()->asHTML($page->content) ?? '' !!}
</div>
