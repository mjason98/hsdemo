<x-layout>
    <div class="invert py-3 px-4 flex flex-col w-full gap-4 items-center" style="background-image: url('{{ asset('imgs/flbg.jpg')}}'); background-size: 2500px; height: calc(100vh - 64px);">
        <div class="invert w-70 text-xl h-[48px]">
            <a href="{{route('recipes.create')}}">
                <x-basic-button>
                    <i class="h-2 fa-solid fa-plus fa-lg"></i>
                    New recipe
                </x-basic-button>
            </a>
        </div>
        <div class="invert grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 w-full gap-4 px-4 overflow-y-auto scrollbar-thin scrollbar-thumb-black scrollbar-track-goldenrod" style="height: calc(100vh - 72px);">
            @foreach($recipes as $recipe)
            <x-white-box>
                <!-- image -->
                <a href="{{route('recipes.show', ['recipe' => $recipe])}}">
                    <div class="text-2xl hover:text-blue-500 whitespace-normal truncate">{{ $recipe->title }}</div>
                </a>
                <div class="truncate">{{ $recipe->instructions }}</div>
            </x-white-box>
            @endforeach
        </div>
    </div>
</x-layout>