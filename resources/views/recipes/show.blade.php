<x-layout>
    <div class="flex flex-col p-6 gap-6">
        <div class="text-gray-800 text-4xl whitespace-normal truncate"> {!! nl2br(e($recipe->title)) !!} </div>
        <div class="flex flex-row justify-between items-center">
            <div class="flex flex-col gap-0">
                <div class="text-gray-500 text-lg">
                    Created by
                    @if($is_author == true)
                    you
                    @else
                    <a href="#">
                        {{$author_name}}
                    </a>
                    @endif
                </div>
                <div class="text-gray-500 text-sm"> {{ date('F j, Y', strtotime($recipe->updated_at)) }} </div>
            </div>
            @if($is_author == true)
            <a href="#">
                <button class="w-fit h-10 px-3 bg-amber-500 text-white rounded-xl p-2 hover:bg-amber-600">
                    Edit recipe
                    <i class="fas fa-edit"></i>
                </button>
            </a>
            <a href="#">
                <button class="w-fit h-10 px-3 bg-rose-500 text-white rounded-xl p-2 hover:bg-rose-600">
                    Delete recipe
                    <i class="fas fa-trash"></i>
                </button>
            </a>
            @endif
        </div>
        <!-- <div> Image </div> -->
        <!-- <div> Ingredients </div> -->
        <div class="text-gray-800 text-2xl">
            Instructions
        </div>
        <div class="text-gray-700 text-lg">
            {!! nl2br(e($recipe->instructions)) !!}
        </div>
    </div>
</x-layout>