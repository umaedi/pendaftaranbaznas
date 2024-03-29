<?php

namespace App\Http\Controllers;

use App\Mail\PenolakanMail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function verifikasi(Request $request)
    {
        $data = $request->data;
        Mail::to($data['email'])->send(new SendMail($data));
    }

    public function penolakan(Request $request)
    {
        $data = ['ketrangan' => $request->keterangan];
        Mail::to($request->email)->send(new PenolakanMail($data));
    }
}
