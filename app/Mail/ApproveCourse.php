<?php

namespace App\Mail;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApproveCourse extends Mailable
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
    public function build()
    {
        $from = Auth::user()->name;

        return $this
                ->from('laravel.example.test@gmail.com', $from)
                ->subject('Your Tutorial Has Been Approved')
                ->markdown('mails.approve')
                ->with([
                    'message'=>'We want to inform you that your submission'." ".$this->course->name." ".'has been approved!',
                    'from'=>$from,
                    'to'=> $this->course->user->name
                ]);

    }
}
