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

                                    <div class="input-group input-group-sm">
                                        <input type="text" id="input_search" name="table_search" class="form-control float-right"
                                               placeholder="Search">

                                        <div class="input-group-append">
                                            <button id="search_submit" type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap" id="items_datatable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>title</th>
                                     </tr>
                                    </thead>
                                    <tbody id="body_search">

                                    </tbody>
                                </table>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        <?php $editurl = url('/products/');?>
        $('#search_submit').click(function() {
            var title =  $('#input_search').val();
            $.ajax({
                url: "{{url('/autocomplete/')}}"+'/'+title,
                type: "get",
                success: function (data) {
                    $("#body_search").empty();
                    jQuery.each(data, function(index, itemData) {
                        var edit = "<a href='{{$editurl}}" + '/' + itemData.id  + "' class='btn btn-w" + "arning'><i class='fas fa-edit' data-toggle='tooltip' data-placement='top' title='Edit' ></i></a>&nbsp;";

                        $("#body_search").append('<tr><td>'+itemData.id+'</td><td>'+itemData.title+'</td>' +
                             "<td>"+edit+"<td></tr>");

                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error');
                }
            });
        });
    </script>

@endsection
