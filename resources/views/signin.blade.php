<x-layout>
    <x-auth-form title="Sign in to your account" actionurl="{{ route('signin') }}" changeMessageHeader="Not a member?" changeMessageContent="Create one for free" changeMessageUrl="{{route('signup.form')}}">
        <label for="email" class="tex-md font-medium text-gray-900">Email address</label>
        <input id="email" name="email" value="{{ old('email') }}" type="email" autocomplete="email" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

        <div class="h-5">
            @error('email')
            <div class="text-rose-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <label for="password" class="tex-md font-medium leading-6 text-gray-900">Password</label>
            <a href="{{route('forgotpassword.index')}}" class=" text-smfont-semibold text-indigo-700 hover:text-amber-600"> Forgot password? </a>
        </div>
        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

        <div class="h-10">
            @error('password')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="w-full bg-black rounded-xl text-amber-500 py-2 px-6 border-b-4 border-amber-500 hover:border-blue-400 hover:text-blue-500">Sign in</button>
    </x-auth-form>
</x-layout>