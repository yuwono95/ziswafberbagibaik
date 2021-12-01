<?php

namespace App\Http\Requests;

use App\Models\VerifikasiPerolehan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVerifikasiPerolehanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('verifikasi_perolehan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:verifikasi_perolehans,id',
        ];
    }
}
