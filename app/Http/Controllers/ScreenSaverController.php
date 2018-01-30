<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saver;
use Validator;
use Redirect;

class ScreenSaverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saver_index()
    {
        $savers = Saver::orderBy('id','DESC')->get();
          return view('admin.savers.index',compact('savers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saver_index_save(Request $r)
    {
         $foreign_name = mt_rand(111111,999999);
            $title = $r->input('title');
            $content = $r->input('content');
           


            $photo = $r->file('photo');

            $data = ['title' => $title,'content'=> $content,'photo' => $photo];

            $rules = ['title' => 'required' ,'content' => 'required','photo'=> 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                $destination = 'uploads/savers';
                $photo_name = str_replace(' ', '_', $foreign_name);
                $photo_name .= '.'.$photo->getClientOriginalExtension();
                $photo->move($destination, $photo_name);

                $saver = new Saver();
                $saver->title = $title;
                $saver->content = $content;
                $saver->url = $photo_name;
                 $saver->type = $photo->getClientOriginalExtension();


                $saver->url_original = config('app.my_url_saver').$photo_name;
                $saver->status = 0;

             $saver->save();


                return Redirect::back()->with('success', 'New Screen Saver successfuly created');


            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saver_index_publish($id)
    {
     
             $saver = Saver::findOrFail($id);
     if($saver->status == '0')
     {
       $saver->status = '1';
       $saver->save();
       return Redirect::Back()->with('success', 'This Saver is Published');
     }
     else{
      $saver->status = '0';
      $saver->save();
      return Redirect::Back()->with('success', 'This Saver is Unpublished');
    }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saver_update($id)
    {
        $savers =  Saver::findOrFail($id);
        return view('admin.savers.saver_update',compact('savers'));
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
    public function saver_update_save(Request $r, $id)
    {
          $foreign_name = mt_rand(111111,999999);
            $title = $r->input('title');
            $content = $r->input('content');
           


            $photo = $r->file('photo');

            $data = ['title' => $title,'content'=> $content];

            $rules = ['title' => 'required' ,'content' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                if($r->hasFile('photo')){

                $destination = 'uploads/savers';
                $photo_name = str_replace(' ', '_', $foreign_name);
                $photo_name .= '.'.$photo->getClientOriginalExtension();
                $photo->move($destination, $photo_name);
}
                $saver = Saver::findOrFail($id);
                $saver->title = $title;
                $saver->content = $content;
                if($r->hasFile('photo')){
                    unlink('uploads/savers/'.$saver->url);
                $saver->url = $photo_name;
$saver->type = $photo->getClientOriginalExtension();
                $saver->url_original = config('app.my_url_saver').$photo_name;
               }
                

                $saver->save();

                return Redirect::back()->with('success', 'New Screen Saver successfuly Updated');


            }
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
