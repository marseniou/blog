<footer class="shadow-lg sticky">
    <div class="divider divider-primary opacity-20"></div>
    <div class="bg-base-100 h-auto">

        <div class="flex flex-col items-center gap-2 justify-center">
            <div class="logo text-4xl text-normal">
                ArchArt Project
                <hr class="border border-t border-black" />
            </div>
            <p class="font-bold text-center"> @lang('messages.front')</p>
            <p><a
                    class="underline text-sm text-gray-600 "href="{{ route('page.single', ['locale' => app()->currentLocale(), 'page' => 'terms']) }}">@lang('messages.terms')</a>
            </p>
            <p class="text-sm">Copyright © 2024 - {{ \Carbon\Carbon::now()->year }} </p>

        </div>
        <div class="divider divider-primary opacity-20"></div>
        <div class="flex flex-col p-2 md:flex-row justify-between items-center">
            @if (app()->getLocale() == 'en')
                <img src="{{ url('storage/logos/elidek_en.webp') }}" alt="elidek" class="my-2 h-16">
            @else
                <img src="{{ url('storage/logos/elidek_el.webp') }}" alt="elidek" class="my-2 h-16">
            @endif
            <img src="{{ url('storage/logos/ellada20.webp') }}" alt="NextGenerationEU" class="my-2 h-16">
            <img src="{{ url('storage/logos/panteio.webp') }}" alt="Panteio" class="my-2 h-16">

            <img src="{{ url('storage/logos/asfa.webp') }}" alt="Athens School of Fine Arts" class="my-2 h-16">
            <img src="{{ url('storage/logos/uowa.webp') }}" alt="Univercity of West Attica" class="my-2 h-16">

        </div>
    </div>

</footer>
