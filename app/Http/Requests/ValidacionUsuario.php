<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuario extends FormRequest
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
        if ($this->route('id')) {
            return [
                'user' => 'required|max:50|alpha_dash|unique:usuarios,user,' . $this->route('id'),
                'dni' => 'numeric|required|digits_between:6,8|unique:usuarios,dni,' . $this->route('id'),
                'name' => 'required|max:50',
                'lastname' => 'required|max:50',
                'password' => 'nullable|min:6|
                regex:/^.*(?=.{1})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                're_password' => 'nullable|required_with:password|min:6|same:password',
                'rol_id' => 'required|integer'
            ];
        } else {
            return [
                'user' => 'required|max:50|alpha_dash|unique:usuarios,user,' . $this->route('id'),
                'dni' => 'numeric|required|digits_between:6,8|unique:usuarios,dni,' . $this->route('id'),
                'name' => 'required|max:50',
                'lastname' => 'required|max:50',
                'password' => 'required|min:6|
                regex:/^.*(?=.{1})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                're_password' => 'required|min:6|same:password',
                'rol_id' => 'required|integer'
            ];
        }    
    }

    public function messages()
    {
        return [
            'lastname.required'=>'El campo Apellido es requerido',
            'dni.required'=>'El campo Cedula es requerido',
            'dni.numeric'=>'El campo Cedula solo admite numeros',
            'dni.digits_between'=>'El campo Cedula debe tener entre 6 y 8 dígitos',
            'dni.unique'=>'El campo Cedula ya ha sido registrado',
            'user.unique'=>'El campo Usuario ya ha sido registrado',
            'password.regex' =>'la contraseña debe contener minimo un número una letra y un caracter especial'

        ];
    }
}
