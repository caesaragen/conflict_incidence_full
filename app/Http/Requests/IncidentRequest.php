<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'conservation_area'  => ['required', 'string' ],
            'station' => ['required', 'string' ],
            'outpost'  => ['required', 'string' ],
            'incident_type' => ['required', 'string' ], 
            'affected' => ['required', 'string' ],
            'area' => ['nullable', 'string' ], 
            'location' => ['required', 'string' ],
            'animal_responsible' => ['required', 'string' ], 
            'action_taken' => ['required', 'string' ],
            'kws_ob_number' => ['nullable', 'string' ], 
            'x_coordinate' => ['nullable', 'string' ],
            'y_coordinate' => ['nullable', 'string' ],
            'reporting_date_from' => ['required', 'date' ],
            'reporting_date_to' => ['nullable', 'date', 'after_or_equal:reporting_date_from' ],
        ];
    }

       /**
        * Get the error messages for the defined validation rules.
        *
        * @return array<string, mixed>
        */
    public function messages()
    {
        return [
            'conservation_area.required' => 'The conservation area field is required.',
            'station.required' => 'The station field is required.',
            'outpost.required' => 'The outpost field is required.',
            'incident_type.required' => 'The incident type field is required.',
            'affected.required' => 'The affected area field is required.',
            'location.required' => 'The location field is required.',
            'animal_responsible.required' => 'The animal responsible field is required.',
            'action_taken.required' => 'The action taken field is required.',
            'reporting_date_from.required' => 'The reporting date (from) field is required.',
            'reporting_date_to.after_or_equal' => 'The reporting date (to) must be after or equal to the reporting date (from).',
        ];
    }
}
