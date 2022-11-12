<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-primary-button class="text-white rounded px-4 py-2 my-5 " onclick="location.href='/create'">{{ __('New Schedule') }}</x-primary-button>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                @foreach($schedules as $schedule)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="font-bold text-2xl text-gray-800 inline">{{ $schedule->begin }} </h1> 〜 
                        <h1 class="font-bold text-2xl text-gray-800 inline">{{ $schedule->end }} </h1>     
                        <h1 class="font-bold text-2xl text-gray-800 inline">{{ $schedule->place }}</h1> にて
                        <h1 class="m-2">{{ $schedule->content }} </h1>
                        <div class="flex flex-row-reverse">
                        <a href="" class="flex-initial w-7 h-7 hover:opacity-70"><img src="{{ asset('imgs/trash.svg') }}" alt="trash"></a>
                            <a href="" class="flex-initial w-7 h-7 hover:opacity-70"><img src="{{ asset('imgs/edit.svg') }}" alt="edit"></a>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
