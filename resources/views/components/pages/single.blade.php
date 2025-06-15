<x-layouts.main>

    <div class="container max-w-screen-md lg:max-w-screen-lg mx-auto px-8 py-4">
        {{ Breadcrumbs::render('page.single', $page) }}
        @if ($page->showFeatured())
            <figure class="image mb-4">
                <img class="rounded-lg shadow-md" src="/storage/{{ $page->featured_image }}" alt="">
            </figure>
        @endif
        @auth
            <a href="/admin/pages/{{ $page->slug }}/edit" class="btn btn-sm btn-primary mb-4">
                Edit
            </a>
        @endauth
        <article class="prose md:prose-md lg:prose-lg">
            <h1>{{ $page->title }}</h1>
            {!! tiptap_converter()->asHTML($page->content) !!}
            {{-- {!! str($page->content)->sanitizeHtml() !!} --}}

        </article>

    </div>

</x-layouts.main>
