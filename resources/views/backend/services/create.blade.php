@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Services</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Services Create</li>
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
		<form action="{{ url("admin/services/store") }}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}

			
					 
					 <div class="form-group">
						<label>Name</label>
						<input type="text" name="name" value="{{ old('name', isset($services) ? $services->name : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('name'))
                        <p class="help-block">
                        {{ $errors->first('name') }}
						</p>
                    	 @endif 
					</div>
					
					 <div class="form-group">
						<label>Banner Image</label>
						<input type="file" name="image" value="{{ old('image', isset($services) ? $services->image : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('image'))
                        <p class="help-block">
                        {{ $errors->first('image') }}
						</p>
                    	 @endif 
					</div>
			 <div class="form-group">
						<label>Description</label>
					<input type="text" name="describtion" value="{{ old('describtion', isset($services) ? $services->describtion : '') }}" placehoder="" class="form-control" >      
						@if($errors->has('describtion'))
                        <p class="help-block">
                        {{ $errors->first('describtion') }}
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