<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required'],
            'gender' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
   
     */
    protected function create(Request $req)
    {
        $match=DB::table('users')->where('email',$req->email)->Orwhere('mobile',$req->mobile)->first();
        if($match==null){ 
          $user =User::create([
            'name' =>$req->name,
            'email' =>$req->email,
           
            'password' => Hash::make($req->password),
        ]);

        $dbra=DB::table('users')->orderby('id','desc')->skip(1)->first();
        $no=$dbra->no+1;
        //dd($no);
        $firstcare_id='FC0000'.$no;
        DB::table('users')->where('id',$user->id)->update([
            'mobile'=> $req->mobile,
            'gender'=> $req->gender,
            'no'=> $no,
            'firstcare_id'=>$firstcare_id,
            'docid'=>$req->docid,
            'type'=>$req->type,
        ]);
 
        Auth::login($user);
        if(Auth::user()->type==1){ 
        return redirect('/')->with('mymsg23','Register Successfully');

        }

        else{
            return redirect('/admin')->with('mymsg23','Register Successfully');   
        }
    }
        else{
        return back();
    }
        
    }
}
