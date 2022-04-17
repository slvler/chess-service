<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PanelUserStoreRequest extends FormRequest
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
            'name' => 'required|max:255|min:3',
            'email' => 'required|max:255|email',
            'password' => 'required|max:255',
            'repassword' => 'required|same:password',
            'default' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'İsim alanı zorunludur.',
            'email.required' => 'Mail alanı zorunludur.',
            'email.email' => 'Mail formatına uygun değildir.',
            'password.required' => 'Şifre alanı zorunludur.',
            'repassword.required' => 'Tekrar girilmesi zorunludur.',
            'default.required' => 'Rol Seçimi Zorunludur.',
            'repassword.same' => 'Şifreler eşleşmiyor.'
        ];
    }
}
