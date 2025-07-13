<x-filament::widget>
    <h2 class="text-2xl font-bold mb-4">Statistik Pengguna</h2>    
<x-filament::card>
        

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @foreach ($this->getCards() as $card)
                <div>
                    {{ $card }}
                </div>
            @endforeach
        </div>
    </x-filament::card>
</x-filament::widget>
