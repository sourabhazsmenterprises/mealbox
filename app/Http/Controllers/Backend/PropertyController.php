<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;
use App\Models\Property;
use DB;
class PropertyController extends Controller
{
   
    public function index()
    {
        //abort_unless(\Gate::allows('services_access'), 403);

        $property=DB::table('add_property')->where('deleted_at',null)->orderBy('id','desc')->get();

        return view('backend.property.index', compact('property'));
    }

    public function create()
    {
       // abort_unless(\Gate::allows('services_create'), 403);

        return view('backend.property.create');
    }
 
    public function store(Request $req)
    {
       // abort_unless(\Gate::allows('services_create'), 403);
		//dd($req);
        $file = $req->file('image');
        $filename = 'image'.time().'.'.$req->image->extension();
        $destinationPath = storage_path('../public/upload');
        $file->move($destinationPath, $filename);
        $path = 'upload/'.$filename;

        Property::insert([
             'image'=>$path,
  'tittle'=>$req->tittle,
	'author_name'=>$req->author_name,
		 'address'=>$req->address,
		 'pincode'=>$req->pincode,
		 'author_mobile'=>$req->author_mobile,
		 'state'=>$req->state,
		 'city'=>$req->city,
         'describtion'=>$req->describtion,
			 'type'=>$req->type,
			 
        ]);

        return redirect('admin/property/');
    }

    public function edit($id)
    {

       // abort_unless(\Gate::allows('services_edit'), 403);
        $property= Property::find($id);

        return view('backend.property.edit', compact('property'));
    }

    public function update(Request $req, $id)
    {
       // abort_unless(\Gate::allows('services_edit'), 403);
         
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
         Property::where('id',$id)->update([
             'image'=>$path,
  'tittle'=>$req->tittle,
	'author_name'=>$req->author_name,
		 'address'=>$req->address,
		 'pincode'=>$req->pincode,
		 'author_mobile'=>$req->author_mobile,
		 'state'=>$req->state,
		 'city'=>$req->city,
         'describtion'=>$req->describtion,
			 'type'=>$req->type,
			 
        ]);

         return redirect('admin/property/');
    }

    public function show($id)
    {
       // abort_unless(\Gate::allows('services_show'), 403);
         $value =  Property::find($id);
        
        return view('backend.property.show', compact('value'));
    }

    public function destroy($services)
    {
        
      //  abort_unless(\Gate::allows('services_delete'), 403);

      DB::table('add_property')->where('id',$services)->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Property::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
