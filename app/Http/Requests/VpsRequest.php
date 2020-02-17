<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class VpsRequest extends FormRequest
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
        $os = array_keys(operating_systems());
        $vpsTypes = array_keys(vpn_types());
        $periods = array_keys(vps_periods());

        return [
            // 'user_id' => ['required', 'exists:users'],
            'username' => ['required', 'email'],
            'password' => ['required'],
            'server_ip' => ['required'],
            'operating_system' => ['required', Rule::in($os)],
            'vpn_type' => ['required', Rule::in($vpsTypes)],
            // 'vpn_connection' => 'required',
            // 'port' => 'required',
            'period' => ['required', Rule::in($periods)],
            // 'expired_date' => ['required', 'date'],
            // 'added_date' => ['required', 'date'],
        ];
    }
}
