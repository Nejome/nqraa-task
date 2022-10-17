<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'job' => 'required',
            'job_department' => 'required',
            'phone' => 'required',
        ] + ($this->isMethod('POST') ? $this->store() : $this->update());
    }

    public function store()
    {
        return [
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed']
        ];
    }

    public function update()
    {
        return [
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user)],
            'password' => ['nullable', 'confirmed']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'email.required' => 'حقل البريد الالكتروني مطلوب',
            'email.email' => 'القيمة المدخلة ليست بريد الكتروني صالح',
            'email.unique' => 'تم استخدام البريد الالكتروني من قبل',
            'job.required' => 'حقل الوظيفة مطلوب',
            'job_department.required' => 'حقل قسم الوظيفة مطلوب',
            'phone.required' => 'حقل رقم الجوال مطلوب',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.confirmed' => 'كملة المرور غير مطابقة',
        ];
    }
}
