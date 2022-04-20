@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Plan Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Plan Edit</li>
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

        <form action="{{ url("admin/plan/update",[$plan->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

			<div class="row">
			 
					  <div class="form-group col-md-6">
						<label>Type</label>
						<select name="type" value="{{ old('tittle', isset($plan) ? $plan->type : '') }}" placehoder="Enter Address" class="form-control" >     
							<option value="monthly">Monthly</option>
							<option value="quarterly">Quarterly</option>
							<option value="half yearly">Half Yearly</option>
							<option value="yearly">Yearly</option>
							
						  </select>
						@if($errors->has('type'))
                        <p class="help-block">
                        {{ $errors->first('type') }}
						</p>
                    	 @endif 
					</div>
					 <div class="form-group col-md-6">
						<label>Name</label>
						<input type="text" name="name" value="{{ old('tittle', isset($plan) ? $plan->name : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('name'))
                        <p class="help-block">
                        {{ $errors->first('name') }}
						</p>
                    	 @endif 
					</div>
					 
					 
					 	 
     
	
	 <div class="form-group col-md-6">
						<label>Price </label>
						<input type="text" name="price" value="{{ old('tittle', isset($plan) ? $plan->price : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('price'))
                        <p class="help-block">
                        {{ $errors->first('price') }}
						</p>
                    	 @endif 
					</div>
	
	<div class="form-group col-md-6">
						<label>Advance Price </label>
						<input type="text" name="advance_price" value="{{ old('tittle', isset($plan) ? $plan->advance_price : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('advance_price'))
                        <p class="help-block">
                        {{ $errors->first('advance_price') }}
						</p>
                    	 @endif 
					</div>
	<div class="form-group col-md-6">
						<label>Offer discount </label>
						<input type="number" name="offer_discount" value="{{ old('tittle', isset($plan) ? $plan->offer_discount  : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('offer_discount'))
                        <p class="help-block">
                        {{ $errors->first('offer_discount') }}
						</p>
                    	 @endif 
					</div>
	
	<div class="form-group col-md-6">
						<label>Valid Date Time From</label>
						<input type="date" name="valid_date_time_from" value="{{ old('tittle', isset($plan) ? $plan->valid_date_time_from : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('valid_date_time_from'))
                        <p class="help-block">
                        {{ $errors->first('valid_date_time_from') }}
						</p>
                    	 @endif 
					</div>
					 
	<div class="form-group col-md-6">
						<label>Valid Date Time To</label>
						<input type="date" name="valid_date_time_to" value="{{ old('tittle', isset($plan) ? $plan->valid_date_time_to : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('valid_date_time_to'))
                        <p class="help-block">
                        {{ $errors->first('valid_date_time_to') }}
						</p>
                    	 @endif 
					</div>
					 
	
	
	
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