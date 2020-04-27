<?php

namespace App\Http\Controllers;

use App\Type;
use App\Level;
use App\Course;
use App\Format;
use App\Version;
use App\Language;
use App\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFollow\FollowRelation;


class CourseController extends Controller
{

    public function listFilter(Request $request, $id)
    {
        $courses= Course::where('technology_id', '=', $id)->where('approved','=', true)->paginate(10);
        $version = Version::where('technology_id', '=', $id)->get();
        $type = Type::all();
        $format = Format::all();
        $levels = Level::all();
        $languages = Language::all();
        $technology = Technology::with('category')->find($id);
        $technologies = Technology::where('category_id', '=', $technology->category->id)->get()->random(6);


        //Filter Courses and Ajax request for pagination
        if ($request->ajax()) {
            $versions = $request->input('versions');
            $types = $request->input('types');
            $formats = $request->input('formats');
            $levels = $request->input('levels');
            $languages = $request->input('languages');
            $latest = $request->input('latest');
            $popular = $request->input('popular');

            $courses= Course::where('technology_id', '=', $id)->where('approved', '=', true);

            if ($versions != null) {
                $courses->whereIn('version_id',  $versions)->get();
            }
            if ($types != null) {
                $courses->whereIn('type_id',  $types)->get();
            }
            if ($formats != null) {
                $courses->whereIn('format_id',  $formats)->get();
            }
            if ($levels != null) {
                $courses->whereIn('level_id',  $levels)->get();
            }
            if ($languages != null) {
                $courses->whereIn('language_id',  $languages)->get();
            }
            if ($latest != null) {
                $courses->orderBy('created_at', $latest)->get();
            }
            if ($popular != null) {
                $courses->whereIn('id', \DB::table('followables')->select('followable_id'))->get()->countBy(function ($course) {
                    return $course->id;
                });

            }

            $courses = $courses->paginate(10);
        return view('layouts.load', ['courses' => $courses])->render();
        }

        return view('courses', compact('courses', 'version', 'technology','technologies', 'type', 'format', 'levels', 'languages'));
    }

    public function LikeCourse(Request $request){

        $course = Course::find($request->id);
        $response = auth()->user()->toggleLike($course);

        return response()->json(['success'=>$response]);
    }

    public function getLanguages(Request $request)
    {
        $languages = Language::all();
        if($request->isMethod('GET')) {
        return response()->json($languages);
        }
    }

    public function getVersions(Request $request)
    {
        $versions = Version::all();
        if($request->isMethod('GET')) {
        return response()->json($versions);
        }
    }

    public function addCourse(Request $request)
    {
        $version= Version::with('technology')->find($request->version);

        $technology = Technology::where('id', '=', $version->technology->id)->first();

        $course = new Course;

        $course->name = $request->name;
        $course->link = $request->link;
        $course->technology_id = $technology->id;
        $course->type_id = $request->type;
        $course->format_id = $request->format;
        $course->version_id = $request->version;
        $course->language_id = $request->language;
        $course->user_id = Auth::user()->id;
        $course->level_id = $request->level;
        $course->approved = 0;
        $course->save();

        return response()->json(['success'=>'Course created successfully, on approval you will be notified via e-mail!']);

    }

    public function managecourses()
    {
        $courses= Course::orderBy('approved', 'ASC')->paginate(10);
        return view('manage', compact('courses'));
    }

    public function removeCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->back()->with('success', 'Course removed successfuly');
    }
}
