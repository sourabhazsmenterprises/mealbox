<section class= "navs">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  				<div class="container-fluid">
    				<!-- Brand and toggle get grouped for better mobile display -->
    				<div class="navbar-header">
      					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
	      				</button>
	      				<a class="navbar-brand logo" href="#">
	      					 
							<img src="assets/img/logsa.png" style="height:45px;width:100%;"class="img-fluid">
	      					 
	      				</a>
	    			</div>
		  @if(session('mymsg23') != null)
 <div class="alert alert-success alertsuss alert-dismissible">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	 {{session('mymsg23')}}
</div>
			@endif
		    		<!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				    	<ul class="nav navbar-nav navbar-right">
					        <li class="active"><a href="{{url('/')}}">Home</a></li>
							<li><a href="{{url('about-us')}}">About Us</a></li>
					        <li><a href="{{url('services')}}">Services</a></li>
					        
							
							<li><a href="{{url('contact-us')}}">Contact Us</a></li>
							@if(Auth::check())
							<li><a href="{{url('profile')}}">Profile</a></li>
							<li><a href="{{url('logout1')}}">logout</a></li>
							@else
                            <li><a href="{{url('userreg')}}">Login/Register</a></li>
							@endif
				      	</ul>
				    </div><!-- navbar-collapse -->
				</div><!-- container-fluid -->
			</nav>
		</section>
	