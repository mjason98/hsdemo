<div class="flex items-center justify-center h-screen bg-cover bg-center" style="background-image: url('{{ asset('imgs/43030.jpg')}}'); background-size: 2000px;">
  <div class="absolute z-10 w-96 flex flex-col items-center gap-2 shadow-xl rounded-xl py-6 bg-white">
    <x-applogo />
    <h2 class="text-center mt-10 text-2xl font-bold leading-9 tracking-tight text-gray-900">{{$title}}</h2>

    <!-- form -->

    <form class="flex flex-col gap-2 mt-10 w-80" action="{{ route('signin') }}" method="post" id="signinForm">
      @csrf
      <label for="email" class="tex-md font-medium text-gray-900">Email address</label>
      <input id="email" name="email" value="{{ old('email') }}" type="email" autocomplete="email" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

      <div class="h-5">
        @error('email')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
      </div>

      <div class="flex items-center justify-between">
        <label for="password" class="tex-md font-medium leading-6 text-gray-900">Password</label>
        <a href="#" class=" text-smfont-semibold text-indigo-700 hover:text-amber-600"> Forgot password? </a>
      </div>
      <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
      <button type="submit" class="mt-10 w-full bg-black rounded-xl text-amber-500 py-2 px-6 border-b-4 border-amber-500 hover:border-blue-400 hover:text-blue-500">Sign in</button>
    </form>

    <div class="h-8">
        @error('password')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
      </div>

    <div class="text-center text-sm text-gray-500">
      Not a member?
      <a href="{{route('signup.form')}}" class="font-semibold leading-6 text-indigo-700 hover:text-amber-600">
        Create one for free
      </a>
    </div>
  </div>
</div>