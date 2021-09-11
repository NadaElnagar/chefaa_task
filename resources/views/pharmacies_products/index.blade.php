@extends('layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Products</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <!-- /.card-header -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                <a href="{{url('pharmacies_products/create')}}">Add New Pharmacies</a>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right"
                                               placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Pharmacies</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($pharmacies)
                                        @foreach($pharmacies as $pharmacy)
                                            <tr class="row_{{$pharmacy->id}}">
                                                <td>{{$pharmacy->id}}</td>
                                                <td>{{$pharmacy->pharmacies->name}}</td>
                                                <td>{{$pharmacy->products->title}}</td>
                                                <td>
                                                    <a href="{{url('pharmacies_products/'.$pharmacy->id.'/edit/')}}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <button  class="product_delete" data-id="{{$pharmacy->id}}" ><i class="fas fa-trash"></i></button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <div class="links">
                                    {!!  $pharmacies->links()!!}
                                </div>

                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>


@endsection
@section('scripts')
    <script>
        $( document ).ready( function() {

            $('.product_delete').click(divFunction);

            function divFunction() {
                var dataId = $(this).attr("data-id");
                var row="row_"+dataId;
                $.ajax({
                    url: "{{url('/pharmacies_products/')}}"+'/'+dataId,
                    type: "Delete",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        //if success reload ajax table
                        $('.'+row).hide();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        });
    </script>
@endsection
