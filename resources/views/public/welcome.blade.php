<x-layout>
    <div class="flex items-center justify-center h-screen bg-cover bg-center bg-back">
            
    <!-- Left Column with Image Background -->
        <div class="w-1/2 h-full bg-cover bg-right invert relative" style="background-image: url('{{ asset('imgs/43030.jpg')}}'); background-size: 2000px;">
        </div>
        <!-- Right Column with Image Background -->
        <div class="w-1/2 h-full bbox bg-cover bg-left relative" style="background-image: url('{{ asset('imgs/43030.jpg')}}'); background-size: 2000px;">
        </div>

        <!-- Centered Div on Top -->
        <div class="absolute z-10 w-96 flex flex-col items-center gap-32 shadow-xl rounded-xl py-6 bg-white">
            <x-applogo />
            <div class="text-5xl w-80 text-center bold" style="font-family: 'Josefin Sans', sans-serif;">
                Create and discover through the love of food
            </div>
            <form action="{{ route('login') }}" method="get">
                <button class="relative bg-black rounded-xl text-amber-500 py-2 px-6 border-b-4 border-amber-500 hover:border-blue-400 hover:text-blue-500">
                    Sign in
                </button>
            </form>
        </div>
    </div>    
</x-layout>