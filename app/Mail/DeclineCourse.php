<?php

namespace App\Mail;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeclineCourse extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $from = Auth::user()->name;
        $body = $request->reason;
        return $this
                ->from('laravel.example.test@gmail.com', $from)
                ->subject('Your Tutorial Has Been Decilned')
                ->markdown('mails.decline')
                ->with([
                    'message'=>$body,
                    'from'=>$from,
                    'courseName'=>$this->course->name,
                    'to'=> $this->course->user->name
                ]);
    }
}
