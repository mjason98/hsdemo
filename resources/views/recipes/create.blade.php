<x-layout>
    <form class="flex flex-col p-6 gap-6" action="{{route('recipes.store')}}" method="post">
        @csrf
        <div class="flex flex-row w-full justify-center items-center">
            <button type="submit" class="text-xl w-fit h-10 px-4 bg-blue-700 text-white rounded-xl p-2 hover:bg-blue-900">
                <i class="fa-solid fa-file"></i>
                Create
            </button>
        </div>

        <textarea name="title" id="title" placeholder="# Title" class="text-gray-800 text-4xl resize-none border-none focus:outline-none bg-transparent w-full h-fit">{{old('title')}}</textarea>

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

        <textarea name="instructions" id="instructions" placeholder="Seteps ...." class="resize-none border-none focus:outline-none bg-transparent w-full">{{old('instructions')}}</textarea>


    </form>

</x-layout>