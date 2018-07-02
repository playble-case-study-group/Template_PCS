<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ExhibitController extends Controller
{
    /**
     * Exhibit a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups = DB::table('groups')
            ->get();

        $gallery = DB::table('artifacts')
            ->where('day', '<=' ,Auth::user()->current_day)
            ->get();

        $exhibition = DB::table('group_exhibitions')
            ->where('group_id', Auth::user()->groupId)
            ->first();
        $exhibition = json_encode($exhibition);


        if (Auth::user()->assigned) {
            foreach ($gallery as $artifact) {
                // Searches by group ID
                $edited = DB::table('student_artifacts')
                    ->where([
                        ['group_id', Auth::user()->groupId],
                        ['artifact_id', $artifact->artifact_id],
                    ])
                    ->first();

                $artifact->tags = [];
                if($edited) {
                    $artifact->title = $edited->title;
                    $artifact->description = $edited->description;

                    $artifact->tags = DB::table('tags')
                        ->join('student_artifact_has_tag', 'student_artifact_has_tag.tag_id', 'tags.tag_id')
                        ->where('student_artifact_has_tag.student_artifact_id', $edited->student_artifact_id)

                        ->select('tags.tag_id', 'tags.title')
                        ->get();
                }

                $artifact->hidden = false;

            }

        } else {

            foreach ($gallery as $artifact) {
                // Searches by user ID
                $edited = DB::table('student_artifacts')
                    ->where([
                        ['user_id', Auth::user()->user_id],
                        ['artifact_id', $artifact->artifact_id],
                    ])
                    ->first();

                $artifact->tags = [];
                if($edited) {
                    $artifact->title = $edited->title;
                    $artifact->description = $edited->description;

                    $artifact->tags = DB::table('tags')
                        ->join('student_artifact_has_tag', 'student_artifact_has_tag.tag_id', 'tags.tag_id')
                        ->where('student_artifact_has_tag.student_artifact_id', $edited->student_artifact_id)
                        ->select('tags.tag_id', 'tags.title')
                        ->get();

                }
                $artifact->hidden = false;
            }

        }


        $gallery = $gallery->filter(function($artifact, $key){
            if (isset($artifact->tags)) {
                foreach ($artifact->tags as $tag) {
                    if ($tag->title == 'Gallery')
                        return $artifact;
                }
            }
        })->values();

        return view('exhibit', compact('groups', 'gallery', 'exhibition'));
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
        $data = $request->data;
        $group = Auth::user()->groupId;
        $user_id = Auth::id();

        $exists = DB::table('group_exhibitions')
            ->select('group_id')
            ->where('group_id', Auth::user()->groupId)
            ->first();


        if($exists && $exists->group_id != 0) {
            DB::table('group_exhibitions')
                ->where('group_id', $group)
                ->update(['exhibition' => $data]);
        } else {
            $user_exists = DB::table('group_exhibitions')
                ->where('user_id', Auth::id())
                ->first();

            if($user_exists) {
                DB::table('group_exhibitions')
                    ->where('user_id', $user_id)
                    ->update(['exhibition' => $data]);
            } else {
                DB::table('group_exhibitions')
                    ->insert(['exhibition' => $data, 'group_id' => $group, 'user_id' => $user_id]);
            }
        }

    }

    /**
     * Exhibit the specified resource.
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
