<div class="card bg-base-100 w-96 shadow-xl mb-8">

    <img class="rounded-t-lg shadow-md h-48 max-h-48 object-cover overflow-hidden"
        src="{{ url('/storage/' . $page->featured_image) }}" alt="">

    <div class="card-body">
        <h2 class="card-title"><a class="underline"
                href="{{ route('page.single', ['page' => $page->slug]) }}">{{ $page->title }}</a></h2>
        <p class="leading-relaxed">
            {!! str($page->excerpt)->sanitizeHtml()->limit(250) !!}

        </p>
        <div class="card-actions justify-end">
            <span><a href="{{ route('page.single', ['page' => $page->slug]) }}"
                    class="text-indigo-500 inline-flex items-center
                ">@lang('messages.more')<svg
                        class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg></a>
            </span>
        </div>
    </div>
</div>
