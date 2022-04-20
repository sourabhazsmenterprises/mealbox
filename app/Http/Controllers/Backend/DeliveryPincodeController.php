<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBannerImagesRequest;
use App\Http\Requests\StoreBannerImagesRequest;
use App\Http\Requests\UpdateBannerImagesRequest;
use Illuminate\Http\Request;
use App\Models\DeliveryPincode;
use DB;

class DeliveryPincodeController extends Controller
{
   
    public function index()
    {
        //abort_unless(\Gate::allows('bannerimage_access'), 403);

        $DeliveryPincode= DeliveryPincode::all();

        return view('backend.deliverypincode.index', compact('DeliveryPincode'));
    }

    public function create()
    {
       // abort_unless(\Gate::allows('bannerimage_create'), 403);

        return view('backend.deliverypincode.create');
    }

    public function store(Request $req)
    {
        

        $reg = new DeliveryPincode;
        
        
        $reg->pin_code=$req->pin_code;
        $reg->delivary_amount=$req->delivary_amount;
        $reg->late_night_charge=$req->late_night_charge;
		$reg->save();

        return redirect('admin/delevery-pincode/');
    }

    public function edit($id)
    {

       // abort_unless(\Gate::allows('bannerimage_edit'), 403);
        $bannerimage= DeliveryPincode::find($id);

        return view('backend.deliverypincode.edit', compact('bannerimage'));
    }

    public function update(Request $req, $id)
    {
       // abort_unless(\Gate::allows('bannerimage_edit'), 403);
        // dd($req->category);
        
         DeliveryPincode::where('id',$id)->update([
             'pin_code'=>$req->pin_code,
             'late_night_charge'=>$req->late_night_charge,
             'delivary_amount'=>$req->delivary_amount,
			
        ]);

         return redirect('admin/delevery-pincode/');
    }

    public function show($id)
    {
       // abort_unless(\Gate::allows('bannerimage_show'), 403);
         $value =  DeliveryPincode::find($id);
        
        return view('backend.deliverypincode.show', compact('value'));
    }

    public function destroy($bannerimage)
    {
        
      //  abort_unless(\Gate::allows('bannerimage_delete'), 403);

       DeliveryPincode::where('id',$bannerimage)->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        DeliveryPincode::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
	public function addmaster($id,$val){
		 DeliveryPincode::where('id',$id)->update([
        'master'=>$val
        ]);
        return back();
	}
	public function userFindPincode(Request $req)
    {
       // abort_unless(\Gate::allows('bannerimage_show'), 403);
         $value =  DB::table('pincode')->where('deleted_at',null)->orderby('id','desc')->get();
        
        return view('backend.deliverypincode.picode', compact('value'));
    }
	
	public function userPlan(Request $req)
    {
       // abort_unless(\Gate::allows('bannerimage_show'), 403);
         $value=DB::table('subscribtion')->where('deleted_at',null)->orderby('id','desc')->get();
        //dd(value);
        return view('backend.deliverypincode.userplan', compact('value'));
    }
}
