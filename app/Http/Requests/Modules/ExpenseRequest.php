<?php
namespace App\Http\Requests\Modules;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'expense_type_id' => 'required',
            'payment_mode_id' => 'required',
            'amount'          => 'required',
            'payment_date'    => 'required',
            'transaction_no'  => 'nullable',
            'description'     => 'nullable',
        ];
    }

    /**
     * Custom validation messages
     */
    public function messages(): array
    {
        return [
            'expense_type_id.required' => 'Expense type is required.',
            'payment_mode_id.required' => 'Please choose a payment mode.',
        ];
    }
}
