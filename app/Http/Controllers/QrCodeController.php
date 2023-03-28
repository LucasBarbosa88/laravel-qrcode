<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function generate() {
        return view('index');
    }

    public function qrCode($user_name) {
        return view('qrCode', compact('user_name'));
    }
}
