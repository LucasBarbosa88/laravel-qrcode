<?php

namespace App\Http\Requests;

use App\Http\Requests\Api\ApiRequest;

class RegisterUserLinksRequest extends UserBaseRequest
{
    public function rules()
    {
      return [
          /**
           * @param Model/UserLinks
           */
        "linkedin_url" => [
          "required",
          "url"
        ],
        "github_url" => [
          "required",
          "url"
        ],
      ];
    }
}
