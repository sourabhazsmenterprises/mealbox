@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Banner Image Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Banner Image Edit</li>
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

        <form action="{{ url("admin/bannerimages/update",[$bannerimage->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

			  <div class="form-group">
						<label>Category</label>
						<select name="category" value="{{ old('category', isset($bannerimage) ? $bannerimage->category : '') }}" placehoder="Enter Address" class="form-control" >  
							
							<?php $cat=DB::table('category')->where('deleted_at',null)->first(); 
							
							
							$cats=DB::table('category')->where('deleted_at',null)->get(); 
							?>
							@if($cat != null)
							
							@foreach($cats as $r)
							<option value="{{$r->id}}" @if($r->id==$bannerimage->category) selected @endif>{{$r->name}}</option>
							
							@endforeach
							
							
							
							@endif
							
						  </select>
						@if($errors->has('category'))
                        <p class="help-block">
                        {{ $errors->first('category') }}
						</p>
                    	 @endif 
					</div>
					 
					 <div class="form-group">
						<label>Banner Tittle</label>
                         <input type="text" name="tittle" value="{{$bannerimage->tittle}}" class="form-control" >      
						@if($errors->has('tittle'))
                        <p class="help-block">
                        {{ $errors->first('tittle') }}
						</p>
                    	 @endif 
					</div>
				 
					 <div class="form-group">
						<label>Banner Image</label>
                          <br>
                        <img src="{{asset($bannerimage->image)}}" style="height:100px;width:100px;">
                        <br>
                        <br>
                        <input type="hidden" name="image" value="{{ old('image', isset($bannerimage) ? $bannerimage->image : '') }}">
						<input type="file" name="image" value="" class="form-control" >      
						@if($errors->has('image'))
                        <p class="help-block">
                        {{ $errors->first('image') }}
						</p>
                    	 @endif 
					</div>
					  <!--{{$bannerimage->content_active}}-->
					 	<div class="form-group">
						<label>Tittle Active </label>
                         <select type="text" name="active" value=" {{$bannerimage->content_active}}" class="form-control" >     
                         <option value="1" @if($bannerimage->content_active=='1') selected @endif>Yes</option>
                         <option value="0" @if($bannerimage->content_active=='0') selected @endif>No</option>
                         
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