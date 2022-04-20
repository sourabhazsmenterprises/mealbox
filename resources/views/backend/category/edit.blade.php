@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category Edit</li>
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

        <form action="{{ url("admin/category/update",[$category->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

			 
					 
					 <?php   //dd($category); ?>
					 <div class="form-group">
						<label>Name</label>
						<input type="text" name="name" value="{{$category->name}}"  class="form-control" >      
						@if($errors->has('name'))
                        <p class="help-block">
                        {{ $errors->first('name') }}
						</p>
                    	 @endif 
					</div>
				 
					 <div class="form-group">
						<label>Image</label>
                          <br>
                        <img src="{{asset($category->image)}}" style="height:100px;width:100px;">
                        <br>
                        <br>
                        <input type="hidden" name="image" value="{{ old('image', isset($category) ? $category->image : '') }}">
						<input type="file" name="image" value="" class="form-control" >      
						@if($errors->has('image'))
                        <p class="help-block">
                        {{ $errors->first('image') }}
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