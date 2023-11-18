<x-layout>
    <form x-data="{ }" class="flex flex-col p-6 gap-6" action="{{route('recipes.store')}}" method="post">
        @csrf
        <div class="flex flex-row w-full justify-center items-center">
            <button type="submit" class="text-xl w-fit h-10 px-4 bg-blue-700 text-white rounded-xl p-2 hover:bg-blue-900">
                <i class="fa-solid fa-file"></i>
                Create
            </button>
        </div>

        <textarea x-ref="textarea_title" x-on:input="adjustRowsTitle" name="title" id="title" placeholder="# Title" class="text-gray-800 text-4xl h-auto resize-none border-none focus:outline-none bg-transparent w-full h-fit">{{old('title')}}</textarea>

        @error('title')
        <div class="text-red-500">{{ $message }}</div>
        @enderror

        <!-- <div> Image </div> -->

        <div class="text-gray-800 text-xl">
        <i class="fa-solid fa-tag"></i> Tags
        <span class="ml-2 text-gray-600 text-lg"> (each word is a tag)</span>
        </div>

        <textarea x-ref="textarea_tags" x-on:input="adjustRowsTags" name="tags" id="tags" placeholder="myfirstrecipe" class="h-auto resize-none border-none focus:outline-none bg-transparent w-full">{{old('tags')}}</textarea>

        @error('tags')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
        
        <div class="text-gray-800 text-2xl">
            <i class="fa-solid fa-carrot"></i>
            Ingredients
            <span class="ml-2 text-gray-600 text-lg"> (each line is interpreted as an ingredient <i class="fa-solid fa-face-smile-wink"></i>)</span>
        </div>

        <textarea x-ref="textarea_ingredients" x-on:input="adjustRowsIngredients" name="ingredients" id="ingredients" placeholder="my first ingredient" class="h-auto resize-none border-none focus:outline-none bg-transparent w-full">{{old('ingredients')}}</textarea>

        @error('ingredients')
        <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="text-gray-800 text-2xl">
            <i class="fa-solid fa-bowl-food"></i> Instructions
        </div>

        @error('instructions')
        <div class="text-red-500">{{ $message }}</div>
        @enderror

        <textarea x-ref="textarea_instructions" x-on:input="adjustRowsInstructions" name="instructions" id="instructions" placeholder="Seteps ...." class="h-auto resize-none border-none focus:outline-none bg-transparent w-full">{{old('instructions')}}</textarea>


    </form>

    <script>
        function adjustRowsTitle() {
            const textarea = this.$refs.textarea_title;
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }

        function adjustRowsTags() {
            const textarea = this.$refs?.textarea_tags;
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }

        function adjustRowsIngredients() {
            const textarea = this.$refs.textarea_ingredients;
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }
        
        function adjustRowsInstructions() {
            const textarea = this.$refs.textarea_instructions;
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }

        Alpine.data('adjustRowsTitle', adjustRowsTitle);
        Alpine.data('adjustRowsInstructions', adjustRowsInstructions);
    </script>

</x-layout>