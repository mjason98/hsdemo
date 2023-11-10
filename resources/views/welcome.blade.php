<x-layout>
    <div class="h-screen bg-cover bg-center">
        <div class="w-full h-full flex mx-auto">

            <div class="flex flex-row w-full">
                <div class="flex basis-1/2 items-center justify-between bg-cover bg-center invert hidden sm:block" style="background-image:url('{{ asset('imgs/flbg.jpg')}}');">
                </div>

                <div class="flex grow min-h-full flex-col justify-center">
                    <div class="flex flex-row justify-center">
                        <div class="flex flex-col justify-center content-center items-center">
                            <div class="bg-black h-20 w-20 rounded-full">
                                <img class="p-4 mx-auto invert" src="{{ asset('icons/cooking.png') }}" alt="Xochi">
                            </div>
                            <div class="w-auto text-6xl" style="font-family: 'Oregon', sans-serif;"> Xochi </div>
                            <div>
                                catch
                            </div>
                            <div>
                                get started
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-layout>