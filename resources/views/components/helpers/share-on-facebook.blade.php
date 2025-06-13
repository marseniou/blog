        <div class="flex justify-center align-items-center pt-16">

            <a title="{{ __('messages.share') }}"
                href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
                <img class="w-8" src="{{ url('/storage/facebook_sharer.svg') }}" alt="">
            </a>
            <a title="{{ __('messages.share') }}"
                href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
                <span class="text-sm pl-4 mt-2 underline">@lang('messages.share')</span>
            </a>
        </div>
