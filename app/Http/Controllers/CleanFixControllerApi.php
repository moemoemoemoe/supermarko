<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCat;

use App\Category;
use App\CatChild;
use App\ChildImage;

class CleanFixControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function main_cat()
    {
        $main = MainCat::orderBy('id','DESC')->where('status',1)->get();
        return $main;
        
            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function main_second($id)
    {
        $main = Category::orderBy('id','DESC')->where('main_id',$id)->where('status',1)->get();
        return $main;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function main_childs($id)
    {
        $main = CatChild::orderBy('id','DESC')->where('cat_id',$id)->where('status',1)->get();
        return $main;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function webviewchilds($id)
    {
        $description = CatChild::where('id',$id)->get();
        $childs = ChildImage::orderBy('id','DESC')->where('child_id',$id)->where('status',1)->limit(3)->get();
        return view('webview.slider_childs',compact('childs','description'));
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
