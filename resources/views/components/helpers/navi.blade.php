<div class="navbar bg-base-100 shadow-sm sticky top-0 z-30">
    <div class="navbar-start">
        <div class="dropdown flex lg:hidden">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li class="font-bold">
                    <a href="{{ route('page.single', ['page' => 'about']) }}">@lang('messages.about')</a>
                </li>
                <li>
                    <a href="{{ route('members') }}" class="font-bold">@lang('messages.members')</a>
                </li>
                <li class="font-bold">
                    <details>
                        <summary>@lang('messages.categories')</summary>
                        <ul class="bg-base-100 rounded-t-none p-2">

                            @foreach (App\Models\Category::orderBy('weight', 'asc')->get() as $category)
                                @if ($category->show_on_menu)
                                    <li><a
                                            href="{{ route('page.category', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </details>
                </li>
                <li class="font-bold">
                    <a href="{{ route('page.single', ['page' => 'contact']) }}">@lang('messages.contact')</a>
                </li>
            </ul>
        </div>
        <x-helpers.switcher />
        @auth
            <ul>
                <li class="text-sm text-gray-400">{{ auth()->user()->name }}</li>
            </ul>
        @endauth
    </div>
    <div class="navbar-center">
        <a class="btn btn-ghost text-xl" href="{{ route('home', ['locale' => app()->getLocale()]) }}">ArchArt</a>

    </div>
    <div class="navbar-end hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li class="font-bold">
                <a href="{{ route('page.single', ['page' => 'about']) }}">@lang('messages.about')</a>
            </li>
            <li>
                <a href="{{ route('members') }}" class="font-bold">@lang('messages.members')</a>
            </li>
            <li class="font-bold">
                <details>
                    <summary>@lang('messages.categories')</summary>
                    <ul class="bg-base-100 rounded-t-none p-2">

                        @foreach (App\Models\Category::orderBy('weight', 'asc')->get() as $category)
                            @if ($category->show_on_menu)
                                <li><a
                                        href="{{ route('page.category', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </details>
            </li>
            <li class="font-bold">
                <a href="{{ route('page.single', ['page' => 'contact']) }}">@lang('messages.contact')</a>
            </li>
            <li>
        </ul>
        @auth
            @if (auth()->user()->isAdmin() || auth()->user()->isEditor())
                <ul class="menu menu-horizontal px-1">
                    <li>
                        <a href="/admin" class="btn btn-sm">Admin</a>
                    </li>
                </ul>
            @endif
            {{--  <ul class="menu menu-horizontal px-1">
                <li>
                    <a href="/app" class="btn btn-sm">Dashboard</a>
                </li>

            </ul> --}}
        @endauth

    </div>

</div>
