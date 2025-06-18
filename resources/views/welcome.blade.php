<x-layouts.main>
    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">ArchArt Project</h1>
                <h3 class="py-6 text-2xl">
                    @lang('messages.front')
                </h3>
                @if (App\Models\Page::where('slug', 'front-page')->exists())
                    <x-helpers.front-page />
                @endif
                <a href="{{ route('page.single', ['page' => 'summary']) }}" class="btn btn-primary">@lang('messages.summary')</a>
                <a href="https://engonopoulos.gr" target="_blank" class="btn btn-primary">@lang('messages.episimo')</a>
                </a>

            </div>
        </div>
    </div>
</x-layouts.main>
