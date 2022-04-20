<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class ServicesController extends Controller
{
   
    public function index()
    {
        //abort_unless(\Gate::allows('services_access'), 403);

        $users=DB::table('users')->where('id','!=',1)->where('deleted_at',null)->orderBy('id','desc')->get();

        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
       // abort_unless(\Gate::allows('services_create'), 403);

        return view('backend.services.create');
    }
public function register(Request $req){
         
            $user= DB::table('users')->where('email',$req->email)->orWhere('mobile',$req->mobile)->count();
            
    
       if($user > 0)
          
        {
            return response()->json($data = [
                'status' => 201,
                'msg' => 'data already registered' 
              
            ]);
        }
        else
        {
            
        
            $reg = new User;
            $reg->email = $req->email;
            $reg->mobile = $req->mobile;
            $reg->password = bcrypt($req->password);
            $reg->name = $req->name;
            
            $reg->save();

            return response()->json($data=[
                'status' =>200,
                'msg' =>'Thank you for registering',
                'user'=> User::where('id',$reg->id)->select('*')->first()
                ]);
        }
    }
    public function store(Request $req)
    {
       // abort_unless(\Gate::allows('services_create'), 403);
        $file = $req->file('image');
        $filename = 'image'.time().'.'.$req->image->extension();
        $destinationPath = storage_path('../public/upload');
        $file->move($destinationPath, $filename);
        $path = 'upload/'.$filename;

        $reg = new services;
        
        $reg->image=$path;
        $reg->name=$req->name;
        $reg->describtion=$req->describtion;
        
        $reg->save();

        return redirect('admin/services/');
    }

    public function edit($id)
    {

       // abort_unless(\Gate::allows('services_edit'), 403);
        $services= Services::find($id);

        return view('backend.services.edit', compact('services'));
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
         Services::where('id',$id)->update([
             'image'=>$path,
             'name'=>$req->name,
             'describtion'=>$req->describtion,
             
        ]);

         return redirect('admin/services/');
    }

    public function show($id)
    {
       // abort_unless(\Gate::allows('services_show'), 403);
         $value =  Services::find($id);
        
        return view('backend.services.show', compact('value'));
    }

    public function destroy($services)
    {
        
      //  abort_unless(\Gate::allows('services_delete'), 403);

      DB::table('users')->where('id',$services)->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Services::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
