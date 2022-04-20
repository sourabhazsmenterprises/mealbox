<style>

 
a{
  text-decoration:none;
  color:#444444;
} 


.login-reg-panel{
    position: relative;
    top: 50%;
    transform: translateY(-50%);
	text-align:center;
    width:70%;
	right:0;
    left:0;
    margin: auto;
    margin-top: auto;
height: 400px;
background-color: #00bcd4;
margin-top: 400px;
   
    
    background-color: #00bcd4;
}
.white-panel{
    background-color: rgba(255,255, 255, 1);
    height:650px;
    position:absolute;
    top:-100px;
    width:50%;
    right:calc(50% - 50px);
    transition:.3s ease-in-out;
    z-index:0;
    box-shadow: 0 0 15px 9px #00000096;
}
.login-reg-panel input[type="radio"]{
    position:relative;
    display:none;
}
.login-reg-panel{
    color:#B8B8B8;
}
h2{
    color:#fff;
}
p{
    color:#fff;
}
.login-reg-panel #label-login, 
.login-reg-panel #label-register{
    border:1px solid #9E9E9E;
    padding:5px 5px;
    width:150px;
    display:block;
    text-align:center;
    border-radius:10px;
    cursor:pointer;
    font-weight: 600;
    font-size: 18px;
    color:#fff;
}
.login-info-box{
    width:30%;
    padding:0 50px;
    top:20%;
    left:0;
    position:absolute;
    text-align:left;
}
.register-info-box{
    width:30%;
    padding:0 50px;
    top:20%;
    right:0;
    position:absolute;
    text-align:left;
    
}
.right-log{right:50px !important;}

.login-show, 
.register-show{
    z-index: 1;
    display:none;
    opacity:0;
    transition:0.3s ease-in-out;
    color:#242424;
    text-align:left;
    padding:50px;
}
.show-log-panel{
    display:block;
    opacity:0.9;
}
 
.login-show input[type="text"], .login-show input[type="password"]{
    width: 100%;
    display: block;
    margin:20px 0;
    padding: 15px;
    border: 1px solid #b5b5b5;
    outline: none;
}
	 
.login-show input[type="submit"] {
    max-width: 150px;
    width: 100%;
    background: #444444;
    color: #f9f9f9;
    border: none;
    padding: 10px;
    text-transform: uppercase;
    border-radius: 2px;
    float:right;
    cursor:pointer;
}
.login-show a{
    display:inline-block;
    padding:10px 0;
}

.register-show input[type="text"], .register-show input[type="password"]{
    width: 100%;
    display: block;
    margin:20px 0;
    padding: 15px;
    border: 1px solid #b5b5b5;
    outline: none;
}
.register-show input[type="radio"]{
    width:auto;
    display: block;
  
}
	.radio-inline, .checkbox-inline {
    display: inline-block;
    padding-left: 16px !important;
    margin-bottom: 0;
    font-weight: 400;
    vertical-align: middle;
    cursor: pointer;
}
.register-show input[type="submit"] {
    max-width: 150px;
    width: 100%;
    background: #444444;
    color: #f9f9f9;
    border: none;
    padding: 10px;
    text-transform: uppercase;
    border-radius: 2px;
    float:right;
    cursor:pointer;
}
.credit {
    position:absolute;
    bottom:10px;
    left:10px;
    color: #3B3B25;
    margin: 0;
    padding: 0;
    font-family: Arial,sans-serif;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 1px;
    z-index: 99;
}
a{
  text-decoration:none;
  color:#2c7715;
}
    .mk{
		display:block  !important;
	}
	.sk{
		display:none  !important;
	}
@media only screen and (max-width:800px) {
	.mk{
		display:none  !important;
	}
	.sk{
		display:block !important;
	}
 .login-reg-panel{
    position: relative;
    top:50%;
    transform: translateY(-50%);
	text-align:center;
    width:100%;
	right:0;
    left:0;
    margin:auto;
    height:500px;
   
    
    background-color: #00bcd4;
}
	.white-panel{
    background-color: rgba(255,255, 255, 1);
    height:550px;
    position:absolute;
    top:-50px;
    width:70%;
    right:calc(40% - 50px);
    transition:.3s ease-in-out;
    z-index:0;
    box-shadow: 0 0 15px 9px #00000096;
}
	.login-reg-panel #label-login, .login-reg-panel #label-register{
		border: 1px solid #9E9E9E;
padding:20px 80px 20px 10px;
width: 100%;
		margin-left:50px;
		margin-top:-160px;
display: block;
text-align: center;
border-radius: 10px;
cursor: pointer;
font-weight: 600;
font-size: 18px;
color: #000;
	}
	
}
    
    
</style>


<section>
		<div>
		
		</div>
		</section>
        <div class="login-reg-panel ">
            <div class="login-info-box">
                <h2 class="mk">Have an account?</h2>
                <p class="mk">Lorem ipsum dolor sit amet</p>
                <label class="mk" id="label-register" for="log-reg-show">Login</label>
                <input   type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
            </div>
                                
            <div class="register-info-box ">
                <h2 class="mk">Don't have an account?</h2>
                <p class="mk">Lorem ipsum dolor sit amet</p>
                <label id="label-login" for="log-login-show" class="mk">Register</label>
                <input type="radio"   name="active-log-panel"id="log-login-show">
            </div>
                                
            <div class="white-panel">
				<div class="login-info-box">
                
                <label class="sk" id="label-register" for="log-reg-show" style="width:auto;color:black">Login</label>
                <input   type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
            </div>
                                
            <div class="register-info-box ">
                
                <label id="label-login" for="log-login-show" class="sk" style="width:auto;color:black">Register</label>
                <input type="radio"   name="active-log-panel" id="log-login-show">
            </div>
            <form method="POST" action="{{ route('loginsubmit') }}">
            @csrf
                <div class="login-show">
                    <h2 style="color:#000;">LOGIN</h2>
                    <input type="text" placeholder="Email/Mobile/FCI" name="email">
                    <input type="password" placeholder="Password" name="password">
                    <input type="submit" value="Login" onclick="this.form.submit()">
                    <a href="">Forgot password?</a>
                </div>
</form>
                <form method="POST" action="{{ route('registersubmit') }}">
            @csrf
                <div class="register-show">
                    <h2 style="color:#000;">REGISTER</h2>
					 <label class="radio-inline">
      <input type="radio" name="type" value="1"  onclick="doctorsd()">Patient
    </label>
					 <label class="radio-inline">
      <input type="radio" name="type" value="2" onclick="doctors()" >Doctor
    </label>
				 
						 <label class="radio-inline">
      <input type="radio" name="type" value="3" onclick="doctorsd()" >Diagnostic Centers
    </label>
				 
					 <label class="radio-inline">
      <input type="radio" name="type" value="4"  onclick="doctorsd()">Pharmacy
    </label>
				 <input type="text" placeholder="Doctor Id" id="docid" name="docid" required style="display:none">
                   
                    <input type="text" placeholder="Name" name="name" required>
					 <input type="text" placeholder="Email" id="email" name="email" onchange="emailsend(this.value)" required>
					<span id="already" style="color:red;display:none;" >Email Already Register</span> 
					 <input type="text" id="otp" placeholder="OTP Number " onchange="otpverify(this.value)" name="otp" style="display:none" >
                    <input type="text" placeholder="Mobile Number" name="mobile" required>
                    <select type="text" class="form-control" name="gender" required placeholder="Gender" style="width:100%;color:black">
                        <option>Select Your Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                        </select>
                    <input type="password" name="password" placeholder="Password" required>
                    <input  type="password" name="password_confirmation"  placeholder="Confirm Password" required>
                    <input type="submit" value="Register" onclick="this.form.submit()">

                </div>
                </form>
            </div>
        </div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
		<script type="text/javascript" src="assets/js/wow.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

        <script>
			$(document).ready(function() {
  				$("#starting-slider").owlCarousel({
  					autoPlay: 3000,
      				navigation : false, // Show next and prev buttons
      				slideSpeed : 700,
      				paginationSpeed : 1000,
      				singleItem:true
  				});
			});
		</script>


		<script>
			$( function() {
				  // init Isotope
			  	var $container = $('.isotope').isotope
			  	({
				    itemSelector: '.element-item',
				    layoutMode: 'fitRows'
			  	});


  				// bind filter button click
  				$('#filters').on( 'click', 'button', function() 
  				{
				    var filterValue = $( this ).attr('data-filter');
				    // use filterFn if matches value
				    $container.isotope({ filter: filterValue });
				 });
  
			  // change is-checked class on buttons
			  	$('.button-group').each( function( i, buttonGroup ) 
			  	{
			    	var $buttonGroup = $( buttonGroup );
			    	$buttonGroup.on( 'click', 'button', function() 
			    	{
			      		$buttonGroup.find('.is-checked').removeClass('is-checked');
			      		$( this ).addClass('is-checked');
			    	});
			  	});
			  
			});
		</script>
<script>


$(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
});


$('.login-reg-panel input[type="radio"]').on('change', function() {
    if($('#log-login-show').is(':checked')) {
        $('.register-info-box').fadeOut(); 
        $('.login-info-box').fadeIn();
        
        $('.white-panel').addClass('right-log');
        $('.register-show').addClass('show-log-panel');
        $('.login-show').removeClass('show-log-panel');
        
    }
    else if($('#log-reg-show').is(':checked')) {
        $('.register-info-box').fadeIn();
        $('.login-info-box').fadeOut();
        
        $('.white-panel').removeClass('right-log');
        
        $('.login-show').addClass('show-log-panel');
        $('.register-show').removeClass('show-log-panel');
    }
});
  function doctors(){
	  document.getElementById('docid').style.display="block";
  }
	 function doctorsd(){
	  document.getElementById('docid').style.display="none";
  }
	function emailsend(id){
		
      var xhr = new XMLHttpRequest();
      xhr.open('GET','{{ url("json-response") }}?email='+id,true);

      xhr.onload = function () {       
      var cat_id = JSON.parse(xhr.responseText);
   console.log(cat_id);
		 if(cat_id.data==1){
    document.getElementById('otp').style.display="block";
    document.getElementById('already').style.display="none";
		 }
		  else{
			  document.getElementById('otp').style.display="none"; 
			   document.getElementById('already').style.display="block"; 
		  }
		  
}
xhr.send();
}


function otpverify(id){
   var email= document.getElementById('email').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','{{ url("json-response") }}?otp='+id+'&emailid='+email,true);
  
        xhr.onload = function () {       
        var cat_id = JSON.parse(xhr.responseText);
     console.log(cat_id);
           if(cat_id.otp==1){
      document.getElementById('otp').style.display="none";
      
           }
            else{
                document.getElementById('otp').style.display="block"; 
                 
            }
            
  }
  xhr.send();
  }
</script>
