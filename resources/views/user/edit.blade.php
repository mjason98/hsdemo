<x-layout>
    <form method="post" action="{{route('user.update', ['user'=>$user])}}" class="flex flex-col gap-5 items-center jystify-center pt-10">
        @csrf
        @method('put')
        <img class="outline outline-gray-800 outline-offset-2 h-32 w-32 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
        <input id="name" name="name" type="text" class="mt-5 text-gray-800 text-center text-4xl border-none focus:outline-none bg-transparent w-full" value="{{old('name')??$user->name}}" />
        <div class="text-gray-500">{{$user->email}}</div>

        @error('name')
        <div class="text-red-500">{{ $message }}</div>
        @enderror
        @error('error')
        <div class="text-red-500">{{ $message }}</div>
        @enderror

        <button type="submit" class="w-fit h-10 px-3 bg-amber-500 text-white rounded-xl p-2 hover:bg-amber-600">
            Save
            <i class="fas fa-edit"></i>
        </button>
    </form>
</x-layout>