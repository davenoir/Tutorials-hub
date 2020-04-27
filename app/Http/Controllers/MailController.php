<?php

namespace App\Http\Controllers;

use App\Course;
use App\Mail\ApproveCourse;
use App\Mail\DeclineCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function approveMail($id)
    {
        $course= Course::findOrFail($id);
        $userEmail = $course->user->email;
        $course->approved = true;
        $course->save();

        Mail::to($userEmail)->send(new ApproveCourse($course));
        return redirect()->back()->with('success', 'Successfuly approved, user has been notified via e-mail!');
    }

    public function declineMail(Request $request)
    {
        $course = Course::findOrFail($request->id);
        $userEmail = $course->user->email;
        $course->delete();


        Mail::to($userEmail)->send(new DeclineCourse($course));
        return response()->json(['success'=>'Successfully declined and creator has been notified via e-mail']);
    }
}
