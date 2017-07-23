<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event' => 'required|max:150',
            'date' => 'required',
            'time' => 'required',
            'preparationVenue' => 'required|max:150',
            'noOfHeads' => 'required|max:150',
            'preparationTime' => 'required',
            'client' => 'required|max:150',
            'mobile' => 'required|max:150',
            'email' => 'required|max:150',
            'message' => 'required|max:150'
        ];
    }

    public function messages()
    {
        return [
            'event.required' => 'Event is required',
            'date.required' => 'Date is Required',
            'time.required' => 'Time is Required',
            'preparationVenue.required' => 'Date is Required',
            'noOfHeads.required' => 'No Of Heads is Required',
            'preparationTime.required' => 'Preparation Time is Required',
            'client.required' => 'Client is Required',
            'mobile.required' => 'Mobile is Required',
            'email.required' => 'Email is Required',
            'message.required' => 'Message is Required',
            
            'event.max' => 'Event cannot exceed 150 characters',
            'preparationVenue.max' => 'Date cannot exceed 150 characters',
            'noOfHeads.max' => 'No Of Heads cannot exceed 150 characters',
            'client.max' => 'Client cannot exceed 150 characters',
            'mobile.max' => 'Mobile cannot exceed 150 characters',
            'email.max' => 'Email cannot exceed 150 characters',
            'message.max' => 'Message cannot exceed 150 characters',
        ];
    }
}
