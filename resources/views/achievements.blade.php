<x-layout>
    <div class="relative min-h-screen">
        <!-- Background pattern -->
        <div class="-z-10 fixed inset-0 bg-gradient-to-br from-green-500/20 to-lime-500/20 backdrop-blur-sm"></div>

        <!-- Content container -->
        <div class="relative max-w-4xl mx-auto py-16 px-4">
            <h1 class="text-4xl font-bold text-center mb-8">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-lime-600">Your Achievements</span>
            </h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach(auth()->user()->achievements->sortBy(fn(\Assada\Achievements\Model\AchievementProgress $a) => $a->details->points)->values() as $achievement)
                        <div @class([
                            'p-6 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105',
                            'bg-white/80 backdrop-blur-sm border border-neutral-100' => $achievement->isUnlocked(),
                            'bg-neutral-100/80 backdrop-blur-sm border border-neutral-200' => $achievement->isLocked(),
                        ])>
                            <div class="flex items-start gap-4">
                                <div @class([
                                    'w-12 h-12 rounded-lg flex items-center justify-center shrink-0',
                                    'bg-gradient-to-br from-green-500 to-lime-500' => $achievement->isUnlocked(),
                                    'bg-neutral-300' => $achievement->isLocked(),
                                ])>
                                    <x-icon
                                        :name="$achievement->isUnlocked() ? 'far-trophy-star' : 'far-trophy'"
                                        @class([
                                            'h-6 w-6',
                                            'text-white' => $achievement->isUnlocked(),
                                            'text-neutral-500' => $achievement->isLocked(),
                                        ])
                                    />
                                </div>
                                <div>
                                    <h3 @class([
                                        'text-xl font-semibold mb-2',
                                        'text-neutral-900' => $achievement->isUnlocked(),
                                        'text-neutral-500' => $achievement->isLocked(),
                                    ])>
                                        {{ $achievement->name }}
                                    </h3>
                                    <p @class([
                                        'text-neutral-600',
                                        'text-neutral-400' => $achievement->isLocked(),
                                    ])>
                                        {{ $achievement->description ?: 'Complete the challenge to unlock this achievement!' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
</x-layout>
