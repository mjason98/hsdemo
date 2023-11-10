<div class="flex items-center justify-center h-screen bg-cover bg-center bg-back">

    <!-- Left Column with Image Background -->
    <div class="w-1/2 h-full bg-cover bg-right invert relative" style="background-image: url('{{ asset('imgs/43030.jpg')}}'); background-size: 2000px;">
    </div>
    <!-- Right Column with Image Background -->
    <div class="w-1/2 h-full bbox bg-cover bg-left relative" style="background-image: url('{{ asset('imgs/43030.jpg')}}'); background-size: 2000px;">
    </div>

    <!-- Centered Div on Top -->
    <div class="absolute z-10 flex flex-col items-center {{ $gap }} shadow-xl rounded-xl py-6 bg-white">
        {{ $slot }}
    </div>
</div>