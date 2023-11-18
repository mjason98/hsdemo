<x-layout>
    <div class="flex flex-col gap-5 items-center jystify-center pt-10">
        <img class="outline outline-gray-800 outline-offset-2 h-32 w-32 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
        <div class="mt-5 text-gray-800 text-center text-4xl">{{$user->name}}</div>
        @if(auth()->id() == $user->id)
        <div class="text-gray-500">{{$user->email}}</div>
        <a class="ml-4 text-lg" href="{{route('user.edit', ['user' => $user])}}">
            <button class="w-fit h-10 px-3 bg-amber-500 text-white rounded-xl p-2 hover:bg-amber-600">
                Edit my profile
                <i class="fas fa-edit"></i>
            </button>
        </a>
        @else
        <div class="text-gray-800 text-center text-2xl">
            <i class="fa-solid fa-utensils"></i>
            Recent Recipes
            <i class="fa-solid fa-utensils fa-flip-horizontal"></i>
        </div>
        <div class="flex flex-col w-[80%] px-10 gap-10">
            @foreach($recipes as $recipe)
            <x-white-box-simple>
                <!-- image -->
                <a href="{{route('recipes.show', ['recipe' => $recipe])}}">
                    <div class="w-full text-2xl hover:text-blue-500 whitespace-normal truncate">{{ $recipe->title }}</div>
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
            </x-white-box-simple>
            @endforeach
        </div>
        @endif
    </div>
</x-layout>