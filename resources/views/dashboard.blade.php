<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (Auth()->user()->profile_id == 1)
            {{ __('Registro') }}
            @elseif (Auth()->user()->profile_id == 1)
            {{ __('Bandeja') }}
            @elseif (Auth()->user()->profile_id == 1)
            {{ __('Registro') }}
            @else
            {{ __('Dashboard') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (Auth()->user()->profile_id == 1)
                @livewire('registro')
                @elseif (Auth()->user()->profile_id == 2)
                @livewire('bandeja')
                @elseif (Auth()->user()->profile_id == 3)
                @livewire('registro')
                @else
                <x-jet-welcome />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
