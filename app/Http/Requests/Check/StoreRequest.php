<?php

namespace App\Http\Requests\Check;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

/*
        if ($this->user_id == auth()->user()->id ) {

            return true;

        }else{

          return false;

        }

        */

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {



// para cunado no se quiera Publicar
        $rules =[

'encargado' => 'required',
'fecha' => 'required',
'status' => 'required|in:1,2', //solo puede tomar el valor de 1 o 2
'file'=>'image'


];

// para cuando si se quiera publicar
if ($this->status == 2) {

  $rules = array_merge($rules,[

'nombre' => 'required',
'direccion' => 'required',
'telefono' => 'required',
'correo' => 'required',
'patente' => 'required|string|min:7|max:7',
'problema' => 'required|string|min:2|max:255',
'solucion' => 'required|string|min:2|max:255',
'reparaciones' => 'required',


  ]);

}

return $rules;

    }
}
