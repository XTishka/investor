<table class="min-w-full divide-y divide-gray-200 w-full">
    <thead>
        <tr>
            <th scope="col" width="50"
                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ __('front.wishes') }}
            </th>
            <th scope="col" width="50"
                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ __('front.week') }}
            </th>
            <th scope="col"
                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ __('front.property') }}
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50" width="50">

            </th>
        </tr>
    </thead>
    <tbody wire:sortable='updatePriority' class="bg-white divide-y divide-gray-200">

        @foreach ($wishes as $wish)
            <tr wire:sortable.item="{{ $wish->id }}" wire:key="wish-{{ $wish->id }}">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $loop->iteration }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <strong>#{{ $wish->week->number }}</strong><br>
                    <span class="text-xs">
                        {{ date('j F, Y', strtotime($wish->week->start_date)) }} -
                        {{ date('j F, Y', strtotime($wish->week->end_date)) }}
                    </span>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <strong>{{ $wish->property->name }}</strong>
                    {{ $wish->property->country }}<br>
                    <span class="text-xs">{{ $wish->property->address }}</span>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <form class="inline-block"
                        action="{{ route('wish.delete', $wish->id) }}"
                        method="POST" >
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token"
                            value="{{ csrf_token() }}">
                        <input type="submit"
                            class="text-red-600 hover:text-red-900 mb-2 mr-2"
                            value="{{ __('front.delete') }}">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush