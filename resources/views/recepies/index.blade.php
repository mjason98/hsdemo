<x-layout>
    <div class="invert py-3 px-4 flex flex-col w-full gap-4 items-center" style="background-image: url('{{ asset('imgs/flbg.jpg')}}'); background-size: 2500px; height: calc(100vh - 64px);">
        <div class="invert w-70 text-xl h-[48px]">
            <x-basic-button>
                <i class="h-2 fa-solid fa-plus fa-lg"></i>
                New recepy
            </x-basic-button>
        </div>
        <div class="invert grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 w-full gap-4 px-4 overflow-y-auto scrollbar-thin scrollbar-thumb-black scrollbar-track-goldenrod" style="height: calc(100vh - 72px);">
            @foreach($recepies as $recepy)
            <x-white-box>
                <a href="#">
                    <div class="text-2xl hover:text-blue-500">{{ $recepy->title }}</div>
                </a>
                <div class="truncate">{{ $recepy->instructions }}</div>
                <div class="flex flex-row gap-4 justify-end">
                    <a href="#">
                        <button class="w-10 h-10 bg-amber-500 text-white rounded-xl p-2 hover:bg-amber-600">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                    <a href="#">
                        <button class="w-10 h-10 bg-rose-500 text-white rounded-xl p-2 hover:bg-rose-600">
                            <i class="fas fa-trash"></i>
                        </button>
                    </a>
                </div>
            </x-white-box>
            @endforeach
        </div>
    </div>
</x-layout>