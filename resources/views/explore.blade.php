<x-layout>
    <div class="flex flex-row">
        <div class="invert basis-1/5 min-w-[250px] flex flex-col gap-24 p-2 items-center justify-center" style="background-image: url('{{ asset('imgs/flbg.jpg')}}'); background-size: 2000px; height: calc(100vh - 64px);">
            <button class="invert flex flex-col max-h-fit items-center justify-center gap-4 w-3/4 bg-black rounded-xl text-rose-500 p-6 border-b-4 border-rose-500 hover:border-blue-400 hover:text-blue-500">
                <img src="{{ asset('imgs/im_nr.png') }}" class="w-28 h-28">
                <div class="flex flex-row items-center justify-center gap-2">
                    <i class="h-2 fa-solid fa-plus fa-xl"></i>
                    <div class="text-3xl text-center"> New Recepy </div>
                </div>
            </button>
            <button class="invert flex flex-col items-center justify-center gap-4 w-3/4 h-auto bg-black rounded-xl text-amber-500 p-6 border-b-4 border-amber-500 hover:border-blue-400 hover:text-blue-500">
                <img src="{{ asset('imgs/im_rc.png') }}" class="w-28 h-28">
                <div class="flex flex-row items-center justify-center gap-2">
                <i class="fa-solid fa-book fa-xl"></i>
                    <div class="text-3xl text-center"> My Recepies </div>
                </div>
            </button>
        </div>
        <div class="basis-4/5 flex flex-col">
            <div>
                Searched redepies / my 3 recent recpies
            </div>
            <div>
                recepy
            </div>
        </div>
    </div>
</x-layout>