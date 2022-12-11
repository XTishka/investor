{{-- <a href="{{ route($link . '.show', $id) }}"
    class="inline-flex items-center px-2 py-1 bg-gray-300 border border-transparent rounded-l-md font-semibold text-xs text-gray-700 tracking-widest hover:bg-gray-400 active:bg-gray-900 active:text-white disabled:opacity-25 transition">
    <x-admin.icons.eye class="w-4 h-4 mr-2" />
    {{ __('View') }}
</a> --}}

<button {{ $attributes->merge([ 'class' => 'inline-flex items-center px-2 py-1 bg-gray-300 border border-transparent font-semibold text-xs text-gray-700 tracking-widest hover:bg-gray-400 active:bg-gray-900 active:text-white disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
