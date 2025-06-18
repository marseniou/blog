<x-layouts.main>



    <div class="container mx-auto px-8 py-4">
        {{ Breadcrumbs::render('page.category', $category) }}
        <h1 class="text-3xl mb-4">{{ $category->name }}</h1>
        <div class="grid lg:grid-cols-2 xl:grid-cols-3">

            @if ($pages->total() > 0)
                @foreach ($pages as $page)
                    <x-pages.card :page="$page"></x-pages.card>
                @endforeach
            @else
                <div class="alert alert-warning">
                    <span>@lang('messages.no_pages_in_category')</span>
                </div>
            @endif
        </div>
        {!! $pages->onEachSide(4)->links() !!}


    </div>
</x-layouts.main>
