<x-layouts.main>
    {{-- < class="px-6 py-12 sm:py-28"> --}}
    <div class="container mx-auto md:max-w-screen-md lg:max-w-screen-lg px-8 py-4">
        {{ Breadcrumbs::render('members') }}
        <h1 class="text-3xl my-8">@lang('messages.members')</h1>
        <div class="bg-gradient-to-b from-base-100 to-base-200 rounded-lg">

            <div class="grid gap-10 lg:gap:20 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($members as $member)
                    <x-members.membercard :member="$member">
                    </x-members.membercard>
                @endforeach
            </div>
        </div>
    </div>
    {{-- </ div> --}}
</x-layouts.main>
