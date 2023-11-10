<div class="flex items-center justify-center h-screen bg-cover bg-center" style="background-image: url('{{ asset('imgs/43030.jpg')}}'); background-size: 2000px;">
  <div class="absolute z-10 w-96 flex flex-col items-center gap-2 shadow-xl rounded-xl py-6 bg-white">
    <x-applogo />
    <h2 class="text-center mt-10 text-2xl font-bold leading-9 tracking-tight text-gray-900">{{$title}}</h2>

    <!-- form -->

    <form class="flex flex-col gap-2 mt-10 w-80" action="{{$actionurl}}" method="post" id="signinForm">
      @csrf
      {{ $slot }}
    </form>



    <div class="mt-8 text-center text-sm text-gray-500">
      {{ $changeMessageHeader }}
      <a href="{{route('signup.form')}}" class="font-semibold leading-6 text-indigo-700 hover:text-amber-600">
        {{ $changeMessageContent }}
      </a>
    </div>
  </div>
</div>