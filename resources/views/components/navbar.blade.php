@auth
<nav class="bg-gray-900" x-data="{ open_menu:false }">
    <div class="mx-2 px-2 sm:px-6 lg:px-8 w-full">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" @click="open_menu = !open_menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
                            Icon when menu is closed.

                            Menu open: "hidden", Menu closed: "block"
                        -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
                            Icon when menu is open.

                            Menu open: "block", Menu closed: "hidden"
                        -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center invert">
                    <img class="h-8 w-auto" src="{{ asset('icons/cooking.png') }}" alt="Xochi">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        @foreach($nav_tabs as $tab)
                        <a href="{{$tab->url}}" class="text-white hover:text-amber-200 px-3 py-2 text-sm font-medium" aria-current="page">{{ $tab->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Profile dropdown -->
                <div class="relative ml-3" x-data="{open_profile:false}">
                    <div class="flex flex-row items-center gap-x-1">
                        <div class="p-2 text-white hidden sm:block" > {{Auth::user()->name}} </div>
                        <button type="button" @click="open_profile = !open_profile" 
                        class="relative flex rounded-full bg-gray-800 text-sm hover:outline-none hover:ring-2 hover:ring-amber-200 hover:ring-offset-2 hover:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <img class="h-8 w-8 rounded-full" src="{{Auth::user()->getImageUrl('thumbnail')}}" alt="">
                        </button>
                    </div>

                    <div x-show="open_profile" class="bg-gray-900 absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="{{route('user.show', ['user'=>Auth::user()])}}" class="block px-4 py-2 text-sm text-white hover:text-amber-200" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                        <form method="post" action="{{ route('signout') }}">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-white hover:text-amber-200" >Sign Out</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="open_menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
        @foreach($nav_tabs as $tab)
            <a href="{{$tab->url}}" class="text-white block hover:text-amber-200 px-3 py-2 text-base font-medium" aria-current="page">{{$tab->name}}</a>
        @endforeach
        </div>
    </div>
</nav>
@endauth