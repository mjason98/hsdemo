<x-layout>
    <div class="flex flex-col w-full gap-4" style="background-image: url('{{ asset('imgs/flbg.jpg')}}'); background-size: 2000px; height: calc(100vh - 64px);">
        <div class="">
            New recepy
        </div>
        <div class="grid grid-cols-2 w-full gap-4">
        @foreach($recepies as $recepy)
        <div class="bg-black rounded-xl text-white"> 
            {{ $recepy }}
        </div>
        @endforeach
        </div>
    </div>
</x-layout>