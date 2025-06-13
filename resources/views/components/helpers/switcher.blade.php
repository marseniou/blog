@if (app()->isLocale('el'))
    <ul class="menu menu-horizontal px-1">
        <li>
            <a href="{{ route('language.switch', ['locale' => 'en']) }}"
                @if (app()->getLocale() === 'en') class="active" @endif>
                English (EN)
            </a>
        </li>
    </ul>
@elseif (app()->isLocale('en'))
    <ul class="menu menu-horizontal px-1">
        <li>
            <a href="{{ route('language.switch', ['locale' => 'el']) }}"
                @if (app()->getLocale() === 'el') class="active" @endif>
                Ελληνικά (EL)
            </a>
        </li>
    </ul>
@endif
