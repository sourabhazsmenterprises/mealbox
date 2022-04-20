@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Banner Image Create</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Banner Image Create</li>
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
		<form action="{{ url("admin/bannerimages/store") }}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}

			
					  <div class="form-group">
						<label>Category</label>
						<select name="category" value="{{ old('tittle', isset($bannerimage) ? $coursecategory->category : '') }}" placehoder="Enter Address" class="form-control" >  
							
							<?php $cat=DB::table('category')->where('deleted_at',null)->first(); 
							
							
							$cats=DB::table('category')->where('deleted_at',null)->get(); 
							?>
							@if($cat != null)
							
							@foreach($cats as $r)
							<option value="{{$r->id}}">{{$r->name}}</option>
							
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
						<label>Banner Title</label>
						<input type="text" name="tittle" value="{{ old('tittle', isset($bannerimage) ? $coursecategory->tittle : '') }}" placehoder="Enter Address" class="form-control" >      
						@if($errors->has('tittle'))
                        <p class="help-block">
                        {{ $errors->first('tittle') }}
						</p>
                    	 @endif 
					</div>
					 
					 <div class="form-group">
						<label>Banner Image</label>
						<input type="file" name="image" value="{{ old('image', isset($bannerimage) ? $coursecategory->image : '') }}" placehoder="Enter Address" class="form-control" required>      
						@if($errors->has('image'))
                        <p class="help-block">
                        {{ $errors->first('image') }}
						</p>
                    	 @endif 
					</div>
					 	<div class="form-group">
						<label>Tittle Active </label>
                         <select type="text" name="active" value=" " class="form-control" >     
                         <option value="1">Yes</option>
                         <option value="0">No</option>
                         
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