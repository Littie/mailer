<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Krucas\Notification\Facades\Notification;
use PhpImap\Mailbox;

class InboxMailController extends Controller
{
    private $mailBox;

    public function __construct()
    {
        $this->middleware('auth');

        if (Auth::check()) {
            $this->mailBox = new Mailbox('{imap.gmail.com:993/imap/ssl}INBOX', Auth::user()->email, decrypt(Auth::user()->email_password), __DIR__);
        }
    }

    public function getIndex()
    {
        $mailbox = $this->mailBox;

        $mailsIds = $mailbox->searchMailbox('ALL');
        if (!$mailsIds) {
            die('Mailbox is empty');
        }
        foreach ($mailsIds as $k => $v) {
            $mails[$k] = $mailbox->getMail($v);
        }
        if (empty($mails)) {
            $mails = " ";
        }

        return view('inbox.main')->with(['mails' => $mails,
            'title' => "Входящие"]);
    }

    public function getOneLetter(Request $request)
    {
        $mailbox = $this->mailBox;
        $mail = $mailbox->getMail($request->id);
        return view('inbox.oneLetter')->with(['mail' => $mail,
            'title' => $mail->subject
        ]);
    }

    public function delete()
    {
        $mailbox = $this->mailBox;
        unset($_POST[0]);
        $error = [];
        foreach ($_POST as $k => $v) {
            if (!$mailbox->deleteMail($v)) {
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
