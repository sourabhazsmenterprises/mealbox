@extends('backend.layouts.app')

@section('content')
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Food Item </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Food Item</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12" style="text-align:right;">
            <a class="btn btn-success" href="{{ url('admin/food-item/create') }}">
               Food Item
            </a>
        </div>
    </div>
 
<div class="card">
    <div class="card-header">
        <div class="raw">
            <div class="col-lg-12">
         Food Item
          </div>
        
         
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
            <thead>
                <tr>
                     
                    <th>S.No.</th> 
                    
                    <th>Name</th>
                    <th>Category</th>
					<th>Type</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                 </thead>
                <tbody>
                    @foreach($fooditem as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                    <td> {{$value->name}} </td> 
					 <td>
						<?php $cate=DB::table('category')->where('id',$value->category)->first(); ?> 
						@if($cate!=null) {{$cate->name}}  @endif</td> 
					 <td> {{$value->type}} </td> 
                     <td> <div style="display:flex; justify-content:center; align-items:center; width:100%; height:100px;"><img src="{{asset($value->image)}}" alt="{{asset($value->image)}}" style=" box-shadow: none;-webkit:box-shadow:none; max-height:100%; max-width:100%;margin:10px;"></div></td>
                    
                     <td>
						 @if($value->status==0)
                               <a class="btn btn-xs btn-success" href="{{ url('admin/foodactive/'.$value->id.'/'.'1') }}">
										 Active 
                                    </a>
						 @endif
						 
						 
						  @if($value->status==1)
                               <a class="btn btn-xs btn-danger" href="{{ url('admin/foodactive/'.$value->id.'/'.'0') }}">
										 Unactive 
                                    </a>
						 @endif
						
						 
                                   
                              
                                    <a class="btn btn-xs btn-info" href="{{ url('admin/food-item/edit', $value->id) }}">
										<i class="fa fa-edit"></i>
                                    </a>
                             
                                    <form action="{{ url('admin/food-item/destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}"><i class="fas fa-trash"></i></button>
                                    </form>
                              
                            </td>
                   
                </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
</div>
  </div>
	</section>
</div>
	
  @endsection
  @section('scripts')
@parent
  <script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ url('admin/food-item/massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('bannerimage_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection