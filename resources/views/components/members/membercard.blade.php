<div class="bg-gradient-to-b from-slate-200 to-white flex-col justify-items-center py-8 lg:py-12 shadow-md rounded-lg">
    <div class="avatar pb-6">
        <div class="ring-primary ring-offset-base-100 w-24 lg:w-48 rounded-full ring ring-offset-2">
            <a href="{{ route('member.single', ['member' => $member]) }}">
                <img src="/storage/{{ $member->image }}" alt="">
            </a>
        </div>
    </div>
    <div>
        <h3>
            <a class="font-medium tracking-tigher text-xl hover:underline"
                href="{{ route('member.single', ['member' => $member->slug]) }}">{{ $member->name }}</a>
        </h3>
    </div>

    <div class="text-slate-400 tracking-tight text-sm">{{ $member->university }}</div>
    <hr class="border-t border-slate-300 w-3/5 my-2">

    <div class="text-slate-500 tracking-wider text-sm">{!! $member->position !!}</div>
</div>
