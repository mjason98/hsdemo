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
        <!-- <div> Ingredients </div> -->
        <div class="text-gray-800 text-2xl">
            Instructions
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
        
        function adjustRowsInstructions() {
            const textarea = this.$refs.textarea_instructions;
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }

        Alpine.data('adjustRowsTitle', adjustRowsTitle);
        Alpine.data('adjustRowsInstructions', adjustRowsInstructions);
    </script>

</x-layout>