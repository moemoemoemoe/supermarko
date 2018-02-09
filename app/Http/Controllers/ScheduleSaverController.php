<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScheduleSaver;
use Redirect;


class ScheduleSaverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function schedulesaver()
    {
        $scheduls = ScheduleSaver::orderBy('id','DESC')->get();

        return view('admin.schedule.index',compact('scheduls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function schedulesaver_save(Request $r)

    {
        $the_time = $r->input('time_schedule');

        $saver_sch = new ScheduleSaver();
        $saver_sch->the_time = $the_time;
        $saver_sch->status = 0;
$saver_sch->save();
  return Redirect::back()->with('success', 'New Schedule Saver successfuly created');

        
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
    public function delete_schedul_view($id)
    {
         $item = ScheduleSaver::findOrFail($id);
      $item->delete();
      return Redirect::back()->with('success' , 'Schedule was Deleted successfuly!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function all_schedule()
    {
        $schedul = ScheduleSaver::orderBY('id','DESC')->where('status', 1)->get();

        return $schedul;
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
