<?php

namespace App\Http\Requests;

use App\Models\InputPerolehan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInputPerolehanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('input_perolehan_create');
    }

    public function rules()
    {
        return [
            'namadonatur' => [
                'string',
                'nullable',
            ],
            'nomorhp' => [
                'string',
                'nullable',
            ],
            'namabank_id' => [
                'required',
                'integer',
            ],
            'buktitransfer' => [
                'required',
            ],
        ];
    }
}
