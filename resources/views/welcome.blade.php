<x-layouts.main>
    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content text-center">

            <div class="max-w-lg">
                <div class="flex justify-center">
                    <img class="rounded-lg overflow-hidden mb-8" src="/logos/archart.jpg" alt="Archart Project">
                </div>
                <h1 class="text-4xl mb-4">
                    @lang('messages.front')
                </h1>
                {{-- <h3 class="text-2xl font-bold py-8 text-primary">ArchArt Project</h3> --}}

                @if (App\Models\Page::where('slug', 'front-page')->exists())
                    <x-helpers.front-page />
                @endif
                <a href="{{ route('page.single', ['page' => 'summary']) }}"
                    class="btn btn-primary mb-4">@lang('messages.summary')</a>
                <a href="https://engonopoulos.gr" target="_blank" class="btn btn-primary mb-4">@lang('messages.episimo')</a>
                </a>

            </div>
        </div>
    </div>
</x-layouts.main>
