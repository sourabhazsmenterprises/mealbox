@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Delivery Pincode Create</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Delivery Pincode Create</li>
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
		<form action="{{ url("admin/delevery-pincode/store") }}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}

			
					 
					 <div class="form-group">
						<label>Pincode</label>
						<input type="number"   maxlength="6" name="pin_code" value="{{ old('pin_code', isset($categroy) ? $category->pin_code : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('pin_code'))
                        <p class="help-block">
                        {{ $errors->first('pin_code') }}
						</p>
                    	 @endif 
					</div>
					 
					 <div class="form-group">
						<label>Delivery Charge</label>
						<input type="number" name="delivary_amount" value="{{ old('delivery_amount', isset($category) ? $category->delivery_amount : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('delivary_amount'))
                        <p class="help-block">
                        {{ $errors->first('delivery_amount') }}
						</p>
                    	 @endif 
					</div>
			 <div class="form-group">
						<label>Late Night Delivery Charge</label>
						<input type="number" name="late_night_charge" value="{{ old('late_night_charge', isset($category) ? $category->late_night_charge : '') }}" placehoder="Enter Address" class="form-control" required>      
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