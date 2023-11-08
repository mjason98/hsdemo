<x-layout>
    @guest
    
    <!-- <p> Wellcome
    <p> Foto -->
    
    <x-auth-form/>
    
    @endguest

    @auth
    
    link to posts
    
    @endauth
</x-layout>