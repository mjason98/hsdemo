<x-layout>
    <div class="flex items-center justify-center h-screen bg-cover bg-center" style="background-image: url('{{ asset('imgs/flbg.jpg')}}'); background-size: 2500px;">
        <div class="absolute z-10 w-96 flex flex-col items-center gap-2 shadow-xl rounded-xl py-6 bg-white">
            <x-applogo />
            <h2 class="text-center mt-8 text-2xl font-bold leading-9 tracking-tight text-gray-900">Verifaction sent!</h2>

            <i class="mt-10 fa-solid fa-envelope fa-2xl"></i>
            <div class="mt-3">
                Check your email inbox!
            </div>
        </div>
    </div>
</x-layout>