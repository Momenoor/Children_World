@php
    $src = asset($widget['src'] ?? $widget['content'] ?? $widget['path']);
    $attributes = collect($widget)->except(['name', 'section', 'type', 'stack', 'src', 'content', 'path'])
@endphp

@push($widget['stack'] ?? 'after_scripts')
    <script type="module" src="{{ $src }}"
        @foreach($attributes as $key => $value)
        {{ $key }}{!! $value === true || $value === '' ? '' : "=\"$value\"" !!}
        @endforeach
    ></script>
@endpush
