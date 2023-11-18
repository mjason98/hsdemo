<x-layout>
    <div class="invert py-3 px-4 flex flex-col w-full gap-4 items-center" style="height: calc(100vh - 64px);">
        <div class="invert w-70 text-xl h-[48px]">
            <a href="{{route('recipes.create')}}">
                <x-basic-button>
                    <i class="h-2 fa-solid fa-plus fa-lg"></i>
                    New recipe
                </x-basic-button>
            </a>
        </div>
        <div class="invert grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full gap-2 px-4 overflow-y-auto scrollbar-thin scrollbar-thumb-black scrollbar-track-goldenrod" style="height: calc(100vh - 72px);">
            @foreach($recipes as $recipe)
            <x-white-box>

                <div class="flex flex-col justify-center items-center w-full">
                    <img src="{{$recipe->getImageUrl('thumbnail')}}" class="flex rounded-xl w-[100px] h-[100px] border-2 border-gray-800" />
                </div>

                <a href="{{route('recipes.show', ['recipe' => $recipe])}}">
                    <div class="w-full h-fit max-h-24 min-h-12 text-2xl hover:text-blue-500 whitespace-normal truncate">{{ $recipe->title }}</div>
                </a>
                <div class="text-gray-500 text-lg">{{ date('F j, Y', strtotime($recipe->created_at)) }}</div>
                <div class="flex flex-col gap-1">
                    <div class="flex flex-row gap-1">
                        @foreach($recipe->ingredients->take(2) as $ingredient)
                        <x-ingredient-box>
                            {{$ingredient->name}}
                        </x-ingredient-box>
                        @endforeach
                        @if ($recipe->ingredients->count() > 2)
                        <x-ingredient-box>
                            <i class="mt-1 fa-solid fa-ellipsis"></i>
                        </x-ingredient-box>
                        @endif
                    </div>
                    <div class="flex flex-wrap gap-1 content-start w-full max-h-[76px]">
                        @foreach($recipe->tags->take(3) as $tag)
                        <x-tag-box>
                            #{{$tag->name}}
                        </x-tag-box>
                        @endforeach
                        @if ($recipe->tags->count() > 3)
                        <x-tag-box>
                            <i class="mt-1 fa-solid fa-ellipsis"></i>
                        </x-tag-box>
                        @endif
                    </div>

                </div>
                <div class="max-h-10 truncate">{{ $recipe->instructions }}</div>
            </x-white-box>
            @endforeach
        </div>
    </div>
</x-layout>