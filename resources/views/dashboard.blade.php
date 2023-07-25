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
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <x-secondary-button class="p-2" x-data=""  x-on:click.prevent="$dispatch('open-modal', 'incident-report-modal')"
                        data-modal-toggle="incident-report-modal">
                        {{ __('Report an Incident') }}</x-secondary-button>

                    <div class="max-w-2xl mx-auto">

                        <table class="table table-bordered data-table">
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
                                    {{-- <th width="100px">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
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
<script type="text/javascript">
    $(function () {
        
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          responsive: true,
          ajax: "{{ route('dashboard') }}",
          columns: [
              {data: 'created_at', name: 'created_at'},
              {data: 'incident_type_name', name: 'incident_type_name'},
              {data: 'affected', name: 'affected'},
              {data: 'location', name: 'location'},
              {data: 'conservation_area', name: 'conservation_area'},
              {data: 'station', name: 'station'},
              {data: 'outpost', name: 'outpost'},
              {data: 'reporting_date_from', name: 'reporting_date_from'},
              {data: 'reporting_date_to', name: 'reporting_date_to'},
              {data: 'serial_number', name: 'serial_number'},
              {data: 'area', name: 'area'},
              {data: 'animal_responsible', name: 'animal_responsible'},
              {data: 'action_taken', name: 'action_taken'},
              {data: 'kws_ob_number', name: 'kws_ob_number'},
              {data: 'x_coordinate', name: 'x_coordinate'},
              {data: 'y_coordinate', name: 'y_coordinate'},
            //   {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
        
    });
  </script>
