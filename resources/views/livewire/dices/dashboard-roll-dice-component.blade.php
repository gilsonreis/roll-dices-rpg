<div class="mt-16">
    <div class="pt-12 pb-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Histórico de rolagens") }}
                    <hr class="border-t-yellow-500 border-b-amber-700">
                    @foreach($rolledNumbers as $index => $row)
                        <div class="bg-gray-700 flex flex-col w-full p-3 rounded mt-4" id="roll-{{ $index }}">
                            <p class="text-gray-400"><span class="font-extrabold text-yellow-600">{{ $row['user_name'] }}</span> rolou:</p>
                            <p><span>{{ strtoupper($row['roll']) }}</span> <span class="text-gray-400">
                                    ({{ implode("+", $row['rolls']) }}) {{ $row['modifier'] != 0 ? 'com modificador ' .  $row['modifier'] : '' }} </span>
                                - totalizando <span class="text-2xl text-yellow-600">{{ $row['total'] }}</span></p>
                            <p><small class="text-[10px]">{{ $row['created_at'] }}</small></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <footer class="w-full bg-gray-800 py-4 fixed bottom-0 mt-4">
        <div class="container mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form class="flex w-full items-center justify-center">
                <input type="hidden" id="rolled-numbers-count" value="{{ count($rolledNumbers) }}">
                <input type="text" class="text-gray-400 w-full uppercase p-2 border border-gray-600 rounded-l bg-gray-700" placeholder="Role seus dados ... " wire:model="roll">
                <button type="button" class="p-2 bg-yellow-500 text-gray-900 rounded ml-3" wire:click="rollDice">Rolar</button>
                <div class="relative group ml-2" x-data="{ open: false }">
                    <span class="text-white cursor-pointer bg-gray-500 rounded-full w-6 block text-center border-1
                    border-y-yellow-500 hover:bg-yellow-500 hover:text-black hover:animate-pulse" @click="open = !open">?</span>
                    <div
                        x-show="open"
                        @click.outside="open = false"
                        class="absolute bottom-full right-0 transform translate-x-[-50%] mr-2 mb-6 bg-gray-700 text-white text-sm rounded py-1 px-3 w-64 text-left"
                    >
                        <small>
                            <strong>Como rodar o dado?</strong><br>
                            Informe a quantidade de dados que vai rodar, junto com a letra "D" e o valor do dado. Ex: 3D20 ou 2D10.<br>
                            Para adicionar algum modificador, basta colocar o sinal de "+" ou "-" e o valor do modificador. Ex: 3D20+3 ou 2D10-5.
                        </small>
                    </div>
                </div>
            </form>
        </div>
    </footer>
</div>
