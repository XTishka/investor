<div class="px-3 py-3 hover:text-white border-b border-zinc-600">
    <x-jet-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="flex w-full text-sm border-2 border-transparent rounded-full focus:outline-none transition">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />
                <div class="w-full text-lg mx-2 hover:text-white flex items-center justify-between ml-7">
                    {{ Auth::user()->name }}
                    <x-admin.icons.chevron-right class="h-5 w-5 text-zinc-500" />
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Account') }}
            </div>

            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                {{ __('Profile') }}
            </x-jet-dropdown-link>

            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                    {{ __('API Tokens') }}
                </x-jet-dropdown-link>
            @endif

            <div class="border-t border-gray-100"></div>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </x-jet-dropdown-link>
            </form>

            <!-- Language switcher -->
            @if (count(config('app.languages')) > 1)
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Select language') }}
                </div>

                @foreach (config('app.languages') as $langLocale => $language)
                    <x-jet-dropdown-link href="{{ url()->current() }}?change_language={{ $langLocale }}"
                        class="flex items-center justify-between">

                        {{ __($language['title']) }}

                        <img src=" {{ asset('img/' . $language['icon']) }}"
                            class="w-6 mr-4 rounded-full drop-shadow-2xl shadow-zinc-800"
                            alt="{{ __($language['title'] . ' language') }}">
                    </x-jet-dropdown-link>
                @endforeach
            @endif
        </x-slot>
    </x-jet-dropdown>
</div>
