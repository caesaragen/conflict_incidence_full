<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Incidence Report Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("Report an Incident") }} --}}
                    <x-secondary-button
                    class="p-2"
                    x-data=""
                    x-on:click.prevent=""
                >{{ __('Report an Incident') }}</x-secondary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
