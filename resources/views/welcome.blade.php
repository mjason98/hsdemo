<x-layout>
    <div class="flex items-center justify-center h-screen bg-cover bg-center bg-back">
            
    <!-- Left Column with Image Background -->
        <div class="w-1/2 h-full bg-cover bg-right invert relative" style="background-image: url('{{ asset('imgs/flbg.jpg')}}'); background-size: 600px;">
        </div>
        <!-- Right Column with Image Background -->
        <div class="w-1/2 h-full bg-cover bg-left relative" style="background-image: url('{{ asset('imgs/flbg.jpg')}}'); background-size: 600px;">
        </div>

        <!-- Centered Div on Top -->
        <div class="absolute z-10 bbox flex flex-col items-center gap-24 shadow-xl rounded-xl py-6 bg-white">
            <x-applogo />
            <div class="text-5xl text-center bold" style="font-family: 'Josefin Sans', sans-serif;">
                Create and discover through the love of food
            </div>
            <form action="{{ route('signin.form') }}" method="get">
                <button class="relative bg-black rounded-xl text-amber-500 py-2 px-6 border-b-4 border-amber-500 hover:border-blue-400 hover:text-blue-500">
                    Signin
                </button>
            </form>
        </div>
    </div>

    <style>
        .bbox{
            width: calc(100% - 200px);
            height: calc(100% - 200px);
        }
    </style>
</x-layout>