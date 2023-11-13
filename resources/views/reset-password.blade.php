<x-layout>
    <x-auth-form title="Forgot your password?" actionurl="{{ route('password.update') }}" changeMessageHeader="Not a member?" changeMessageContent="Create one for free" changeMessageUrl="{{route('signup.form')}}">
        <label for="email" class="tex-md font-medium text-gray-900">Email address</label>
        <input id="email" name="email" value="{{ old('email') }}" type="email" autocomplete="email" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

        @error('email')
            <x-error-message message="{{$message}}" />
        @enderror

        <label for="password" class="tex-md font-medium text-gray-900">New password</label>
        <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

        @error('password')
            <x-error-message message="{{$message}}" />
        @enderror


        <button type="submit" class="w-full bg-black rounded-xl text-amber-500 py-2 px-6 border-b-4 border-amber-500 hover:border-blue-400 hover:text-blue-500">Reset</button>
    </x-auth-form>
</x-layout>