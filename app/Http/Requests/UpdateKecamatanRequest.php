<?php

namespace App\Http\Requests;

use App\Models\Kecamatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKecamatanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kecamatan_edit');
    }

    public function rules()
    {
        return [
            'namakecamatan' => [
                'string',
                'nullable',
            ],
        ];
    }
}
