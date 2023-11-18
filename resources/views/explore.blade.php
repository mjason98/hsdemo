<x-layout>
    <div class="flex flex-row w-full">
        <div class="invert w-[20%] min-w-[250px] flex flex-col gap-24 p-2 items-center justify-start" style="background-image: url('{{ asset('imgs/flbg.jpg')}}'); background-size: 2000px; height: calc(100vh - 64px);">
            <div class="h-[60px]"></div>
            <div class="flex flex-col gap-24 items-center justify-center w-full">
                <a href="{{route('recipes.create')}}" class="items-center justify-center flex felx-row w-full">
                    <button class="invert flex flex-col max-h-fit items-center justify-center gap-4 w-3/4 bg-black rounded-xl text-rose-500 p-6 border-b-4 border-rose-500 hover:border-blue-400 hover:text-blue-500">
                        <img src="{{ asset('imgs/im_nr.png') }}" class="w-28 h-28">
                        <div class="flex flex-row items-center justify-center gap-2">
                            <i class="h-2 fa-solid fa-plus fa-xl"></i>
                            <div class="text-3xl text-center"> New Recipe </div>
                        </div>
                    </button>
                </a>
                <a href="{{ route('recipes.index') }}" class="items-center justify-center flex felx-row w-full">
                    <button class="invert flex flex-col items-center justify-center gap-4 w-3/4 h-auto bg-black rounded-xl text-amber-500 p-6 border-b-4 border-amber-500 hover:border-blue-400 hover:text-blue-500">
                        <img src="{{ asset('imgs/im_rc.png') }}" class="w-28 h-28">
                        <div class="flex flex-row items-center justify-center gap-2">
                            <i class="fa-solid fa-book fa-xl"></i>
                            <div class="text-3xl text-center"> My Recipes </div>
                        </div>
                    </button>
                </a>
            </div>
        </div>
        <div class="flex flex-grow w-[80%] max-w-[60%] pl-10 pr-5 flex-col items-center justify-start gap-16" style="{height: calc(100vh - 64px);}">
            <div class="flex flex-row p-5 gap-10 items-center">
                <i class="fa-solid fa-star fa-xl"></i>
                <div class="text-5xl h-[48px]"> Today's suggestions </div>
                <i class="fa-solid fa-star fa-xl"></i>
            </div>
            <div class="flex flex-col gap-8 items-center justify-center w-full">
                @foreach($recipes as $recipe)
                <x-white-box-simple>

                    <div class="grid grid-cols-2 w-full">
                        <img src="{{$recipe->getImageUrl('thumbnail')}}" class="basis-1/3 flex rounded-xl w-[100px] h-[100px] border-2 border-gray-800" />
                        
                        <div class="basis-2/3 flex flex-col gap-1">
                            <div class="flex flex-wrap gap-1">
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
                    </div>

                    <a href="{{route('recipes.show', ['recipe' => $recipe])}}">
                        <div class="w-full h-24 text-2xl hover:text-blue-500 whitespace-normal truncate">{{ $recipe->title }}</div>
                    </a>
                    <div class="text-gray-500 text-lg">{{ date('F j, Y', strtotime($recipe->created_at)) }}</div>

                    <div class="max-h-10 truncate">{{ $recipe->instructions }}</div>
                </x-white-box-simple>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>