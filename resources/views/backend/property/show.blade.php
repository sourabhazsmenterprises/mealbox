@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Property Detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Property Detail</li>
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
        <table class="table table-bordered table-striped">
            <tbody>
                 
                <tr>
                    <th>
                   Tittle
                    </th>
                    <td>
                       {{$value->tittle}}
                    </td>
                
                    <th>
                   Image
                    </th>
                    <td>
						@if($value->image !=null)
                       <img src="{{asset($value->image)}}" style="height:100px;width:100px;">
						@else
						N.A.
						@endif
                    </td>
                </tr>
				<tr>
                    <th>
                  location
                    </th>
                    <td>
						@if($value->location !=null)
                    {{$value->location}} 
						@else
						N.A.
						@endif
                    </td>
                
                 <th>
                 Property Type
                    </th>
                    <td>
						@if($value->property_type !=null)
                    {{$value->property_type}} 
						@else
						N.A.
						@endif
                    </td>
				</tr>
					<tr>
                    <th>
               Property Ad  Type 
                    </th>
                    <td>
						@if($value->type !=null)
                    {{$value->type}} 
						@else
						N.A.
						@endif
                    </td>
                
                 <th>
                BHK Type
                    </th>
                    <td>
						@if($value->bhk_type!=null)
                    {{$value->bhk_type}} 
						@else
						N.A.
						@endif
                    </td>
				</tr>
					<tr>
                    <th>
               Property Size
                    </th>
                    <td>
						@if($value->property_size !=null)
                    {{$value->property_size}} 
						@else
						N.A.
						@endif
                    </td>
                
                 <th>
                 Floor
                    </th>
                    <td>
						@if($value->floor !=null)
                    {{$value->floor}} 
						@else
						N.A.
						@endif
                    </td>
				</tr>
									<tr>
                    <th>
               Total Floor
                    </th>
                    <td>
						@if($value->total_floor !=null)
                    {{$value->total_floor}} 
						@else
						N.A.
						@endif
                    </td>
                
                 <th>
                 Total Flat
                    </th>
                    <td>
						@if($value->total_flat !=null)
                    {{$value->total_flat}} 
						@else
						N.A.
						@endif
                    </td>
				</tr>
									<tr>
                    <th>
               Facing
                    </th>
                    <td>
						@if($value->facing !=null)
                    {{$value->facing}} 
						@else
						N.A.
						@endif
                    </td>
                
                 <th>
                 Balcony
                    </th>
                    <td>
						@if($value->balcony !=null)
                    {{$value->balcony}} 
						@else
						N.A.
						@endif
                    </td>
				</tr>
									<tr>
                    <th>
               Property Age
                    </th>
                    <td>
						@if($value->property_age!=null)
                    {{$value->property_age}} 
						@else
						N.A.
						@endif
                    </td>
                
                 <th>
               Parking 
                    </th>
                    <td>
						@if($value->parking!=null)
                    {{$value->parking}} 
						@else
						N.A.
						@endif
                    </td>
				</tr>
										<tr>
                    <th>
           Locality 
                    </th>
                    <td>
						@if($value->locality !=null)
                    {{$value->locality}} 
						@else
						N.A.
						@endif
                    </td>
                
                 <th>
              Landmark
                    </th>
                    <td>
						@if($value->landmark!=null)
                    {{$value->landmark}} 
						@else
						N.A.
						@endif
                    </td>
				</tr>
										<tr>
                    <th>
          Propert Available for
                    </th>
                    <td>
						@if($value->prop_av_for !=null)
                    {{$value->prop_av_for}} 
						@else
						N.A.
						@endif
                    </td>
                
                 <th>
              Expected Rent
                    </th>
                    <td>
						@if($value->expected_rent!=null)
                    {{$value->expected_rent}} 
						@else
						N.A.
						@endif
                    </td>
				</tr>
										<tr>
                    <th>
          Expected Deposite
                    </th>
                    <td>
						@if($value->expected_deposite !=null)
                    {{$value->expected_deposite}} 
						@else
						N.A.
						@endif
                    </td>
                
                 <th>
           Monthly Mentainace
                    </th>
                    <td>
						@if($value->monthly_mentainace!=null)
                    {{$value->monthly_mentainace}} 
						@else
						N.A.
						@endif
                    </td>
				</tr>
										<tr>
                    <th>
          Availble Form
                    </th>
                    <td>
						@if($value->availble_form!=null)
                    {{$value->availble_form}} 
						@else
						N.A.
						@endif
                    </td>
                
                 <th>
             Preferred Tenants
                    </th>
                    <td>
						@if($value->preferred_tenants!=null)
                    {{$value->preferred_tenants}} 
						@else
						N.A.
						@endif
                    </td>
				</tr>
                 
                
            </tbody>
        </table>
    </div>
</div>
	</section>
</div>
@endsection