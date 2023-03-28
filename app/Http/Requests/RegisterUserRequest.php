<?php

namespace App\Http\Requests;

class RegisterUserRequest extends UserBaseRequest
{
    public function rules()
    {
        return [
            /**
             * @param Model/User
             */
            "name" => [
                "required",
                "string",
                "max:255"
            ],
        ];
    }
}
