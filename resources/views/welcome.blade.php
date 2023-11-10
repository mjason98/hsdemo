<x-layout>
    <div class="h-screen bg-cover bg-center">
        <div class="w-full h-full flex mx-auto">

            <div class="flex flex-row w-full">
                <div class="flex basis-1/2 items-center justify-between bg-cover bg-center hidden sm:block" style="background-image:url('{{ asset('imgs/flbg.jpg')}}');">
                </div>

                <div class="flex grow min-h-full flex-col justify-center" style="background-image:url('{{ asset('imgs/bgalt.jpg')}}'); background-size: 500px;">
                    <div class="flex flex-row justify-center">
                        <div class="flex flex-col items-center gap-20 shadow-xl rounded-xl py-6 bg-white">
                            <x-applogo />
                            <div class="w-80 text-4xl text-center bold" style="font-family: 'Josefin Sans', sans-serif;">
                                Create and discover through the love of food 
                            </div>
                            <form action="{{ route('signin.form') }}" method="get">
                                <button class="relative bg-black rounded-xl text-amber-500 py-2 px-6 border-b-4 border-amber-500 hover:border-blue-400 hover:text-blue-500">
                                    Signin
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
    </div>
</x-layout>