<div class="h-full grid grid-cols-1 grid-rows-1 justify-center items-center">
    <section class="relative grid grid-cols-1 gap-4">
        <div class="-z-10 fixed inset-0 bg-gradient-to-br from-green-500/20 to-lime-500/20 backdrop-blur-sm"></div>

        @if($solved)
            <div
                class="relative z-10 flex flex-col items-center gap-6 animate-fade-in"
                x-data
                x-init="triggerConfetti();umami.track('Game Solved');"
            ></div>

            <div class="text-center space-y-2">
                <h2 class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-lime-600">
                    Congratulations!
                </h2>
                <p class="text-lg text-neutral-600">You've solved the puzzle!</p>
            </div>
        @else
            <div class="text-center space-y-2">
                <h2 class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-lime-600">
                    Sukuro
                </h2>
            </div>
        @endif

        <div class="relative">
            <main class="relative flex flex-col gap-0.5 bg-white/80 p-4 rounded-lg shadow-xl">
                @foreach($grid->toArray() as $row => $cols)
                    <div class="flex gap-0.5">
                        @foreach($cols as $col => $value)
                            <div
                                @class([
                                    'flex items-center justify-center w-8 h-8',
                                    'border border-neutral-300 rounded-md' => $row > -1 && $col > -1,
                                ])
                                wire:click="toggle({{ $row }}, {{ $col }})"
                            >
                                @if($row === -1 && $col === -1)
                                    <!-- empty -->
                                @elseif($row === -1 || $col === -1)
                                    <div @class([
                                        'flex items-center justify-center w-6 h-6 font-mono',
                                        'font-medium rounded-md text-white text-sm',
                                        'bg-neutral-400' => ($row === -1 && !$grid->isSolved(col: $col)) || ($col === -1 && !$grid->isSolved(row: $row)),
                                        'bg-lime-500' => ($row === -1 && $grid->isSolved(col: $col)) || ($col === -1 && $grid->isSolved(row: $row)),
                                        'bg-lime-50' => $grid->isSolved(col: $col) || $grid->isSolved(row: $row),
                                    ])>
                                        <span>{{ $value }}</span>
                                    </div>
                                @else
                                    <div @class([
                                        'flex items-center justify-center w-6 h-6 font-mono',
                                        'bg-lime-50' => $grid->isSolved(col: $col) || $grid->isSolved(row: $row),
                                        'rounded-full ring ring-2 ring-lime-400 bg-lime-100' => $grid->isSelected($row, $col),
                                    ])>
                                        <span @class(['hidden' => $grid->isHidden($row, $col)])>{{ $value }}</span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </main>
        </div>

        @if($solved)
            <div class="flex flex-col items-center gap-4">
                <a
                    href="{{ route('new') }}"
                    class="text-center inline-block bg-gradient-to-r from-green-600 to-lime-600 hover:from-green-700 hover:to-lime-700 text-white font-bold py-4 px-8 rounded-lg text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl"
                    data-umami-event="New Game Button"
                >
                    Start New Game
                </a>
            </div>
        @endif
    </section>
</div>
