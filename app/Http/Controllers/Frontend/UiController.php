<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;
use Mail;

class UiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.webviews.index');
    }

    public function aboutus()
    {
        return view('frontend.webviews.aboutus');
    }
	
	 public function profile()
    {
        return view('frontend.webviews.user_profile');
    }
    public function contactus()
    {
        return view('frontend.webviews.contactus');
    }

    public function services()
    {
        return view('frontend.webviews.services');
    }
    
    public function userreg()
    {
        return view('frontend.webviews.userreg');
    }
   
	public function jsonresponse(Request $req)
    {
        if($req->emailid){
           $otps= DB::table('otpsend')->where('email',$req->emailid)->orderby('id','desc')->first();
                if($otps->otp==$req->otp){
                    $data['otp']=1;

                    }
                    else{

                        $data['otp']=0; 
                    }
        }
		   if($req->email){
        $datas=DB::table('users')->where('email',$req->email)->first();
			   $otp=rand(1111111,999999);
			   if($datas==null){
				    DB::table('otpsend')->insert([
						'otp'=>$otp,
						'email'=>$req->email
						
						]);
				   require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
       
        $subject="Otp Detail";
        $email_message = " 
                        otp: $otp";
        
                        try{ 
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = "DAli4978234@gmail.com";
            $mail->Password = "Ali#98765";// sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->IsHTML(true);
            $mail->AddAddress($req->email, "Firstcare");
            $mail->SetFrom("from-DAli4978234@gmail.com", "Firstcare");
            $mail->AddReplyTo($req->email, "Firstcare");
            $mail->AddCC($req->email, "Firstcare");

           
            $mail->MsgHTML($email_message);
             $mail->Subject = 'Firstcare';
            $mail->Body    = $email_message;
              $mail->send();
							 $data['data']=1;
            } catch (Exception $e) {
                return back()->with('error','Message could not be sent.');
           }
				  
			   }
			   else{
				     $data['data']=0;
			   }
			    
			   
        }
          return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
