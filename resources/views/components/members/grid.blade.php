<x-layouts.main>
    <div class="container mx-auto">
        {{ Breadcrumbs::render('members') }}
    </div>
    <div class="px-6 py-12 sm:py-28">
        <div class="mx-auto max-w-6xl">
            <h1 class="text-primary-text text-5xl py-8">@lang('messages.members')</h1>
            <div class="px-12 py-12 bg-gradient-to-b from-base-100 to-base-200 rounded-lg">

                <div class="grid gap-10 lg:gap:20 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($members as $member)
                        <x-members.membercard :member="$member">
                        </x-members.membercard>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>
