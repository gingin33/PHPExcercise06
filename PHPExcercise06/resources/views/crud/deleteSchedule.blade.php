<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Schedule') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg flex justify-center">
                <div class="text-3xl">{{ __('Are you sure you want to delete this schedule?')}}</div>
                <div class="flex">
                    <x-primary-button onclick="location.href='/delete/done/{{ $id }}'" class="ml-5 bg-red-500 hover:bg-red-300 h">{{ __('Delete') }}</x-primary-button>
                    <x-primary-button onclick="location.href='/'" class="ml-5">{{ __('Cancel') }}</x-primary-button>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
