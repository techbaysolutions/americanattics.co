<?php

namespace App\Http\Requests\sendEmail;
use App\Http\Requests\BaseRequest;
class QuotationDataRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
            'email' => 'required|email',
            'phone' => 'required',
            'name' => 'required',
            'service' => 'required',
            'requirement' => 'required',
        ];
    }
}
