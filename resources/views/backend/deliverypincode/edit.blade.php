@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Delivery Pincode Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Delivery Pincode Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">

<div class="card">
 



    <div class="card-body">

        <form action="{{ url("admin/delevery-pincode/update",[$bannerimage->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

			 
						 <div class="form-group">
						<label>Pincode</label>
						<input type="number" name="pin_code" maxlength="6" value="{{ old('pin_code', isset($bannerimage) ? $bannerimage->pin_code : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('pin_code'))
                        <p class="help-block">
                        {{ $errors->first('pin_code') }}
						</p>
                    	 @endif 
					</div>
					 
					 <div class="form-group">
						<label>Delivery Charge</label>
						<input type="number" name="delivary_amount" value="{{ old('delivery_amount', isset($bannerimage) ? $bannerimage->delivery_amount : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('delivery_amount'))
                        <p class="help-block">
                        {{ $errors->first('delivery_amount') }}
						</p>
                    	 @endif 
					</div>
			 <div class="form-group">
						<label>Late Night Delivery Charge</label>
						<input type="number" name="late_night_charge" value="{{ old('late_night_charge', isset($bannerimage) ? $bannerimage->late_night_charge : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('late_night_charge'))
                        <p class="help-block">
                        {{ $errors->first('late_night_charge') }}
						</p>
                    	 @endif 
					</div>
					 	 
					 
					 	 

            <div>

                <input class="btn btn-danger" type="submit" value="Save">

            </div>

        </form>

    </div>

</div>
	</section>
</div>


@endsection