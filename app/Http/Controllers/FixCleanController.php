<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainCat;
use Redirect;
use Validator;
use paginate;
use App\Category;
use App\CatChild;
use App\ChildImage;


class FixCleanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function main_index()
    {
        $mains = MainCat::orderBy('id','DESC')->get();
        return view('admin.fixclean.main_index',compact('mains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function main_index_save(Request $r)
    {
         $foreign_name = mt_rand(111111,999999);

        $name = $r->input('name');

        $content =$r->input('content');

        $photo = $r->file('photo');

        $data = ['name' => $name,'photo' => $photo];

        $rules = ['name' => 'required' ,'photo'=> 'required'];

        $v = Validator::make($data, $rules);

        if($v->fails()){
            return Redirect::Back()->withErrors($v);
        }else
        {
            $destination = 'uploads/fixclean';
            $photo_name = str_replace(' ', '_', $foreign_name);
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);

            $main = new MainCat();
            $main->name = $name;
            $main->content = $content;
            $main->img_name = $photo_name;
            $main->image_url_original = config('app.my_url_fc_local').$photo_name;
            $main->status = 0;
            $main->save();
            return Redirect::back()->with('success', 'New Main Category successfuly created');


        }


        
    }
     public function publish_maincat($id)
    {

     $main = MainCat::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', 'This Main Category is Published');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', 'This Main Category is Unpublished');
    }
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view_main($id)
    {
       $mains = MainCat::findOrFail($id);

          return view('admin.fixclean.main_view',compact('mains'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_main_save(Request $r,$id)
    {
         $foreign_name = mt_rand(111111,999999);

        $name = $r->input('name');

        $content =$r->input('content');

        $photo = $r->file('photo');

        $data = ['name' => $name];

        $rules = ['name' => 'required'];

        $v = Validator::make($data, $rules);

        if($v->fails()){
            return Redirect::Back()->withErrors($v);
        }else
        { 

            if($r->hasFile('photo')){
            $destination = 'uploads/fixclean';
            $photo_name = str_replace(' ', '_', $foreign_name);
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);
        }


 

            $main = MainCat::findOrFail($id);
            $main->name = $name;
            $main->content = $content;

            if($r->hasFile('photo')){
            unlink('uploads/fixclean/'.$main->img_name);
            $main->img_name = $photo_name;

            $main->image_url_original = config('app.my_url_fc_local').$photo_name;
        }

        
            $main->save();
            return Redirect::back()->with('success', 'New Main Category successfuly Updated');

    }
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fc_categories_index()
    {
        $categories = Category::with('cat')->orderBy('id','DESC')->get();
       // / return $categories;
        $mains = MainCat::orderBy('id','DESC')->get();
       return view('admin.fixclean.categorie_index',compact('mains','categories'));
        
    }

  public function fc_categories_index_save(Request $r)
    {

       $name = $r->input('name');
      $main_id = $r->input('main_id');

        $data = ['name' => $name];

        $rules = ['name' => 'required'];

        $v = Validator::make($data, $rules);

        if($v->fails()){
            return Redirect::Back()->withErrors($v);
        }else
        {
            

            $main = new Category();
            $main->name = $name;
            $main->main_id = $main_id;
           $main->status = 0;
            $main->save();
            return Redirect::back()->with('success', 'New  Category successfuly created');


        }

        
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish_cat($id)
    {
        $main = Category::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', 'This  Category is Published');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', 'This  Category is Unpublished');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_category($id)
    {
          $cat = Category::findOrFail($id);
            $cat->delete();
            return Redirect::Back()->with('success', 'This  Category is  Successfully Deleted');
    }

    public function fc_childs_index()
    {
        $categories = Category::orderBy('id','DESC')->get();           
        $childs = CatChild::with('catsub')->orderBy('id','DESC')->get();

        return view('admin.fixclean.childs_index',compact('childs','categories'));

    }
  public function fc_childs_save(Request $r)
    {
       
 $cat_id = $r->input('cat_id');
      $full_name = $r->input('full_name');
      $content_item = $r->input('content_item');
      $mobile = $r->input('mobile');
      $address = $r->input('address');
      $shifts = $r->input('shifts');
 

        $data = ['full_name' => $full_name,'content_item' => $content_item,'mobile' => $mobile,'address' => $address,'shifts' => $shifts];

        $rules = ['full_name' => 'required','content_item' => 'required','mobile' => 'required','address' => 'required','shifts' => 'required'];

        $v = Validator::make($data, $rules);

        if($v->fails()){
            return Redirect::Back()->withErrors($v);
        }else
        {
            

            $catchild = new CatChild();
            $catchild->full_name = $full_name;
            $catchild->content = $content_item;
            $catchild->mobile = $mobile;
            $catchild->address = $address;
           $catchild->shifts = $shifts;
           $catchild->cat_id = $cat_id;
            $catchild->status = 0;
            $catchild->save();
            return Redirect::back()->with('success', 'New  One successfuly created');


        }


    }



    public function child_edit_customer($id)
    {
        $categories = Category::orderBy('id','DESC')->get();           
        $childs = CatChild::findOrFail($id);

        return view('admin.fixclean.childs_view',compact('childs','categories'));

    }
  public function child_edit_customer_save(Request $r,$id)
    {
       
     $cat_id = $r->input('cat_id');
      $full_name = $r->input('full_name');
      $content_item = $r->input('content_item');
      $mobile = $r->input('mobile');
      $address = $r->input('address');
      $shifts = $r->input('shifts');
 

        $data = ['full_name' => $full_name,'content_item' => $content_item,'mobile' => $mobile,'address' => $address,'shifts' => $shifts];

        $rules = ['full_name' => 'required','content_item' => 'required','mobile' => 'required','address' => 'required','shifts' => 'required'];

        $v = Validator::make($data, $rules);

        if($v->fails()){
            return Redirect::Back()->withErrors($v);
        }else
        {
            

            $catchild = CatChild::findOrFail($id);
            $catchild->full_name = $full_name;
            $catchild->content = $content_item;
            $catchild->mobile = $mobile;
            $catchild->address = $address;
            $catchild->shifts = $shifts;
             $catchild->cat_id = $cat_id;
            $catchild->status =1;
            $catchild->save();
            return Redirect::back()->with('success', 'New  One successfuly Updated');


        }


    }
    public function publish_child_customer($id)
    {

     $main = CatChild::findOrFail($id);
     if($main->status == '0')
     {
       $main->status = '1';
       $main->save();
       return Redirect::Back()->with('success', 'This  Child is Published');
     }
     else{
      $main->status = '0';
      $main->save();
      return Redirect::Back()->with('success', 'This  Child is Unpublished');
    }
}

 public function child_add_images($id)
    {
        $images = ChildImage::orderBy('id','DESC')->where('child_id',$id)->get();


        return view('admin.fixclean.save_images_childs',compact('images'));

}

 public function child_add_images_save(Request $r,$id)
    {
         $files = $r->file('attachments');
            $data = ['attachments' => $files];

      $rules = ['attachments'=> 'required'];

      $v = Validator::make($data, $rules);

      if($v->fails()){
        return Redirect::Back()->withErrors($v);
      }else
      {

        if ($files[0] != '') {
        $image_name = array();
        foreach($files as $file) {
         $ran = mt_rand(111111,999999);
         $destinationPath = 'uploads/childs_images';
         $filename = $file->getClientOriginalExtension();
         $filename_r =$ran.'.'.$filename;
         $image_name[] = $filename_r;
         $file->move($destinationPath, $filename_r);
       }
     }

 for($i=0;$i<count($image_name);$i++){
      $gallery = new ChildImage();
      $gallery->child_id= $id;
      $gallery->img_name = $image_name[$i];
        $gallery->image_url_original =config('app.my_url_fc_childs_local').$image_name[$i];
        $gallery->status= 0;

      $gallery->save();
    }

    return Redirect::back()->with('success', 'New Images successfuly created');

      }

}
 public function publish_images_childs($id)
    {

     $image = ChildImage::findOrFail($id);
     if($image->status == '0')
     {
       $image->status = '1';
       $image->save();
       return Redirect::Back()->with('success', 'This  Image is Published');
     }
     else{
      $image->status = '0';
      $image->save();
      return Redirect::Back()->with('success', 'This  Image is Unpublished');
    }
}

 public function delete_images_childs($id)
    {

           $image = ChildImage::findOrFail($id);
            $image->delete();
             unlink('uploads/childs_images/'.$image->img_name);
            return Redirect::Back()->with('success', 'This  Image is  Successfully Deleted');
    }

}
