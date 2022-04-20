<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Illuminate\Http\Request;
use App\Models\FoodItem;
use DB;
use App\Models\User;

class FoodItemController extends Controller
{
    // private $database;

    // public function __construct()
    // {
    //     $this->database = \App\Services\FirebaseService::connect();
    // }
    public function index()
    {
        //abort_unless(\Gate::allows('bannerimage_access'), 403);

        $fooditem= FoodItem::orderBy('id','desc')->get();

        return view('backend.fooditem.index', compact('fooditem'));
    }
	 public function foodactive(Request $req,$id,$val)
    {
        //abort_unless(\Gate::allows('bannerimage_access'), 403);

         FoodItem::where('id',$id)->update([
		 'status'=>$val
		 
		 ]);

        return back();
    }

    public function create()
    {
       // abort_unless(\Gate::allows('bannerimage_create'), 403);

        return view('backend.fooditem.create');
    }

    public function store(Request $req)
    {
       // abort_unless(\Gate::allows('bannerimage_create'), 403);
		$path="";
		  if($req->hasFile('image')){
        $file = $req->file('image');
        $filename = 'image'.time().'.'.$req->image->extension();
        $destinationPath = storage_path('../public/upload');
        $file->move($destinationPath, $filename);
        $path = 'upload/'.$filename;
		  }
        $reg = new FoodItem;
        
        $reg->image=$path;
        $reg->name=$req->name;
		$reg->description=$req->description;
        $reg->category=$req->category;
		$reg->type=$req->type;
		$reg->ingredients=$req->ingredients;
		$reg->recipe=$req->recipe;
		$reg->veg_nveg=$req->veg_nveg;
		$reg->active=$req->active;
		$reg->price=$req->price;
		$reg->mainprice=$req->mainprice;
		$reg->available_plans=$req->available_plans;
		$reg->available_offer=$req->available_offer;
		$reg->max_quantity=$req->max_quantity;
		$reg->times_to_delivery_chrage=$req->times_to_delivery_chrage;
		 
        $reg->save();

		date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
		$da= date('d-m-Y');
		DB::table('notification')->insert([
		'name'=>$req->name,
		'food_id'=>$reg->id,
		'date'=>$da,
			
			
		]);
        $database = app('firebase.database');
          $reference = $database->getReference('subjects');
          $value = $reference->getValue();
		 
        
      //  $this->database
      $database->getReference('food/notificaiton/' .$reg->id)
        ->set([
            'date'=>$da,
            'name' => $req['name'] ,
            'food_id' =>$reg->id,
            
        ]);
        $firebaseToken = User::where('device_token','!=',null)->pluck('device_token')->all();
       
       // dd($firebaseToken);
        // $firebaseToken=array(
        //     'to' => $reg['id'],
             
        //   ); 
        
        $SERVER_API_KEY = 'AAAAjMTYYFw:APA91bFMmkVxHQYLtpabGw2j8mlmkilqbikDiDzcTMOiNbDYJ3fDYvurvPBMypvqwc8SUQa0BZsvjBN9rNnspaMtaHGumzXcpxLWQZhY_GGeF2_IompFJSRELHskCY1kRX0PxWKbAcYa';
  
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $req['name'],
				 'image'=>$reg->image,
				'body'=>$req->ingredients,
            ],
			 
			'data'=>[
                'date'=>$da,
                
                'food_id' =>$reg->id,
				'type'=>'addProduct',
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
  
       // dd($response);

		
		
        return redirect('admin/food-item/');
    }

    public function edit($id)
    {

       // abort_unless(\Gate::allows('bannerimage_edit'), 403);
        $fooditem= FoodItem::find($id);

        return view('backend.fooditem.edit', compact('fooditem'));
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
         FoodItem::where('id',$id)->update([
			'image'=>$path,
			'name'=>$req->name,
			'description'=>$req->description,
			'category'=>$req->category,
			'type'=>$req->type,
			'ingredients'=>$req->ingredients,
			'recipe'=>$req->recipe,
			'active'=>$req->active,
			 'veg_nveg'=>$req->veg_nveg,
			'price'=>$req->price,
			'mainprice'=>$req->mainprice,
			'available_plans'=>$req->available_plans,
			'available_offer'=>$req->available_offer,
			'max_quantity'=>$req->max_quantity,
			'times_to_delivery_chrage'=>$req->times_to_delivery_chrage,
        ]);

         return redirect('admin/food-item/');
    }

    public function show($id)
    {
       // abort_unless(\Gate::allows('bannerimage_show'), 403);
         $value =  FoodItem::find($id);
        
        return view('backend.fooditem.show', compact('value'));
    }

    public function destroy($bannerimage)
    {
        
      //  abort_unless(\Gate::allows('bannerimage_delete'), 403);

        FoodItem::where('id',$bannerimage)->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        FoodItem::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
