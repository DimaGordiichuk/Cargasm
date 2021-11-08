<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Service;

class FilterUserServicesRequest extends FormRequest
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
            'filter' => ['required', Rule::in([Service::SERVICE_PUBLISHED, Service::SERVICE_MODERATE, Service::SERVICE_REJECTED, Service::SERVICE_DRAFT])]
        ];
    }
}
