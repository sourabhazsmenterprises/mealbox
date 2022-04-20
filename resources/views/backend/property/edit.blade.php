@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Property Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Property Edit</li>
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

        <form action="{{ url("admin/property/update",[$property->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

			 
					 
					 <div class="form-group">
						<label>  Tittle</label>
                         <input type="text" name="tittle" value="{{$property->tittle}}" class="form-control" >      
						@if($errors->has('tittle'))
                        <p class="help-block">
                        {{ $errors->first('tittle') }}
						</p>
                    	 @endif 
					</div>
				 
					 <div class="form-group">
						<label>Banner Image</label>
                          <br>
                        <img src="{{asset($property->image)}}" style="height:100px;width:100px;">
                        <br>
                        <br>
                        <input type="hidden" name="image" value="{{ old('image', isset($property) ? $property->image : '') }}">
						<input type="file" name="image" value="" class="form-control" >      
						@if($errors->has('image'))
                        <p class="help-block">
                        {{ $errors->first('image') }}
						</p>
                    	 @endif 
					</div>
					 
					  <div class="form-group">
						<label> Description *</label>
						<input type="text"  name="describtion" value="{{ old('describtion', isset($property) ? $property->describtion : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('describtion'))
                        <p class="help-block">
                        {{ $errors->first('describtion') }}
						</p>
                    	 @endif 
					</div>
			
			 <div class="form-group">
						<label> Owner Name *</label>
						<input type="text"  name="author_name" value="{{ old('author_name', isset($property) ? $property->author_name : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('author_name'))
                        <p class="help-block">
                        {{ $errors->first('author_name') }}
						</p>
                    	 @endif 
					</div>
			 <div class="form-group">
						<label> Owner Mobile *</label>
						<input type="text"  name="author_mobile" value="{{ old('author_mobile', isset($property) ? $property->author_mobile : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('author_mobile'))
                        <p class="help-block">
                        {{ $errors->first('author_mobile') }}
						</p>
                    	 @endif 
					</div>
			 <div class="form-group">
						<label> Address *</label>
						<textarea   name="address"   placehoder="Enter Address" class="form-control" required>{{ old('address', isset($property) ? $property->address : '') }} </textarea>    
						@if($errors->has('address'))
                        <p class="help-block">
                        {{ $errors->first('address') }}
						</p>
                    	 @endif 
					</div>
			 <div class="form-group">
						<label>City *</label>
						<input type="text"  name="city" value="{{ old('city', isset($property) ? $property->author_mobile : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('city'))
                        <p class="help-block">
                        {{ $errors->first('city') }}
						</p>
                    	 @endif 
					</div>
			<div class="form-group">
						<label>State *</label>
						<input type="text"  name="state" value="{{ old('state', isset($property) ? $property->state : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('state'))
                        <p class="help-block">
                        {{ $errors->first('state') }}
						</p>
                    	 @endif 
					</div>
					 	<div class="form-group">
						<label>Type</label>
                         <select type="text" name="type" value=" " class="form-control" >     
                         <option value="rent">Rent</option>
                         <option value="sale">sale</option>
                         
                         </select>
						@if($errors->has('active'))
                        <p class="help-block">
                        {{ $errors->first('active') }}
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