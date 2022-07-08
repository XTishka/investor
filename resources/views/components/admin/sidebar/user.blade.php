<div class="flex items-center justify-between text-center px-3 py-3 hover:text-white border-b border-zinc-500">
    <img src=" {{ asset('dist/img/user-avatar-160x160.jpg') }}" class="w-8 rounded-full drop-shadow-2xl shadow-zinc-800"
        alt="{{ __('admin.user_image_alt') }}">
    <a href="#" class="text-lg mx-2 hover:text-white">{{ auth()->user()->name }}</a>
    <a href="{{ route('logout') }}" class="text-zinc-500 hover:text-zinc-200" role="button"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>