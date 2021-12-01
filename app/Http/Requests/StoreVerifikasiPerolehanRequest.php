<?php

namespace App\Http\Requests;

use App\Models\VerifikasiPerolehan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVerifikasiPerolehanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('verifikasi_perolehan_create');
    }

    public function rules()
    {
        return [
            'verificator_id' => [
                'required',
                'integer',
            ],
        ];
    }
}