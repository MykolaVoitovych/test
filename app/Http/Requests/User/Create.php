<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Create extends FormRequest
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
            'name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|phone',
            'avatar' => 'required|image',
            'sex' => Rule::in(User::MALE, User::FEMALE),
            'agree_email_notify' => 'required|boolean',
        ];
    }
}
