<x-layout>
    <form enctype="multipart/form-data" x-data="{ isLoaded: false }" class="flex flex-col p-6 gap-6" action="{{route('recipes.update', ['recipe'=> $recipe])}}" method="post">
        @csrf
        @method('put')

        <div class="flex flex-row w-full justify-center items-center">
            <button type="submit" class="text-xl w-fit h-10 px-4 bg-amber-500 text-white rounded-xl p-2 hover:bg-amber-700">
                <i class="fa-solid fa-edit"></i>
                Edit Recipe
            </button>
        </div>

        <textarea x-ref="textarea_title" x-on:input="adjustRowsTitle" name="title" id="title" placeholder="# Title" class="text-gray-800 text-4xl h-auto resize-none border-none focus:outline-none bg-transparent w-full h-fit">{{old('title')?? $recipe->title }}</textarea>

        @error('title')
        <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="w-full flex flex-row justify-center items-center">
            <img src="{{$recipe->getImageUrl('preview')}}" class="rounded-xl w-80 h-80 border-2 border-gray-800" />
        </div>

        <input type="file" name="image" id="image" accept="image/*" value="{{old('image')}}">

        @error('image')
        <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="text-gray-800 text-xl">
        <i class="fa-solid fa-tag"></i> Tags
        <span class="ml-2 text-gray-600 text-lg"> (each word is a tag)</span>
        </div>

        <textarea x-ref="textarea_tags" x-on:input="adjustRowsTags" name="tags" id="tags" placeholder="myfirstrecipe" class="h-auto resize-none border-none focus:outline-none bg-transparent w-full">{{old('tags')?? $recipe->tags }}</textarea>

        @error('tags')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
        
        <div class="text-gray-800 text-2xl">
            <i class="fa-solid fa-carrot"></i>
            Ingredients
            <span class="ml-2 text-gray-600 text-lg"> (each line is interpreted as an ingredient <i class="fa-solid fa-face-smile-wink"></i>)</span>
        </div>

        <textarea x-ref="textarea_ingredients" x-on:input="adjustRowsIngredients" name="ingredients" id="ingredients" placeholder="my first ingredient" class="h-auto resize-none border-none focus:outline-none bg-transparent w-full">{{old('ingredients')?? $recipe->ingredients }}</textarea>

        @error('ingredients')
        <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="text-gray-800 text-2xl">
            <i class="fa-solid fa-bowl-food"></i> Instructions
        </div>

        @error('instructions')
        <div class="text-red-500">{{ $message }}</div>
        @enderror

        <textarea x-ref="textarea_instructions" x-on:input="adjustRowsInstructions" name="instructions" id="instructions" placeholder="Seteps ...." class="h-auto resize-none border-none focus:outline-none bg-transparent w-full">{{old('instructions')?? $recipe->instructions }}</textarea>


    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            adjustRowsTitle();
            adjustRowsTags();
            adjustRowsIngredients();
            adjustRowsInstructions();
        });

        function adjustRowsTitle() {
            const textarea = this.$refs?.textarea_title ?? document.getElementById("title");
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }

        function adjustRowsTags() {
            const textarea = this.$refs?.textarea_tags ?? document.getElementById("tags");
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }

        function adjustRowsIngredients() {
            const textarea = this.$refs?.textarea_ingredients ?? document.getElementById("ingredients");
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }

        function adjustRowsInstructions() {
            const textarea = this.$refs?.textarea_instructions ?? document.getElementById("instructions");
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }

        Alpine.data('adjustRowsTitle', adjustRowsTitle);
        Alpine.data('adjustRowsInstructions', adjustRowsInstructions);
        Alpine.data('adjustRowsIngredients', adjustRowsIngredients);
        Alpine.data('adjustRowsTags', adjustRowsTags);
    </script>

</x-layout>