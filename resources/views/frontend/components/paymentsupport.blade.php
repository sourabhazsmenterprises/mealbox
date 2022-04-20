<html lang="en"><head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="description" content="Payment request by refur-b.com">
 
    <meta property="og:description" content="Payment request by refur-b.com">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Pay for support by refur-b.com">
    <meta name="twitter:description" content="Payment request by refur-b.com">
   
     

    <style>
        body {
            background-color: #efefef;
        }
    </style>

                        
     
        <script src="{{asset('css1/bundle.js')}}" defer=""></script>
        <script src="{{asset('color.js')}}"></script>
        <script src="{{asset('css1/wysiwyg.js')}}" onload="renderPaymentPage()" async="" defer=""></script>
    <title>support</title>
    <link href="{{asset('css1/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css1/icons.css')}}">
<link href="https://fonts.googleapis.com/css?family=Muli:400,700" rel="stylesheet">
<meta name="theme-color" content="rgb(35,113,236)"><link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
 
</script><script async="" src="//static.hotjar.com/c/hotjar-575141.js?sv=5"></script><style id="preset_style" type="text/css">
#paymentpage-container .btn {
  background-color: rgb(35,113,236);
  color: #fff !important
}

#paymentpage-container .Field--counter button {
  color: rgb(35,113,236);
  
}

#paymentpage-container .Field--CheckBox [type="checkbox"]:checked + .CheckBox-mark {
  background-color: rgb(35,113,236);
}

#paymentpage-container .Field.Field--CheckBox .CheckBox-mark::after {
  border-color: #fff;
}

#paymentpage-container .title-underline {
  border-color: rgb(35,113,236);
}

#paymentpage-container #desktop-container .content-container .content::before {
  border-color: rgb(35,113,236);
}
</style><script async="" src="modules.js" charset="utf-8"></script><style type="text/css">iframe#_hjRemoteVarsFrame {display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;}</style></head>

<body class="theme-desktop light">
    <div id="paymentpage-container">
                


<div id="desktop-container"><div class="content-container"><div class="content"><div id="header-details">
<div id="merchant-name" style="font-size:22px;">Refur-b.com</div></div>
        <div data-view-id="1" id="main-view" class="slider-view"><!---->

<div class="title"><a slot="before" href="#" class="back-btn" type="button"></a><!---->
Payment Details
<div class="title-underline"></div>
</div>

<div id="form-section" class=""><form class="UI-form "  action={{url('payment-link')}} >
	@csrf
<div><div>
   
    <div class="Field Field--amount Field--currency-1"><div class="Field-label">Amount
        

        <div class="text-optional">(Optional)</div></div>
<div class="Field-content"><div class="Field-wrapper"><span class="Field-addon Field-addon--before"><span slot="addonBefore">
  <b class="currency-symbol"></b></span></span>
	<input class="Field-el" type="hidden" placeholder="Enter Amount" name="currency" value="{{$currency}}">
<input class="Field-el" type="tel" placeholder="Enter Amount" maximum="50000000" name="amount" required>
<span class="Field-addon Field-addon--after"><span slot="addonAfter" style="color: red; font-size: 12px;"></span></span></div>
    <div class="Field-error"></div>
    <div class="Field-description"></div></div></div></div><!----><!----><div class="Field Field--required"><div class="Field-label">Email
        

        </div>
<div class="Field-content"><div class="Field-wrapper"><span class="Field-addon "></span>
<input class="Field-el" name="email" required="" type="text"> 
<span class="Field-addon "></span></div>
    <div class="Field-error"></div>
    <div class="Field-description"></div></div></div><!----><div class="Field Field--required"><div class="Field-label">Phone
        

        </div>
<div class="Field-content"><div class="Field-wrapper"><span class="Field-addon "></span>
<input class="Field-el" name="phone" required="" type="tel" minlength="8">
<span class="Field-addon "></span></div>
    <div class="Field-error"></div>
    <div class="Field-description"></div></div></div><!----></div>
<!----><div slot="after"><div id="form-footer" class="">



<div class="form-footer-payment"><img id="fin-logo" alt="pay-methods" src="https://cdn.razorpay.com/static/assets/pay_methods_branding.png">
    
    <button type="submit" class="btn btn--gradient">Pay <span style="margin-left: 4px;"></span></button><!----></div></div></div></form><!----></div></div>
        <div id="details-view" class=""><div id="details-section"><div id="description-details"><div class="title title--big">
support
<div class="title-underline"></div>
</div>

<div id="description" class="details-value text-wrap"><div id="description-quill" class="ql-container ql-snow ql-disabled"><div class="ql-editor" data-gramm="false" contenteditable="false"><h2>Product Image(s)</h2><p># Select and upload some images of your product / service</p><p><br></p><h2>Product Description </h2><p># Add product description with features and benefits</p><p><br></p><h2>Ships in X days ( if physical product )</h2><p># Time required to prepare order for shipment in days</p><p><br></p><h2>Average delivery time </h2><p># Average time required for delivery after shipment</p></div><div class="ql-clipboard" tabindex="-1" contenteditable="true"></div></div></div></div>

    

    <div id="support-details"><label>Contact Us:</label>
<div class="sub-detail"><a href="mailto:refur@gmail.com?subject=Query for Payment Page Id: pl_HhXmFZnXhyGQhU" target="_blank" rel="noopener noreferrer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>
        <div>refur-b@gmail.com</div></a></div>

<div class="sub-detail"><a href="tel:1234567890"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"></path></svg>
        <div>1234567890</div></a></div></div><!---->
    <!----></div>

<div class="details-footer "><img id="rzp-logo" alt="rzp-logo" src="https://cdn.razorpay.com/logo.svg">
    <div>Want to create payment pages for your business? Visit <a href="https://razorpay.com/payment-pages/?utm_source=hostedpage&amp;utm_medium=footer&amp;utm_campaign=paymentpage" target="_blank" rel="noopener noreferrer">Razorpay Payment Pages</a> and get started!</div>
    <div class="disclaimer-message">You agree to share information entered on this page with refur-b.com (owner of this page) and Razorpay, adhering to applicable laws.</div>
    <div class="report-message"><span>Please report this page if you find it to be suspicious</span>
        <a href="https://razorpay.com/support/payments/report-merchant/?e=cGxfSGhYbUZablhoeUdRaFU=&amp;s=aG9zdGVk" target="_blank" rel="noopener noreferrer"><img src="https://cdn.razorpay.com/static/assets/email/flag.png" alt="report flag">
          <span>Report Page</span></a></div><!----></div></div></div></div></div>

<!----></div>
    <!-- Adding checkout scripts after initial load -->
                <!-- <script>
            window.addEventListener('load', function() {
                var script = document.createElement("script");
                script.src = "https://checkout.razorpay.com/v1/checkout.js";
                document.body.appendChild(script);
            });
        </script> -->
        
