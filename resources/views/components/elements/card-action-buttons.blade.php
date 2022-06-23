<div class="p-2">
    @foreach ($buttons as $name => $button)
        <a href="{{ route($button['route']) }}" class="btn btn-secondary mr-1">
            <i class="fas fa-{{ $button['icon'] }} mr-3"></i>
            {{ __($name) }}
        </a>
    @endforeach
</div>
