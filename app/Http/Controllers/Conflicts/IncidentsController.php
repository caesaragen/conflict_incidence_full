<?php

namespace App\Http\Controllers\Conflicts;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncidentRequest;
use App\Models\ConflictIncident;
use App\Models\IncidentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class IncidentsController extends Controller
{

     /**
      * Method to show  conflict incidents 
      */ 
    public function index()
    {
        $incidents = ConflictIncident::all();

        return response()->json(['data' => $incidents]);
    }

        /**
         * Method to store a new conflict incident 
         */ 
    public function store(IncidentRequest $request)
    {
        // dd($request->all());

            $conservation_area = $request->input('conservation_area');
            $station = $request->input('station');
            $outpost = $request->input('outpost');
            $reporting_date_from = $request->input('reporting_date_from');
            $reporting_date_to = $request->input('reporting_date_to');
            $incident_type = $request->input('incident_type');
            $affected = $request->input('affected');
            $area = $request->input('area');
            $location = $request->input('location');
            $animal_responsible = $request->input('animal_responsible');
            $action_taken = $request->input('action_taken');
            $kws_ob_number = $request->input('kws_ob_number');
            $x_coordinate = $request->input('x_coordinate');
            $y_coordinate = $request->input('y_coordinate');
        
            // Add the authenticated user's ID as the user_id for the incident report
            $user_id = Auth::id();
            // Generate the serial number with the prefix "INC001"
            $latestIncident = ConflictIncident::latest()->first();
            $lastSerialNumber = $latestIncident ? (int)substr($latestIncident->serial_number, 3) : 0;
            $nextSerialNumber = $lastSerialNumber + 1;
            $serial_number = 'INC' . str_pad($nextSerialNumber, 3, '0', STR_PAD_LEFT);
        
    
            $incident = ConflictIncident::create(
                [
                'user_id' => $user_id,
                'conservation_area' => $conservation_area,
                'station' => $station,
                'outpost' => $outpost,
                'reporting_date_from' => $reporting_date_from,
                'reporting_date_to' => $reporting_date_to,
                'incident_type' => $incident_type,
                'affected' => $affected,
                'area' => $area,
                'location' => $location,
                'animal_responsible' => $animal_responsible,
                'action_taken' => $action_taken,
                'kws_ob_number' => $kws_ob_number,
                'x_coordinate' => $x_coordinate,
                'y_coordinate' => $y_coordinate,
                'serial_number' => $serial_number,
                ]
            );
            // dd($incident);
            $incident ->save();
    
            return redirect()->route('dashboard')->with('success', 'Conflict incident created successfully.');
   
    }
    
        /** 
         * Method to verify a conflict incident by an area warden
         * */ 
    public function verify(Request $request, ConflictIncident $incident)
    {
        // Ensure the authenticated user is an area warden (assuming role column in the users table)
        if (Auth::user()->role !== 'warden') {
            return response()->json(['error' => 'Unauthorized. Only area wardens can verify reports.'], 403);
        }
    
        // Perform the verification process (e.g., update verification status and verified_by)
        $incident->update(
            [
            'verified_by' => Auth::id(),
            'verification_status' => 'verified',
                ]
        );
    
        return response()->json(['message' => 'Conflict incident verified successfully.', 'data' => $incident]);
    }

     /**
      * Method to show conflict incidents on the dashboard
      */
    public function dashboard(Request $request)
    {
        $incidents = ConflictIncident::all();
        $incidentTypes = IncidentType::all();
        if ($request->ajax()) {
            $data = ConflictIncident::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn(
                    'created_at', function ($row) {
                        // Format the 'created_at' date using Carbon
                        return Carbon::parse($row->created_at)->format('Y-m-d');
                    }
                )
                ->addColumn(
                    'incident_type_name', function ($row) {
                        return $row->incidentType->name; // Assuming 'incidentType' is the relationship name and 'name' is the column for the incident type name
                    }
                )
                ->addColumn(
                    'action', function ($row) {
       
                            $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
      
                            return $btn;
                    }
                )
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('dashboard', compact('incidents', 'incidentTypes'));
    }
}
