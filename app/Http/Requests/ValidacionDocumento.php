<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionDocumento extends FormRequest
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

        // extends Validator only for this request
        \Validator::extend( 'composite_unique', function ( $attribute, $value, $parameters, $validator ) {
                
                // remove first parameter and assume it is the table name
                //elimina el ultimo atributo que se agrega sin querer
            array_pop($parameters);

            //dd($attribute, $value, $parameters, $validator);

                $table = array_shift( $parameters ); 

                // start building the conditions
                $fields = [ $attribute => $value ]; // current field, company_code in your case

                // iterates over the other parameters and build the conditions for all the required fields
                
                    //dd($parameters);
                while ( $field =  array_shift($parameters) ) {
                 
                    $fields[ $field ] = $this->get( $field );
                }

                 //$fields[id] .= $this->get( $field );
                 //dd($fields);
                //dd( $this->route('id'));


                // query the table with all the conditions
                $result = \DB::table( $table )->select( \DB::raw( 1 ))->where($fields)->where('id', '!=', $this->route('id'))->first();
                //dd($result);
                return empty( $result ); // edited here
            }, 'La composicion de los campos  (\'Tipo\' \'Identificador\' y \'Nro de Control\' ) ya esta resgistrado');

        return [
            'title' => 'required|max:100',
            //'tipo_document_id' => 'max:30' . 
            'tipo_document_id' => 'required|max:30|composite_unique:documentos,identificador,ncontrol,' . $this->route('id'),
             // 'identificador' => 'required',
             // 'ncontrol' => 'required',
            // 'editorial' => 'nullable|max:50',
            // 'foto_up' => 'nullable|image|max:1024'
        ];
    }

    public function messages()
    {
        return [
            // 'isbn.unique' => 'Ya existe un libro con ese ISBN',
            // 'foto_up.max' => 'La caratula no puede tener un peso mayor a 1MB'
        ];
    }
}
