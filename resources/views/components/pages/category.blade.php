<x-layouts.main>
    <div class="container mx-auto">
        {{ Breadcrumbs::render('page.category', $category) }}
    </div>
    <div class="container mx-auto max-w-screen-lg px-6 py-8">
        <h1 class="text-4xl mb-8">{{ $category->name }}</h1>
        <div class="space-y-8 lg:grid lg:grid-cols-2 xl:grid-cols-3">


            @foreach ($pages as $page)
                <x-pages.card :page="$page"></x-pages.card>
            @endforeach
        </div>
        {!! $pages->onEachSide(4)->links() !!}


    </div>
</x-layouts.main>
