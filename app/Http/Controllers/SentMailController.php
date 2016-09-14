<?php

namespace App\Http\Controllers;

use App\Helpers\SendEmail;
use App\Models\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GridGenerator;
use App\Http\Requests\MailerRequest;
use Krucas\Notification\Facades\Notification;

class SentMailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $grid = GridGenerator::getAllMail();
        $userId = Auth::user()->id;
        Mail::where('user_id', $userId)->get();

        return view('sent.main')->with(['title' => "Отправленные",
            'grid' => $grid,
        ]);
    }

    public function oneLetter(Request $request)
    {
        $mail = Mail::where('id', $request->id)->first();
        if (empty($mail)) {
            abort(404);
        } else {
            return view('sent.oneLetter')->with(['title' => $mail->title,
                'mail' => $mail]);
        }
    }

    public function newLetter()
    {
        return view('sent.newLetter')->with(['title' => 'Новое письмо']);
    }

    public function sendLetter(MailerRequest $request)
    {

        SendEmail::send($request);

        return redirect()->back();
    }

    public function delete()
    {
        $error = [];
        unset($_POST['_token']);
        foreach ($_POST as $k => $v) {
            if (!Mail::where('id', $v)->delete()) {
                $error[] = 1;
            }

        }
        if (count($error) == 0) {
            Notification::success('Письмо удалено');
        } else {
            Notification::error('Ошибка. Письмо не удалено');
        }
        return redirect()->back();

    }
}
