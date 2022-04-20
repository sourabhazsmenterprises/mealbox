@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Food Item Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Food Item Edit</li>
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

        <form action="{{ url("admin/food-item/update",[$fooditem->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

			 <div class="row">
			 <div class="form-group col-md-6" >
						<label>Category</label>
						<select   name="category"   placehoder="Enter Address" class="form-control" required > 
							<?php $category=DB::table('category')->where('deleted_at',null)->get();
							$categorys=DB::table('category')->where('deleted_at',null)->first();
							
							?>
							@if($categorys != null)
							@foreach($category as  $key=>$cat)
							<option value="{{$cat->id}}"  @if($fooditem->category==$cat->id) selected @endif>{{$cat->name}}</option>
							@endforeach
							@endif
							</select>
						@if($errors->has('category'))
                        <p class="help-block">
                        {{ $errors->first('category') }}
						</p>
                    	 @endif 
					</div>
			
			 <div class="form-group col-md-6">
						<label>Type</label>
						<select   name="type"   placehoder="Enter Address" class="form-control" required > 
							 
							<option value="all">All</option>
							<option value="lunch time" @if($fooditem->type=='lunch time') selected @endif>Lunch Time</option>
							<option value="break fast" @if($fooditem->type=='break fast') selected @endif>Break Fast</option>
							<option value="dinner time" @if($fooditem->type=='dinner time') selected @endif>Dinner Time</option>
							 
							</select>
						@if($errors->has('type'))
                        <p class="help-block">
                        {{ $errors->first('type') }}
						</p>
                    	 @endif 
					</div>
				 
				 
				 <div class="form-group col-md-6">
						<label>Veg / Nonveg</label>
						<select   name="veg_nveg"   placehoder="Enter Address" class="form-control" required> 
							 
							<option value="veg" @if($fooditem->veg_nveg=='veg') selected @endif>Veg</option>
							<option value="nonveg" @if($fooditem->veg_nveg=='nonveg') selected @endif>Nonveg</option>
							 
							 
							</select>
						@if($errors->has('veg_nveg'))
                        <p class="help-block">
                        {{ $errors->first('veg_nveg') }}
						</p>
                    	 @endif 
					</div>
					 
					 <div class="form-group col-md-6">
						<label>Name</label>
						<input type="text" name="name" value="{{ old('tittle', isset($fooditem) ? $fooditem->name : '') }}" placehoder="Enter Address" class="form-control" required >      
						@if($errors->has('name'))
                        <p class="help-block">
                        {{ $errors->first('name') }}
						</p>
                    	 @endif 
					</div>
					 
				 
					 	 
            <div class="form-group col-md-6">
						<label> Image</label>
				  <br>
                        <img src="{{asset($fooditem->image)}}" style="height:100px;width:100px;">
                        <br>
                        <br>
						<input type="file" name="image" value="" placehoder="Enter Address" class="form-control"> 
				<input type="hidden" name="image" value="{{$fooditem->image}}" placehoder="Enter Address" class="form-control" > 
						@if($errors->has('image'))
                        <p class="help-block">
                        {{ $errors->first('image') }}
						</p>
                    	 @endif 
					</div>
					  <div class="form-group col-md-6">
						<label>Description</label>
						<textarea   name="description" value="" placehoder="Enter Address" class="form-control" required >{{ old('tittle', isset($fooditem) ? $fooditem->description : '') }}</textarea>   
						@if($errors->has('description'))
                        <p class="help-block">
                        {{ $errors->first('description') }}
						</p>
                    	 @endif 
					</div>
			<div class="form-group col-md-6">
						<label>Recipe</label>
						<textarea   name="recipe" value="" placehoder="Enter Address" class="form-control" >{{ old('tittle', isset($fooditem) ? $fooditem->recipe : '') }}</textarea>   
						@if($errors->has('recipe'))
                        <p class="help-block">
                        {{ $errors->first('recipe') }}
						</p>
                    	 @endif 
					</div>
	<div class="form-group col-md-6">
						<label>Ingredients </label>
						<textarea   name="ingredients" value="" placehoder="Enter Address" class="form-control" required >{{ old('tittle', isset($fooditem) ? $fooditem->ingredients : '') }}</textarea>   
						@if($errors->has('ingredients'))
                        <p class="help-block">
                        {{ $errors->first('ingredients') }}
						</p>
                    	 @endif 
					</div>
	
	 <div class="form-group col-md-6">
						<label>Price </label>
						<input type="text" name="mainprice" value="{{ old('tittle', isset($fooditem) ? $fooditem->mainprice : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('mainprice'))
                        <p class="help-block">
                        {{ $errors->first('mainprice') }}
						</p>
                    	 @endif 
					</div>
	 <div class="form-group col-md-6">
						<label>Offer Price </label>
						<input type="text" name="price" value="{{ old('tittle', isset($fooditem) ? $fooditem->price : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('price'))
                        <p class="help-block">
                        {{ $errors->first('price') }}
						</p>
                    	 @endif 
					</div>
	
	<div class="form-group col-md-6">
						<label>Available Plans </label>
						<input type="text" name="available_plans" value="{{ old('tittle', isset($fooditem) ? $fooditem->available_plans : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('available_plans'))
                        <p class="help-block">
                        {{ $errors->first('available_plans') }}
						</p>
                    	 @endif 
					</div>
	<div class="form-group col-md-6">
						<label>Max Quantity</label>
						<input type="number" name="max_quantity" value="{{ old('tittle', isset($fooditem) ? $fooditem->max_quantity : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('max_quantity'))
                        <p class="help-block">
                        {{ $errors->first('max_quantity') }}
						</p>
                    	 @endif 
					</div>
	
	<div class="form-group col-md-6">
						<label>Times To Delivery Chrage</label>
						<input type="number" name="times_to_delivery_chrage" value="{{ old('tittle', isset($fooditem) ? $fooditem->times_to_delivery_chrage : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('times_to_delivery_chrage'))
                        <p class="help-block">
                        {{ $errors->first('times_to_delivery_chrage') }}
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