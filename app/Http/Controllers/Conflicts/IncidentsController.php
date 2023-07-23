<?php

namespace App\Http\Controllers\Conflicts;

use App\Http\Controllers\Controller;
use App\Models\ConflictIncident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
            'conservation_area' => 'required|string|max:255',
            'station' => 'required|string|max:255',
            'outpost' => 'required|string|max:255',
            'reporting_date_from' => 'required|date',
            'reporting_date_to' => 'required|date|after_or_equal:reporting_date_from',
            'serial_number' => 'nullable|integer',
            'incident_date' => 'required|date',
            'incident_type' => 'required|string|max:255',
            'affected_area' => 'required|string|max:255',
            'gps_area' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'animal_responsible' => 'required|string|max:255',
            'action_taken' => 'required|string|max:255',
            'kws_ob_number' => 'nullable|string|max:255',
            'x_coordinate' => 'nullable|string|max:255',
            'y_coordinate' => 'nullable|string|max:255',
            ]
        );
        
    
        // Add the authenticated user's ID as the user_id for the incident report
        $validatedData['user_id'] = Auth::id();
        dd($validatedData);
    
        $incident = ConflictIncident::create($validatedData);
    
        return response()->json(['message' => 'Conflict incident created successfully.', 'data' => $incident]);
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
    public function dashboard(): View
    {
        $incidents = ConflictIncident::all();
        // dd($incidents);
        return view('dashboard', ['incidents' => $incidents]);
    }
}
