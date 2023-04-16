<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkTimeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'employee_id' => ['required', 'integer', 'max_digits:12']
        ];
    }

    public function getEmployeeId(): int
    {
        return $this->validated('employee_id');
    }
}
