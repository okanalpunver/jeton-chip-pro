<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->method() == 'POST') {
            return auth()->user()->email == 'baskinvolkan@gmail.com';
        }

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
            'fqdn' => ['required', 'string', 'max:255', ($this->method() == 'POST') ? "unique:sites" : "unique:sites,fqdn,$this->id"],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['digits:10', 'nullable'],
            'whatsapp' => ['digits:10', 'nullable'],
            'skype' => ['string', 'max:255', 'nullable'],
            'address' => ['string', 'max:255', 'nullable'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'fqdn' => 'Alan adı',
            'name' => 'Site Adı',
            'email' => 'E-Posta Adresi',
            'phone' => 'Telefon numarası',
            'whatsapp' => 'WhatsApp numarası',
            'skype' => 'Skype',
            'address' => 'Adres',
        ];
    }
}
