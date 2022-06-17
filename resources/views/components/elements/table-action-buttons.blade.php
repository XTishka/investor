<div class="btn-group float-right">
    
    <a href="{{ route($route . '.show', $stockholderId) }}" class="btn btn-sm btn-default">
        <i class="fa fa-eye mr-1"></i>
        {{ __('Info') }}
    </a>
    <a href="{{ route($route . '.edit', $stockholderId) }}" class="btn btn-sm btn-default">
        <i class="fas fa-edit mr-1"></i>
        {{ __('Edit') }}
    </a>


    <button class="btn btn-sm btn-default" type="submit" form="delete-{{ $stockholderId }}"
        onclick="return confirm('{{ __('Are you sure?') }}')">
        <i class="fas fa-trash mr-1"></i>
        {{ __('Delete') }}
    </button>

</div>

<form id="delete-{{ $stockholderId }}" action="{{ route($route . '.destroy', $stockholderId) }}"
    method="POST">
    @csrf
    @method('DELETE')
</form>
