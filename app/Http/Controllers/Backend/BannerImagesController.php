<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBannerImagesRequest;
use App\Http\Requests\StoreBannerImagesRequest;
use App\Http\Requests\UpdateBannerImagesRequest;
use Illuminate\Http\Request;
use App\Models\BannerImage;
use DB;
use App\Models\User;


class BannerImagesController extends Controller
{
   
    public function index()
    {
        //abort_unless(\Gate::allows('bannerimage_access'), 403);

        $bannerimage=  BannerImage::all();

        return view('backend.bannerimage.index', compact('bannerimage'));
    }

    public function create()
    {
       // abort_unless(\Gate::allows('bannerimage_create'), 403);

        return view('backend.bannerimage.create');
    }

    public function store(Request $req)
    {
       // abort_unless(\Gate::allows('bannerimage_create'), 403);
        $file = $req->file('image');
        $filename = 'image'.time().'.'.$req->image->extension();
        $destinationPath = storage_path('../public/upload');
        $file->move($destinationPath, $filename);
        $path = 'upload/'.$filename;

        $reg = new BannerImage;
        
        $reg->image=$path;
        $reg->tittle=$req->tittle;
        $reg->links=$req->links;
         $reg->content_active =$req->active;
		$reg->category=$req->category;
        $reg->save();

        return redirect('admin/bannerimages/');
    }

    public function edit($id)
    {

       // abort_unless(\Gate::allows('bannerimage_edit'), 403);
        $bannerimage= BannerImage::find($id);

        return view('backend.bannerimage.edit', compact('bannerimage'));
    }

    public function update(Request $req, $id)
    {
       // abort_unless(\Gate::allows('bannerimage_edit'), 403);
        // dd($req->category);
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
         BannerImage::where('id',$id)->update([
             'image'=>$path,
             'tittle'=>$req->tittle,
             'links'=>$req->links,
			 'category'=>$req->category,
             'content_active'=>$req->active
        ]);

         return redirect('admin/bannerimages/');
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

        BannerImage::where('id',$bannerimage)->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        BannerImage::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
	public function orderprocess($id,$val){
		//dd($id);
		DB::table('order')->where('id',$id)->update([
          'delivery'=>$val
        ]);
		
		$database = app('firebase.database');
        $reference = $database->getReference('subjects');
        $value = $reference->getValue();
       
    if($val==1){

        $pro='Dispatched';
    }
    if($val==2){

        $pro='Delivered';
    }
    //  $this->database
    $database->getReference('food/process/'.$id)
      ->set([
          'id'=>$id,
          'delivery' =>$val,
          'deliverystatus'=>$pro
          
          
      ]);
		$get=DB::table('order')->where('id',$id)->first();
		  $firebaseToken = User::where('id',$get->user_id)->pluck('device_token')->all();
       
       // dd($firebaseToken);
        // $firebaseToken=array(
        //     'to' => $reg['id'],
             
        //   ); 
        
        $SERVER_API_KEY='AAAAjMTYYFw:APA91bFMmkVxHQYLtpabGw2j8mlmkilqbikDiDzcTMOiNbDYJ3fDYvurvPBMypvqwc8SUQa0BZsvjBN9rNnspaMtaHGumzXcpxLWQZhY_GGeF2_IompFJSRELHskCY1kRX0PxWKbAcYa';
  
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => ['title'=>'Check Your Food Item',
							  'body'=>'Your Food Item '.$pro,
							  
							  
							  ],
			    'data'=>[
					'delivery'=>$val,
					'deliverystatus'=>$pro,
					 'type'=>'orderprocess',
                ],
           
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization:key='.$SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        //dd($response);
		
		
		
		
		
		
		
        return back();
	}
}
