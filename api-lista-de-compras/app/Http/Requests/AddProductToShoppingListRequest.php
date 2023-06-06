<?php

namespace App\Http\Requests;

class AddProductToShoppingListRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ];
    }

}
