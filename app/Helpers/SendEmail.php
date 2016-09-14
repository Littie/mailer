<?php

namespace App\Helpers;


use App\Models\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Krucas\Notification\Facades\Notification;

class SendEmail
{
    const SMTP = 'smtp.gmail.com';
    const PORT = 465;
    const ENCRYPTION = 'ssl';

    public static function send($request)
    {
        $email = Auth::user()->email;
        $password = decrypt(Auth::user()->email_password);

        // Prepare transport
        $transport = \Swift_SmtpTransport::newInstance(self::SMTP, self::PORT, self::ENCRYPTION)
            ->setUsername($email)
            ->setPassword($password);
        $mailer = \Swift_Mailer::newInstance($transport);

        // Prepare content
        $view = View::make('emails.layoutEmails', [
            'message' => $request->body
        ]);

        $html = $view->render();

        // Send email
        $message = \Swift_Message::newInstance($request->title)
            ->setFrom([Auth::user()->email => Auth::user()->email])
            ->setTo([$request->address => $request->title])
            ->setBody($html, 'text/html');

        $mailer->send($message);

        $request['user_id'] = Auth::user()->id;

        if (Mail::create($request->all())) {

            return Notification::success('Письмо отправлено');
        } else {
            return Notification::error('Ошибка. Письмо не отправлено');
        }

    }

}