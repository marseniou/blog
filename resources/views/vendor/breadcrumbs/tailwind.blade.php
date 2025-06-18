@unless ($breadcrumbs->isEmpty())
    <div class="breadcrumbs text-sm text-gray-500 mb-4">
        <ul>
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}"> {{ $breadcrumb->title }} </a>
                    </li>
                @else
                    <li>
                        {{ $breadcrumb->title }}
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endunless
