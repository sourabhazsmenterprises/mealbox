<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
   
    public function index()
    {
        //abort_unless(\Gate::allows('bannerimage_access'), 403);

        $category=  Category::all();

        return view('backend.category.index', compact('category'));
    }

    public function create()
    {
       // abort_unless(\Gate::allows('bannerimage_create'), 403);

        return view('backend.category.create');
    }

    public function store(Request $req)
    {
       // abort_unless(\Gate::allows('bannerimage_create'), 403);
        $file = $req->file('image');
        $filename = 'image'.time().'.'.$req->image->extension();
        $destinationPath = storage_path('../public/upload');
        $file->move($destinationPath, $filename);
        $path = 'upload/'.$filename;

        $reg = new Category;
        
        $reg->image=$path;
        $reg->name=$req->name;
		 
        $reg->save();

        return redirect('admin/category/');
    }

    public function edit($id)
    {

       // abort_unless(\Gate::allows('bannerimage_edit'), 403);
        $category= Category::find($id);

        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $req, $id)
    {
       // abort_unless(\Gate::allows('bannerimage_edit'), 403);
         
        if($req->hasFile('image')){
            $file = $req->file('image');
            $filename = 'image'.time().'.'.$req->image->extension();
            $destinationPath = storage_path('../public/upload');
            $file->move($destinationPath, $filename);
            $path = 'upload/'.$filename;
          }
          else{
              $path=$req->image;
          }
         Category::where('id',$id)->update([
             'image'=>$path,
             'name'=>$req->name,
             
        ]);

         return redirect('admin/category/');
    }

    public function show($id)
    {
       // abort_unless(\Gate::allows('bannerimage_show'), 403);
         $value =  BannerImage::find($id);
        
        return view('backend.bannerimage.show', compact('value'));
    }

    public function destroy($bannerimage)
    {
        
      //  abort_unless(\Gate::allows('bannerimage_delete'), 403);

        Category::where('id',$bannerimage)->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Category::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
