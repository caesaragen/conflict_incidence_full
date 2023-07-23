<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Incidence Report Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <x-secondary-button class="p-2" x-data="" x-on:click.prevent=""
                        data-modal-toggle="default-modal">
                        {{ __('Report an Incident') }}</x-secondary-button>
                   
                    <div class="max-w-2xl mx-auto">

                        <table id="conflict-incidents-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Incident Type</th>
                                    <th>Affected Area</th>
                                    <th>Location</th>
                                    <th>Conservation Area</th>
                                    <th>Station</th>
                                    <th>Outpost</th>
                                    <th>REPORTING DATE (From)</th>
                                    <th>To</th>
                                    <th>Serial Number</th>
                                    <th>Affected Area</th>
                                    <th>Animal Responsible</th>
                                    <th>Action Taken</th>
                                    <th>KWS OB NO</th>
                                    <th>X-Coordinates</th>
                                    <th>Y-Coordinates</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incidents as $incident)
                                    <tr>
                                        <td>{{ $incident->incident_date }}</td>
                                        <td>{{ $incident->incident_type }}</td>
                                        <td>{{ $incident->affected_area }}</td>
                                        <td>{{ $incident->location }}</td>
                                        <td>{{ $incident->conservation_area }}</td>
                                        <td>{{ $incident->station }}</td>
                                        <td>{{ $incident->outpost }}</td>
                                        <td>{{ $incident->reporting_date_from }}</td>
                                        <td>{{ $incident->reporting_date_to }}</td>
                                        <td>{{ $incident->serial_number }}</td>
                                        <td>{{ $incident->gps_area }}</td>
                                        <td>{{ $incident->animal_responsible }}</td>
                                        <td>{{ $incident->action_taken }}</td>
                                        <td>{{ $incident->kws_ob_number }}</td>
                                        <td>{{ $incident->x_coordinate }}</td>
                                        <td>{{ $incident->y_coordinate }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Main modal -->

                        @include('components.incident-report-modal')

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- @section('scripts')
    <script>
        // Use Highcharts Data Table module
        Highcharts.dataTable({
            table: 'conflict-incidents-table',
            // Additional configurations if needed
        });
    </script>
@endsection --}}
