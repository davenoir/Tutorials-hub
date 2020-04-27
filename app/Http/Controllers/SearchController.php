<?php

namespace App\Http\Controllers;

use App\Technology;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProgramming(Request $request)
    {
        $technologies = Technology::where('category_id', '=', '1')->get();
        if($request->isMethod('GET')) {
        return response()->json($technologies);
        }
    }

    public function searchProgramming(Request $request)
    {
        $technologies = Technology::where('category_id', '=', '1')->where('name','LIKE','%'.$request->search."%")->get();
        if($request->isMethod('GET')) {
            return response()->json($technologies);
            }
    }

    public function indexDataScience(Request $request)
    {
        $technologies = Technology::where('category_id', '=', '2')->get();
        if($request->isMethod('GET')) {
        return response()->json($technologies);
        }
    }

    public function searchDataScience(Request $request)
    {
        $technologies = Technology::where('category_id', '=', '2')->where('name','LIKE','%'.$request->search."%")->get();
        if($request->isMethod('GET')) {
            return response()->json($technologies);
            }
    }

    public function indexDevOps(Request $request)
    {
        $technologies = Technology::where('category_id', '=', '3')->get();
        if($request->isMethod('GET')) {
        return response()->json($technologies);
        }
    }
    public function searchDevOps(Request $request)
    {
        $technologies = Technology::where('category_id', '=', '3')->where('name','LIKE','%'.$request->search."%")->get();
        if($request->isMethod('GET')) {
            return response()->json($technologies);
            }
    }
    public function indexDesign(Request $request)
    {
        $technologies = Technology::where('category_id', '=', '4')->get();
        if($request->isMethod('GET')) {
        return response()->json($technologies);
        }
    }
    public function searchDesign(Request $request)
    {
        $technologies = Technology::where('category_id', '=', '4')->where('name','LIKE','%'.$request->search."%")->get();
        if($request->isMethod('GET')) {
            return response()->json($technologies);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
