@extends('backend.layouts.app')

@section('content')
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order Item </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order Item</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
    
 
<div class="card">
    <div class="card-header">
        <div class="raw">
            <div class="col-lg-12">
        Order Item
          </div>
        
         
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
            <thead>
                <tr>
                     
                    <th>S.No.</th> 
                    <th>Food Image</th>
                    <th>Food Detail</th>
                    <th>User Detail</th>
					<th>Address</th>
                    <th>Order Date Time</th>
					<th>Status</th>
                    <th>Action</th>
                </tr>
                 </thead>
                <tbody>
                    @foreach($order_item as $key=>$value)
                <tr>
                   
                    <td>{{$key+1}} </td>
                    <td><div style="display:flex; justify-content:center; align-items:center; width:100%; height:100px;"><img src="{{asset($value->food_image)}}" alt="{{asset($value->food_image)}}" style=" box-shadow: none;-webkit:box-shadow:none; max-height:100%; max-width:100%;margin:10px;"></div> <br></td><td>Food Name: {{$value->food_name}} <br>
					
					Food Ingredients: {{$value->food_ingredients}} 
					{{$value->veg_nveg}}
					
					</td> 
					<td> <?php $da=DB::table('users')->where('id',$value->user_id)->first(); ?> 
						@if($da != null) User Name: {{$da->name}} <br> User Mobile: {{$da->mobile}} @endif
					
					</td> 
					 <td> {{$value->delivary_address}} </td> 
                     <td> {{$value->order_date_time}} </td>
                    
                     <td>
                               
                              {{$value->status}} 
                            </td>
					  <td>
						  @if($value->delivery==0)
						  <form action="{{url('order-process/'.$value->order_id.'/'.'1')}}" id="dispactched" method="get">
							  
						  </form>
                               <button onclick="dispactched()" class="btn btn-warning">Process</button>
                            @endif
						  
						  @if($value->delivery==1)
						  
						  <form action="{{url('order-process/'.$value->order_id.'/'.'2')}}" id="delivered" method="get">
							  
						  </form>
                               <button  onclick="delivered()" class="btn btn-info">Dispatched</button>
                            @endif
						   @if($value->delivery==2)
                               <a href="#" class="btn btn-success">Delivered</a>
                            @endif
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

<script>
	function dispactched(){
		 let text;
  if (confirm("Are you sure you want to dispactched!") == true) {
    document.getElementById("dispactched").submit();
  } else {
     
  }
  
	}
	
	
		function delivered(){
		 let text;
  if (confirm("Are you sure you want to delivered!") == true) {
    document.getElementById("delivered").submit();
  } else {
     
  }
  
	}
	
</script>
	
@endsection