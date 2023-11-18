<x-layout>
    <div class="flex flex-col p-6 gap-6">
        <div class="text-gray-800 text-4xl whitespace-normal truncate"> {!! nl2br(e($recipe->title)) !!} </div>
        
        <!-- <div> Image </div> -->

        <div class="flex flex-row justify-between items-center">
            <div class="flex flex-col gap-0">
                <div class="text-gray-500 text-lg">
                    Created by
                    @if($is_author == true)
                    you
                    @else
                    <a class="hover:text-amber-800" href="{{route('user.show', ['user' => $author])}}">
                        {{$author->name}}
                    </a>
                    @endif
                </div>
                <div class="text-gray-500 text-sm"> {{ date('F j, Y', strtotime($recipe->updated_at)) }} </div>
            </div>
            @if($is_author == true)
            <a href="{{route('recipes.edit', ['recipe' => $recipe])}}">
                <button class="w-fit h-10 px-3 bg-amber-500 text-white rounded-xl p-2 hover:bg-amber-600">
                    Edit recipe
                    <i class="fas fa-edit"></i>
                </button>
            </a>

            <!-- Modal -->
            <div x-data="{ showModal: false }">
                <button @click="showModal = true" class="w-fit h-10 px-3 bg-rose-500 text-white rounded-xl p-2 hover:bg-rose-600">
                    Delete recipe
                    <i class="fas fa-trash"></i>
                </button>

                <div x-show="showModal" class="fixed inset-0 bg-black opacity-50"></div>

                <div x-show="showModal" class="fixed inset-0 flex items-center justify-center">
                    <div class="bg-[#d6d6d6] border-2 border-gray-800 p-8 rounded-xl shadow-md text-xl text-center">
                        <p class="mb-4">Are you sure you want to delete this recipe?</p>
                        <p class="mb-4">Art shall not be erased!
                            <i class="fa-solid fa-face-sad-tear"></i>
                        </p>

                        @error('delete')
                        <p class="text-rose-800">{{$message}}</p>
                        @enderror

                        <div class="flex justify-end gap-3">
                            <button @click="showModal = false" class="text-gray-500 mr-4 hover:text-gray-700">
                                Cancel
                                <i class="fas fa-ban"></i>
                            </button>
                            <form method="post" action="{{route('recipes.destroy', ['recipe' => $recipe])}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="p-2 bg-rose-500 hover:bg-rose-700 text-white rounded-xl">
                                    Delete
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            @endif
        </div>

        <div class="text-gray-800 text-xl">
        <i class="fa-solid fa-tag"></i> Tags
        </div>
        <div class="flex flex-wrap gap-2">
        @foreach($recipe->tags as $tag)
        <div class="border border-gray-700 border-1 text-gray-700 text-lg text-center items-center rounded-xl py-1 px-3 w-fit capitalize">#{{$tag->name}}</div>
        @endforeach    
        </div>

        <div class="text-gray-800 text-2xl">
        <i class="fa-solid fa-carrot"></i> Ingredients 
        </div>
        <div class="flex flex-col gap-3">
        @foreach($recipe->ingredients as $ingredient)
        <div class="text-lg text-center items-center rounded-lg pl-5 w-fit capitalize">
        <i class="fa-solid fa-circle fa-2xs"></i> {{$ingredient->name}}
        </div>
        @endforeach
        </div>

        <div class="text-gray-800 text-2xl">
        <i class="fa-solid fa-bowl-food"></i> Instructions
        </div>
        <div class="text-gray-700 text-lg">
            {!! nl2br(e($recipe->instructions)) !!}
        </div>
    </div>
</x-layout>