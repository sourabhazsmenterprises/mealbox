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
                        <li class="breadcrumb-item active">Services</li>
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
                   Name
                    </th>
                    <td>
                       {{$value->name}}
                    </td>
                </tr>
                 <tr>
                    <th>
                 Describtion
                    </th>
                    <td>
                      {{$value->describtion}}
                    </td>
                </tr>
                 <tr>
                    <th>
               Image
                    </th>
                    <td>
                       <img src="{{asset($value->image)}}" style="height:100px;width:100px;">
                    </td>
                </tr>
                
                 
                
            </tbody>
        </table>
    </div>
</div>
	</section>
</div>
@endsection