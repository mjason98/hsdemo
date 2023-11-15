<x-layout>
    <form class="flex flex-col p-6 gap-6" action="{{route('recipes.store')}}" method="post">
        @csrf
        <div class="flex flex-row w-full justify-center items-center">
            <button type="submit" class="text-xl w-fit h-10 px-4 bg-blue-700 text-white rounded-xl p-2 hover:bg-blue-900">
                <i class="fa-solid fa-file"></i>
                Create
            </button>
        </div>

        <input value="{{old('title')?? '# Title' }}" type="text" name="title" id="title" class="text-gray-800 text-4xl bg-transparent">
        
        <!-- <div> Image </div> -->
        <!-- <div> Ingredients </div> -->
        <div class="text-gray-800 text-2xl">
            Instructions
        </div>

        <textarea name="instructions" id="instructions" rows="4" class="px-3 text-gray-700 text-lg bg-transparent h-auto">{{old('instructions') ?? 'Seteps ....' }}</textarea>
    </form>
</x-layout>