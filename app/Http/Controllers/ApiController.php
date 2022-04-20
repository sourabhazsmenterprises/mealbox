<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use DB;
use Hash;
use App\Models\User;
use App\Models\BannerImage;
use App\Models\Category;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Property;
use mail;

class ApiController extends Controller
{
    
     
     public function loginDetailStore(Request $req) {
               $user = User::where('mobile',$req->mobile)->where('deleted_at',null)->first();
  // dd($user);
            if($user == null) {
				
				$reg = new User;
           
            $reg->mobile = $req->mobile;
             
            $reg->firebase_id = $req->firebase_id;
            $reg->device_token=$req->device_token;
            $reg->save();
              
                 
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'success',
						 'user'=> User::where('id',$reg->id)->first()
                    ]);
                }
		 
              
              
             else {
				 
				 DB::table('users')->where('id',$user->id)->update([
				  'firebase_id'=>$req->firebase_id,
				  'device_token'=>$req->device_token,
				 
				 ]);
					  
            			
					 
				 
				 
                return response()->json($data = [
                    'status' => 200,
                    'msg' => 'success',
					 'user'=> User::where('id',$user->id)->first()
                ]);
            }
        }

	
	
    public function editProfile(Request $req){
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
           DB::table('users')->where('id',$req->user_id)->update([
			'name'=>$req->name,
			'email'=>$req->email,
			'address'=>$req->address,
			'image'=>$path	
			
			]);
          
            return response()->json($data=[
                'status' =>200,
                'msg' =>'Thank you for registering',
                'user'=> DB::table('users')->where('id',$req->user_id)->first()
                ]);
         
    }
	
	
    
	
	
	 public function banner(Request $req) {
               $user = BannerImage::where('content_active',1)->where('deleted_at',null)->first();
  // dd($user);
            if($user != null) {
              
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                        'banner'=>BannerImage::where('content_active',1)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              }
              
             else {
                return response()->json($data = [
                    'status' => 400,
                    'msg' => 'Data Not Available'
                ]);
            }
        }
	
	
	 public function home(Request $req) {
             $primaryaddress=DB::table('address')->where('user_id',$req->user_id)->where('primary_type',1)->select('*')->first();
		 if($primaryaddress!=null){
			 $primaryaddres=$primaryaddress;
			 
		 }
		 else{
			 $primaryaddres=DB::table('address')->where('user_id',$req->user_id)->select('*')->first();
		 }
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                        'banner'=>BannerImage::where('content_active',1)->where('deleted_at',null)->select('*')->get(),
						'category'=>Category::where('deleted_at',null)->select('*')->get(),
						 'foodItem'=>DB::table('food_item')->where('status',0)->where('deleted_at',null)->select('*')->get(),
						'primaryAddress'=>$primaryaddres,
						
                    ]);
                 
              
        }
	 public function foodItem(Request $req) {
               
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'foodItem'=>DB::table('food_item')->where('status',0)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	 public function plan(Request $req) {
               
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'plan'=>DB::table('plan')->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	 public function category(Request $req) {
               
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'category'=>Category::where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	 public function categoryFoodItem(Request $req) {
               
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'category'=>DB::table('food_item')->where('category',$req->category)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	
	
	 public function addcart(Request $req) {
		// dd($req);
		 $ex=str_replace("[","",$req->food_id);
		 $ex1=str_replace("]","",$ex);
		 $ex2=explode(",",$ex1);
		 //$ex3=sort($ex2);
		 //dd($ex2);
		 $coun=count($ex2);
		// dd($coun);
		 $cou=$coun-1;
		 $count=0;
		 foreach($ex2 as $r){
			 
		 $fa =DB::table('cart')->where('user_id',$req->user_id)->where('food_id',$r)->where('deleted_at',null)->first();
		 $food=DB::table('food_item')->where('id',$r)->first();
		 if($fa == null){
			 if($count==$cou){
				$quantity=$req->quantity;
				
			 }
			 else{
				 $quantity=1;
				 
			 }
			 $price=$food->price * $quantity;
             DB::table('cart')->insert([
			 
			 'user_id'=>$req->user_id,
				'food_id'=>$r, 
			 'quantity'=>$quantity,
				 'price'=>$price,
				 'offer_id'=>$req->offer_id,
				 'plan_id'=>$req->plan_id,
			 ]);
              
		 }
			 $count++;
		 }
		 return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'cart'=>DB::table('cart')->where('user_id',$req->user_id)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	
	 public function editcart(Request $req) {
		 $fa =DB::table('cart')->where('user_id',$req->user_id)->where('food_id',$req->food_id)->where('deleted_at',null)->first();
		 if($fa == null){
             DB::table('cart')->where('id',$req->id)->update([
			 
			 
			 'quantity'=>$req->quantity,
			  'price'=>$req->cart_price,
				 
			 ]);
              
		 }
		 return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'cart'=>DB::table('cart')->where('id',$req->id)->where('deleted_at',null)->select('*')->first()
                    ]);
                 
              
        }
	
	
	public function deletecartList(Request $req) {
           
              DB::table('cart')->where('id',$req->cart_id)->delete();
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'cart'=>DB::table('cart')->join('food_item','cart.food_id','food_item.id')->where('cart.user_id',$req->user_id)->where('cart.deleted_at',null)->select('food_item.*','cart.price','cart.quantity','cart.id as cart_id')->get()
                    ]);
                 
              
        }
	
	
	
	 public function cartList(Request $req) {
           
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'cart'=>DB::table('cart')->join('food_item','cart.food_id','food_item.id')->where('cart.user_id',$req->user_id)->where('cart.deleted_at',null)->select('food_item.*','cart.price as total_price','cart.quantity','cart.id as cart_id')->get()
                    ]);
                 
              
        }
	
	
		 public function addfavorite(Request $req) {
		 $fa =DB::table('favourite')->where('user_id',$req->user_id)->where('food_id',$req->food_id)->where('deleted_at',null)->first();
		 if($fa == null){
             DB::table('favourite')->insert([
			 
			 'user_id'=>$req->user_id,
				'food_id'=>$req->food_id, 
			  
			 ]);
              
		 }
		 return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'fav'=>DB::table('favourite')->where('user_id',$req->user_id)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	
	 public function deletefavoriteList(Request $req) {
           
              DB::table('favourite')->where('id',$req->fav_id)->delete();
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                      'favourite'=>DB::table('favourite')->join('food_item','favourite.food_id','food_item.id')->where('favourite.user_id',$req->user_id)->where('favourite.deleted_at',null)->select('food_item.*','favourite.id as fav_id')->get()
                    ]);
                 
              
        }
	 public function favoriteList(Request $req) {
           
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'favourite'=>DB::table('favourite')->join('food_item','favourite.food_id','food_item.id')->where('favourite.user_id',$req->user_id)->where('favourite.deleted_at',null)->select('food_item.*','favourite.id as fav_id')->get()
                    ]);
                 
              
        }
	
	
	public function order(Request $req) {
		  
		 
             DB::table('order')->insert([
			 
			 	'user_id'=>$req->user_id,
				'food_id'=>$req->food_id, 
				 'order_date_time'=>$req->order_date_time,
				 'estimate_delivarty_time'=>$req->estimate_delivary_time,
				 'status'=>$req->status,
				 'delivary_address'=>$req->delivary_address,
				 'discount'=>$req->discount,
				 'final_price'=>$req->final_price,
				 'comment'=>$req->comment,
			 	 'payment_type'=>$req->payment_type,
				 'payment_id'=>$req->payment_id,
				 'late_night'=>$req->late_night,
				 'delivery_charge'=>$req->delivery_charge,
			 ]);
		
		$useror=DB::table('cart')->where('user_id',$req->user_id)->get();
		
		if($req->status=='paid'){
			foreach($useror as $ew)
				$product=DB::table('food_item')->where('id',$ew->food_id)->first();
				DB::table('orderproduct')->insert([
					 'food_name'=>$product->name,
					 'quantity'=>$ew->quantity,
					 'price'=>$ew->price,
					 'payment_id'=>$req->payment_id,
					 'user_id'=>$req->user_id,
				]);
			
		}
		DB::table('cart')->where('user_id',$req->user_id)->delete();
          
		 return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'order'=>DB::table('order')->where('user_id',$req->user_id)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	
	
	
	public function subscribtion(Request $req) {
		  
		 
             DB::table('subscribtion')->insert([
			 
			 'user_id'=>$req->user_id,
				'food_id'=>$req->food_id, 
				 'plan_id'=>$req->plan_id,
				 'date_time_start'=>$req->date_time_start,
				 'date_time_end'=>$req->date_time_end,
				 'is_paid_full'=>$req->is_paid_full,
				 'is_active'=>$req->is_active,
				 'date_time_cancel'=>$req->date_time_cancel,
				 'actual_date_time_end'=>$req->actual_date_time_end,
				 'payment_id'=>$req->payment_id,
				 'payment_type'=>$req->payment_type,
			  
			 ]);
          
		 return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'sublist'=>DB::table('subscribtion')->where('user_id',$req->user_id)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	
	
	public function cancelsubscribtion(Request $req) {
		  
		 
             DB::table('subscribtion')->where('id',$req->id)->update([
			 
				 'is_active'=>$req->is_active,
				 'date_time_cancel'=>$req->date_time_cancel,
				 'actual_date_time_end'=>$req->actual_date_time_end,
			  
			 ]);
          
		 return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'sublist'=>DB::table('subscribtion')->where('id',$req->id)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	public function cancelsubscribtionlist(Request $req) {
		  
		 
            
          
		 return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'sublist'=>DB::table('subscribtion')->where('user_id',$req->user_id)->where('is_active',1)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	
	
	public function  subscribtionlist(Request $req) {
		  
		 
            
          
		 return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'sublist'=>DB::table('subscribtion')->join('plan','subscribtion.plan_id','plan.id')->where('subscribtion.user_id',$req->user_id)->where('subscribtion.deleted_at',null)->select('subscribtion.*','plan.name as plan_name','plan.type as plan_type')->get()
                    ]);
                 
              
        }
	 public function primaryAddress(Request $req) {
		 
		    DB::table('address')->where('user_id',$req->user_id)->update([
			  	'primary_type'=>0, 
  			]);
		 
		 DB::table('address')->where('id',$req->id)->update([
			  	'primary_type'=>$req->primary_type, 
  			]);
              
		  
		 return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'address'=>DB::table('address')->where('user_id',$req->user_id)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
	 }
		 
	
	
		 public function addAddress(Request $req) {
		 $da=DB::table('pincode_offer')->where('pin_code',$req->pin_code)->where('deleted_at',null)->select('*')->first();
			 if($da !=null){
             DB::table('address')->insert([
			 
			 'user_id'=>$req->user_id,
				'address'=>$req->address, 
			  'name'=>$req->name,
				 'mobile'=>$req->mobile,
				 'pin_code'=>$req->pin_code,
			 ]);
              
		  
		 return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'address'=>DB::table('address')->where('user_id',$req->user_id)->where('deleted_at',null)->select('*')->get()
                    ]);
			 }
			 
			 else{
				 DB::table('pincode')->insert([
				 
				 'pin_code'=>$req->pin_code
				 
				 ]);
				 return response()->json($data = [
                        'status' => 201,
                        'msg' => 'Pincode Not Available',
					 	'address'=>DB::table('address')->where('user_id',$req->user_id)->where('deleted_at',null)->select('*')->get()
      
                       ]);
				 
			 }
              
        }
	
	 public function deleteaddressList(Request $req) {
           
              DB::table('address')->where('id',$req->id)->delete();
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                      	'address'=>DB::table('address')->where('user_id',$req->user_id)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	
	 public function editaddress(Request $req) {
           
              DB::table('address')->where('id',$req->id)->update([
			 
			 
				'address'=>$req->address, 
				  'name'=>$req->name,
				 'mobile'=>$req->mobile,
				 'pin_code'=>$req->pin_code,
			  
			 ]);
              
		  
		 return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'address'=>DB::table('address')->where('id',$req->id)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	
	
	 public function addressList(Request $req) {
           
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       								             
						'address'=>DB::table('address')->where('user_id',$req->user_id)->where('deleted_at',null)->select('*')->get()
                    ]);
                 
              
        }
	
	 public function orderitem(Request $req) {
           
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                     /*  	'orderItem'=>DB::table('order')->join('users','order.user_id','users.id')->join('food_item','order.food_id','food_item.id')->where('order.user_id',$req->user_id)->where('order.deleted_at',null)->orderby('order.id','desc')->select('order.*','users.name as account_user_name','users.mobile as account_mobile_number','food_item.name as food_name','food_item.description as food_description','food_item.image as food_image','food_item.ingredients as food_ingredients','food_item.recipe as food_recipe','food_item.veg_nveg as veg_nveg','order.order_date_time','order.estimate_delivarty_time','order.final_price','order.delivery_charge','order.late_night')->get(),
						 */
						'item'=>DB::table('order')->join('orderproduct','orderproduct.payment_id','order.payment_id')->join('food_item','orderproduct.food_name','food_item.name')->where('order.user_id',$req->user_id)->orderby('order.id','desc')->select('orderproduct.*','order.order_date_time','order.delivery','order.estimate_delivarty_time','order.id as order_id','order.final_price','order.delivery_charge','order.late_night','food_item.name as food_name','food_item.description as food_description','food_item.image as food_image','food_item.ingredients as food_ingredients','food_item.recipe as food_recipe','food_item.veg_nveg as veg_nveg')->get()  
                    ]);
                 
      
        }
	
	
	 public function foodDetail(Request $req) {
		 $data=DB::table('food_item')->where('id',$req->id)->first();
		  return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'food-detail'=>DB::table('food_item')->where('id',$req->id)->where('deleted_at',null)->first(),
			            'subfood'=>DB::table('food_item')->where('category',$data->category)->where('id','!=',$req->id)->where('deleted_at',null)->get(),
			  
			  'all'=>DB::table('food_item')->where('type','all')->where('deleted_at',null)->get(),
                    ]);
                 
	 }
	public function addressDetail(Request $req) {
		  return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'address'=>DB::table('address')->where('id',$req->id)->first(),
			   
                    ]);
                 
	 }
	
	 public function searchfood(Request $req) {
             
           
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                        'search'=>DB::table('food_item')->where('name','like','%'.$req->search.'%')->where('deleted_at',null)->select('*')->get()
                    ]);
              
        }
	
	
	public function deliveryPincode(Request $req) {
             
           
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                        'pincode'=>DB::table('pincode_offer')->where('deleted_at',null)->select('*')->get()
                    ]);
              
        }
	
	
	public function pincodevalue(Request $req) {
             
           $pin=DB::table('pincode_offer')->where('pin_code',$req->pin_code)->where('deleted_at',null)->select('*')->first();
              if($pin != null){
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                        'pincode'=>DB::table('pincode_offer')->where('pin_code',$req->pin_code)->where('deleted_at',null)->select('*')->first()
                    ]);
			  }
		else{
			
			return response()->json($data = [
                        'status' => 201,
                        'msg' => 'Not Available',
                         'pincode'=>null                   
			]);
			
		}
     }
	
	
	
	public function useraddprimary(Request $req) {
             $primaryaddress=DB::table('address')->where('user_id',$req->user_id)->select('*')->first();
			 if($primaryaddress!=null){
			   $primaryaddress=DB::table('address')->where('user_id',$req->user_id)->where('primary_type',1)->select('*')->first();
		 if($primaryaddress!=null){
			 $primaryaddres=$primaryaddress;
			 
		 }
		 else{
			 $primaryaddres=DB::table('address')->where('user_id',$req->user_id)->select('*')->first();
		 }
			 
			  return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                        'primaryAddress'=>$primaryaddres,
						
                    ]);
		 }
		 else{
			 $primaryaddres=DB::table('address')->where('user_id',$req->user_id)->select('*')->first();
			 return response()->json($data = [
                        'status' => 201,
                        'msg' => 'failed',
                        
						
                    ]);
		 }
                    
                 
              
        }
	
	 public function notification(Request $req) {
	date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
	$dataa= date('d-m-Y');
		  return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'addFoodNoti'=>DB::table('notification')->where('date',$dataa)->get(),
			 
                    ]);
                 
	 }
	
	
	 public function getProfile(Request $req) {
               
              
                    return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'profile'=>DB::table('users')->where('id',$req->user_id)->where('deleted_at',null)->select('*')->first()
                    ]);
                 
              
        }
	 public function track(Request $req) {
                   return response()->json($data = [
                        'status' => 200,
                        'msg' => 'Success',
                       	'track'=>DB::table('order')->where('id',$req->order_id)->where('deleted_at',null)->select('*')->first()
                    ]);
                  
        }
	
	public function subscribtionNotification(Request $req) {
		$date2="";
		 $database = app('firebase.database');
          $reference = $database->getReference('subjects');
          $value = $reference->getValue();
		 $s=DB::table('subscribtion')->where('user_id',$req->user_id)->orderby('id','desc')->first();
		if($s != null)
		{
		  $da=DB::table('plan')->where('id',$s->plan_id)->first(); 
			 
				if($da->type=='monthly')
				{
					 date_default_timezone_set('Asia/Kolkata');
							$date = date('d-m-y');
							$date = $s->date_time_start;
							$date = strtotime($date);
							$date1 = strtotime("+28 day", $date);
							$date2 = date('Y-m-d', $date1);		
						 
				}
			
					if($da->type=='quarterly')
					{
							date_default_timezone_set('Asia/Kolkata');
							$date = date('d-m-y');
							$date = $s->date_time_start;
							$date = strtotime($date);
							$date1 = strtotime("+88 day", $date);
 		  					$date2= date('Y-m-d', $date1);		
					}
								if($da->type=='half yearly')
					{
							date_default_timezone_set('Asia/Kolkata');
							$date = date('d-m-y');
							$date = $s->date_time_start;
							$date = strtotime($date);
							$date1 = strtotime("+178 day", $date);
 		  					$date2= date('Y-m-d', $date1);		
					}
					if($da->type=='yearly')
					{
						date_default_timezone_set('Asia/Kolkata');
						$date = date('d-m-y');
						$date = $s->date_time_start;
						$date = strtotime($date);
						$date1 = strtotime("+363 day", $date);
						$date2 = date('Y-m-d', $date1);		 
 					}
		  
			$date1 = date('Y-m-d');
			if($date2==$date1){
		   		$firebaseToken = User::where('device_token','!=',null)->pluck('device_token')->all();
       		$SERVER_API_KEY='AAAAjMTYYFw:APA91bFMmkVxHQYLtpabGw2j8mlmkilqbikDiDzcTMOiNbDYJ3fDYvurvPBMypvqwc8SUQa0BZsvjBN9rNnspaMtaHGumzXcpxLWQZhY_GGeF2_IompFJSRELHskCY1kRX0PxWKbAcYa';
  
						$data = [
							"registration_ids" => $firebaseToken,
							"notification" => [
								"title" => 'Your Subscribtion Plan Expire After 2 Days' ,
                                  "body"=>'Your '.$da->type.' Plan Expire Soon.' ,

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
		
		  return response()->json($data = [
                        'status' => 200,
                        'msg' => 'success',
                     ]);
		  }
			
			return response()->json($data = [
                        'status' => 201,
                        'msg' => 'failed',
                     ]);
		}	
		  
	}
	
	
}
