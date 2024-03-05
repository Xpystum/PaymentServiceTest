<?php

namespace App\Services\Payments\App\Requests;

use App\Services\Payments\Database\Models\PaymentMethod;

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
        //TODO убрать проверку на споосб оплаты
        return [

            'method_id' => [ 'required', 'integer']

        ];
    }
}
