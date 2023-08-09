<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
           
  
            'email'=> 'required',
            'phone'=> 'required',
            'address'=> 'required',
            'user_id'=> 'required',
            'product_name'=> 'required',
            'product_id'=> 'required',
      
            'price'=> 'required|max:10',
            'image'=> 'image',
            'quantity'=> 'required',
            'payment_status'=> 'required',
            'dilivery_status'=> 'required',
        ];
    }
}
