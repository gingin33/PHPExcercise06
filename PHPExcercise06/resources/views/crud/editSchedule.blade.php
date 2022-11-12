<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Schedule') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg flex justify-center">
                <form class="form font-bold" method="POST" action="{{ route('doEdit') }}">
                    @csrf
                    <div class="my-5">
                        <x-input-label for="place" :value="__('Begin')" />   
                        <input class="p-2 text-sm border-1 rounded-md focus:border-gray-800" type="datetime-local" name="begin" value="{{ $schedule->begin }}">
                    </div>

                    <div class="my-5">
                        <x-input-label for="place" :value="__('End')" />   
                        <input class="p-2 text-sm border-1 rounded-md focus:border-gray-800" type="datetime-local" name="end" value="{{ $schedule->end }}">
                    </div>

                    <div class="my-5">
                        <x-input-label for="place" :value="__('Place')" />   
                        <input class="p-2 text-sm border-1 rounded-md focus:border-gray-800 block" type="text" name="place" value="{{ $schedule->place }}"/>
                        <x-input-error :messages="$errors->get('place')" class="mt-2" />
                    </div>  

                    <div class="my-5">
                        <x-input-label for="place" :value="__('Content')" />
                        <input class="p-2 text-sm border-1 rounded-md focus:border-gray-800 block" type="text" name="content" value="{{ $schedule->content }}"/>
                    </div>
                    <x-primary-button class="ml-5">{{ __('Submit') }}</x-primary-button>
                </form> 
            </div>
        </div>
    </div>
</x-app-layout>
