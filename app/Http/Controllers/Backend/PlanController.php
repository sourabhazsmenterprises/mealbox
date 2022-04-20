<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Plan;
use DB;

class PlanController extends Controller
{
   
    public function index()
    {
        //abort_unless(\Gate::allows('bannerimage_access'), 403);

        $plan= Plan::all();

        return view('backend.plan.index', compact('plan'));
    }

    public function create()
    {
       // abort_unless(\Gate::allows('bannerimage_create'), 403);

        return view('backend.plan.create');
    }

    public function store(Request $req)
    {
        
        $reg = new Plan;
        
         
        $reg->name=$req->name;
		$reg->valid_date_time_from=$req->valid_date_time_from;
        $reg->valid_date_time_to=$req->valid_date_time_to;
		$reg->advance_price=$req->advance_price;
		 $reg->type=$req->type;
		$reg->price=$req->price;
		$reg->offer_discount=$req->offer_discount;
		 
        $reg->save();

        return redirect('admin/plan/');
    }

    public function edit($id)
    {

       // abort_unless(\Gate::allows('bannerimage_edit'), 403);
        $plan= Plan::find($id);

        return view('backend.plan.edit', compact('plan'));
    }

    public function update(Request $req, $id)
    {
       // abort_unless(\Gate::allows('bannerimage_edit'), 403);
         
        
        Plan::where('id',$id)->update([
			 
			'name'=>$req->name,
			'valid_date_time_from'=>$req->valid_date_time_from,
			'valid_date_time_to'=>$req->valid_date_time_to,
			'advance_price'=>$req->advance_price,
			'type'=>$req->type,
			 
			'price'=>$req->price,
			'offer_discount'=>$req->offer_discount,
			 
        ]);

         return redirect('admin/plan/');
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
	
	 public function orderItem(Request $req) {
           
              
                     
                       	/*$order_item=DB::table('order')->join('users','order.user_id','users.id')->join('food_item','order.food_id','food_item.id')->where('order.deleted_at',null)->orderby('order.id','desc')->select('order.*','users.name as account_user_name','users.mobile as account_mobile_number','food_item.name as food_name','food_item.description as food_description','food_item.image as food_image','food_item.ingredients as food_ingredients','food_item.recipe as food_recipe','food_item.veg_nveg as veg_nveg')->get();
		 dd($order_item);*/
		 $order_item=DB::table('order')->join('orderproduct','orderproduct.payment_id','order.payment_id')->join('food_item','orderproduct.food_name','food_item.name')->orderby('order.id','desc')->select('orderproduct.*','order.status','order.delivary_address','order.order_date_time','order.delivery','order.id as order_id','order.estimate_delivarty_time','order.id as order_id','order.final_price','order.delivery_charge','order.late_night','food_item.name as food_name','food_item.description as food_description','food_item.image as food_image','food_item.ingredients as food_ingredients','food_item.recipe as food_recipe','food_item.veg_nveg as veg_nveg')->get();
               // dd($order_item);
		 
		 return view('backend.order.index',compact('order_item'));
                 
              
        }
}
