@extends('backend.layouts.app')

@section('content')
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Plan </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Plan</li>
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
       User Plan
          </div>
        
         
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
            <thead>
                <tr>
                     
                    <th>S.No.</th> 
                    <th>Plan</th>
                    
                    <th>User Detail</th>
					 
                    <th>Plan Date Time</th>
					<th>End Date Time</th>
					 
                </tr>
                 </thead>
                <tbody>
                    @foreach($value as $key=>$val)
                <tr>
                   
                    <td>{{$key+1}} </td>
                   <td> <?php $da=DB::table('plan')->where('id',$val->plan_id)->first(); ?> 
						@if($da != null){{$da->name}}  @endif
					
					</td> 
					<td> <?php $da=DB::table('users')->where('id',$val->user_id)->first(); ?> 
						@if($da != null) User Name: {{$da->name}} <br> User Mobile: {{$da->mobile}} @endif
					
					</td> 
				 
                     <td> {{$val->date_time_start}} </td>
                     
					<td>
						<?php $da=DB::table('plan')->where('id',$val->plan_id)->first();  ?>
						@if($da->type=='monthly')
						<?php date_default_timezone_set('Asia/Kolkata');
								$date = date('d-m-y');
						$date = $val->date_time_start;
$date = strtotime($date);
$date = strtotime("+30 day", $date);
echo date('Y-m-d', $date);
						?>
					@endif
						
					@if($da->type=='half yearly')
						<?php date_default_timezone_set('Asia/Kolkata');
								$date = date('d-m-y');
						$date = $val->date_time_start;
$date = strtotime($date);
$date = strtotime("+180 day", $date);
echo date('Y-m-d', $date);
						?>
						
						@endif
						@if($da->type=='quarterly')
						<?php date_default_timezone_set('Asia/Kolkata');
								$date = date('d-m-y');
						$date = $val->date_time_start;
$date = strtotime($date);
$date = strtotime("+88 day", $date);
echo date('Y-m-d', $date);
						?>
						
						@endif
						@if($da->type=='yearly')
						<?php date_default_timezone_set('Asia/Kolkata');
								$date = date('d-m-y');
						$date = $val->date_time_start;
$date = strtotime($date);
$date = strtotime("+365 day", $date);
echo date('Y-m-d', $date);
						?>
						
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