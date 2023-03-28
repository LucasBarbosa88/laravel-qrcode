<?php

namespace App\Services\Models;

use App\Models\UserLinks;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class RegisterUserLinksService extends BaseService
{
    protected $data = [];

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function run() {
        $userLinks = new UserLinks($this->data);
        if($userLinks->save()) {
            return $userLinks->refresh();
        }
        try {} catch (\Throwable $th) {
            report($th);
        }
        return false;
    }
}