<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lang;
use App\Sub;
use Redirect;
use Validator;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function child_index_view_lang($id)

    {
       
        $langs = Sub::where('id',$id)->get();

        return view('admin.lang.child_index_view_lang',compact('langs'));
    }

     public function child_index_view_lang_save(Request $r,$id)
     {
        $langs_count = Lang::where('item_id',$id)->get();
        $count = count($langs_count);
        $name_en = $r->input('name_en');
        $desc_en = $r->input('content_en');

        $name_fr = $r->input('name_fr');
        $desc_fr = $r->input('content_fr');

        $name_ar = $r->input('name_ar');
        $desc_ar = $r->input('content_ar');

        $name_fil = $r->input('name_fil');
        $desc_fil = $r->input('content_fil');

        $name_am = $r->input('name_am');
        $desc_am = $r->input('content_am');



        if(empty($name_fr)) { $name_fr = ' '; }
        if(empty($desc_fr)){ $desc_fr = ' ';}

        if(empty($name_ar)) {$name_ar = ' ';}
        if(empty($desc_ar)) {$desc_ar = ' '; }

        if(empty($name_fil)) {$name_fil = ' ';}
        if(empty($desc_fil)) {$desc_fil = ' '; }

        if(empty($name_am)) {$name_am = ' ';}
        if(empty($desc_am)) {$desc_am = ' ';}


   
            $langs = Sub::findOrFail($id);

            $langs->name_sub_en = $name_en; 
            $langs->name_sub_fr = $name_fr;
            $langs->name_sub_ar = $name_ar;  
            $langs->name_sub_fil = $name_fil; 
            $langs->name_sub_am = $name_am; 

          $langs->content_en = $desc_en; 
            $langs->content_fr = $desc_fr;
            $langs->content_ar = $desc_ar;  
            $langs->content_fil = $desc_fil; 
            $langs->content_am = $desc_am; 

  $langs->save();
        return Redirect::back()->with('success', 'Succes!!');



    



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
