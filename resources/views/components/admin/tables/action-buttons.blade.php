{{-- View button --}}
<a href="{{ route($link . '.show', $id) }}"
    class="inline-flex items-center px-2 py-1 bg-gray-300 border border-transparent rounded-l-md font-semibold text-xs text-gray-700 tracking-widest hover:bg-gray-400 active:bg-gray-900 active:text-white disabled:opacity-25 transition">
    <x-admin.icons.eye class="w-4 h-4 mr-2" />
    {{ __('View') }}
</a>

{{-- Edit button --}}
<a href="{{ route($link . '.edit', $id) }}"
    class="inline-flex items-center px-2 py-1 bg-gray-300 border border-transparent font-semibold text-xs text-gray-700 tracking-widest hover:bg-gray-400 active:bg-gray-900 active:text-white disabled:opacity-25 transition">
    <x-admin.icons.edit class="w-4 h-4 mr-2" />
    {{ __('Edit') }}
</a>

{{-- Delete button --}}
<form class="inline-block" action="{{ route($link . '.delete', $id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
    @csrf
    @method('DELETE')
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="">
    <button type="submit"
        class="inline-flex items-center px-2 py-1 bg-gray-300 border border-transparent rounded-r-md font-semibold text-xs text-gray-700 tracking-widest hover:bg-gray-400 active:bg-gray-900 active:text-white  disabled:opacity-25 transition">
        <x-admin.icons.trash class="w-4 h-4 mr-2" />
        {{ __('Delete') }}
    </button>

</form>
