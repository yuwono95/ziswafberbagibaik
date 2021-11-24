<?php

namespace App\Http\Requests;

use App\Models\InputPerolehan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInputPerolehanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('input_perolehan_edit');
    }

    public function rules()
    {
        return [];
    }
}
