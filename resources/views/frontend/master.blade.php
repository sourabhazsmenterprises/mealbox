<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="img/season-change.jpg" type="image/x-icon">
		<title>FirstCare</title>

<head>
     @include('frontend.common.header_script') 
</head>
<body data-offset="200" data-spy="scroll" data-target=".ow-navigation"> 
     
    @include('frontend.common.header') 
    @yield('main_content')
    @include('frontend.common.footer')
    @include('frontend.common.footer_script')
    
</body>
</html>