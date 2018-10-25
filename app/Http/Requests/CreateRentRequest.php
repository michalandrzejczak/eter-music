<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CreateRentRequest extends FormRequest
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
            'dates_input' => 'required',
            'user' => 'required',
            'instrument_id' => 'required'
        ];
    }
    public function filter()
    {
        $data = $this->all();

        $dates = explode(',',$data['dates_input']);

        $numberOfDays = count($dates);
        $data['start'] = $dates[0].' 00:00:00';
        if($numberOfDays== 1){
            $data['end'] = $dates[0].' 23:59:59';
        }
        else
        {
            $data['end'] = $dates[$numberOfDays-1].' 23:59:59';
        }
        unset($data['dates_input']);

        $rentStartDate = Carbon::createFromFormat("Y-m-d H:i:s", $data['start']);
        $rentEndDate = Carbon::createFromFormat("Y-m-d H:i:s", $data['end']);

        if(($rentEndDate->diffInDays($rentStartDate)+1) == $numberOfDays)
            return $data;
        else
            return NULL;
    }
}
