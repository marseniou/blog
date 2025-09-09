<x-layouts.main>

    {{-- <section class="py-10 md:py-16"> --}}
    <div class="container max-w-screen-md lg:max-w-screen-lg mx-auto px-8 py-4">
        {{ Breadcrumbs::render('member.single', $member) }}
        <div class="text-center">

            <div class="flex justify-center avatar pb-2">
                <div class="ring-primary ring-offset-base-100 w-48 rounded-full ring ring-offset-2">
                    <img src="/storage/{{ $member->image }}" alt="">
                </div>
            </div>
            <h1 class="text-5xl font-bold">
                {{ $member->name }}
            </h1>
            <div class="font-bold pt-6 text-neutral-500">
                {{ $member->position }}
            </div>

            <div class="pb-6 text-slate-400 tracking-tight text-sm">
                {{ $member->university }}
            </div>

            <div class="max-w-screen-md mx-auto text-left mb-12">
                <div class="bg-base-300 p-6 rounded-lg shadow-sm text-lg italic">
                    {!! str($member->excerpt)->sanitizeHtml() !!}
                </div>
            </div>
            @auth
                <a class="btn btn-sm btn-neutral mb-12" href="/admin/members/{{ $member->slug }}/edit">Edit</a>
            @endauth

        </div>


        <div class="px-12 py-12 bg-gradient-to-b from-base-100 to-base-200 leading-7">
            {{-- <article class="prose !max-w-screen-md"> --}}
            <article class="prose md:prose-md lg:prose-lg">
                {!! tiptap_converter()->asHTML($member->content) !!}
            </article>

            {{-- </div> --}}
        </div>

        {{--  </section> --}}
</x-layouts.main>
