@props(['user'])

<header class="w-full max-w-4xl mx-auto mb-8">
    <nav class="bg-neutral-800 rounded-lg p-4 shadow-lg flex items-center justify-between gap-x-4">
        <a href="{{ route('home') }}" class="flex-shrink-0 text-white hover:text-gray-300 transition-colors">
            <x-icon name="far-house" class="h-6 w-6"/>
        </a>

        @auth
        <a href="{{ route('achievements') }}" class="flex-shrink-0 text-white hover:text-gray-300 transition-colors">
            <x-icon name="far-trophy" class="h-6 w-6"/>
        </a>
        @endauth

        <div class="flex items-center justify-end flex-grow">
            @auth
                <div class="flex items-center gap-x-4">
                    <div class="flex items-center gap-x-2">
                        <img
                            src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}?s=40&d=identicon"
                            alt="{{ $user->nickname }}"
                            class="w-8 h-8 rounded-full border-2 border-green-500"
                        >
                        <span class="text-white">{{ $user->nickname }}</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="flex items-center">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="p-2 rounded cursor-pointer text-red-400 hover:text-red-300 transition-colors">
                            <x-icon name="far-arrow-right-from-bracket" class="h-4 w-4"/>
                        </button>
                    </form>
                </div>
            @else
                <a
                    href="{{ route('oauth.redirect', ['provider' => 'discord']) }}"
                    class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center space-x-2"
                >
                    <x-icon name="fab-discord" class="h-5 w-5"/>
                    <span>Sign in with Discord</span>
                </a>
            @endauth
        </div>
    </nav>
</header>
