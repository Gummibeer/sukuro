<x-layout>
    <div class="relative">
        <!-- Background pattern -->
        <div class="-z-10 fixed inset-0 bg-gradient-to-br from-green-500/20 to-lime-500/20 backdrop-blur-sm"></div>

        <!-- Content container -->
        <div class="relative max-w-4xl mx-auto text-center py-16 px-4">
            <!-- Decorative elements -->
            <div class="absolute -top-4 -left-4 w-24 h-24 bg-green-100 rounded-full opacity-20 blur-xl"></div>
            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-lime-100 rounded-full opacity-20 blur-xl"></div>

            <h1 class="text-6xl font-bold text-neutral-900 mb-6 relative">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-lime-600">Sukuro</span>
            </h1>

            <p class="text-xl text-neutral-600 mb-8 max-w-2xl mx-auto">
                A modern take on the classic number puzzle game. Challenge your mind and have fun!
            </p>

            <div class="mb-12 relative">
                <a href="{{ route('new') }}" class="inline-block bg-gradient-to-r from-green-600 to-lime-600 hover:from-green-700 hover:to-lime-700 text-white font-bold py-4 px-8 rounded-lg text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    Start New Game
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="p-6 bg-white/80 backdrop-blur-sm rounded-lg shadow-md border border-neutral-100 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Easy to Learn</h3>
                    <p class="text-neutral-600">Simple rules, endless possibilities. Perfect for beginners and experts alike.</p>
                </div>

                <div class="p-6 bg-white/80 backdrop-blur-sm rounded-lg shadow-md border border-neutral-100 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-lime-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-lime-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Brain Training</h3>
                    <p class="text-neutral-600">Keep your mind sharp with daily puzzles and challenges.</p>
                </div>

                <div class="p-6 bg-white/80 backdrop-blur-sm rounded-lg shadow-md border border-neutral-100 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Play Anywhere</h3>
                    <p class="text-neutral-600">Access your game on any device, anytime you want to play.</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
