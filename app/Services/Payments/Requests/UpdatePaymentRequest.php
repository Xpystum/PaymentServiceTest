<?php

namespace App\Services\Payments\Requests;

use App\Services\Payments\Models\PaymentMethod;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePaymentRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'method_id' => [ 'required', 'integer', 

            Rule::exists(PaymentMethod::class, 'id')
            ->where('active', true)]

        ];
    }
}
