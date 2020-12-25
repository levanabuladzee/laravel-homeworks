<?php

namespace App\Http\Controllers;

use App\Mail\PostApprovedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
        public function create() {
            return view('mail.mail');
        }

        public function send($data, Request $request) {
            Mail::to('admin@test.com')->send(new PostApprovedMail($data));

            return redirect()->route('mail.create');
        }
}
