<x-layout>
    <div class="py-3 px-4 flex flex-col w-full gap-4 items-center" style="height: calc(100vh - 64px);">
        <form class="flex flex-col sm:flex-row w-70 text-xl sm:h-fit p-4 gap-10 sm:gam-5" action="{{route('search.index')}}" method="get">
            <input class="text-gray-800 text-4xl h-auto resize-none border-2 rounded-xl border-gray-800 p-3 focus:outline-none bg-white" type="text" name="search_string" id="search_string" value="{{old('search_string')}}" placeholder="title, ingredients, tags"/>
            
            <x-basic-button>
                <i class="h-2 fa-solid fa-search fa-md"></i>
                Search
            </x-basic-button>
        </form>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 w-full gap-2 px-4 overflow-y-auto scrollbar-thin scrollbar-thumb-black scrollbar-track-goldenrod" style="height: calc(100vh - 72px);">
            <div> a </div>
            <div> a </div>
            <div> a </div>
            <div> a </div>
        </div>
    </div>
</x-layout>