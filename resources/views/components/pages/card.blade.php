<div class="card bg-base-100 w-96 shadow-xl">
    <figure>
        <img class="rounded-t-lg" shadow-md" src="{{ '/storage/' . $page->featured_image }}" alt="">
    </figure>
    <div class="card-body">
        <h2 class="card-title">{{ $page->title }}</h2>
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
