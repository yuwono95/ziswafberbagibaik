<?php

namespace App\Http\Requests;

use App\Models\VerifiedStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVerifiedStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('verified_status_create');
    }

    public function rules()
    {
        return [
            'status' => [
                'string',
                'required',
                'unique:verified_statuses',
            ],
        ];
    }
}
