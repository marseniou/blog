@php
    $page = App\Models\Page::where('slug', 'front-page')->first();
@endphp
<div class="mb-8 prose prose-lg">
    {!! tiptap_converter()->asHTML($page->content) ?? '' !!}
</div>
