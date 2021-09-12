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
                            <li class="breadcrumb-item active">Pharmacies</li>
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

                                <div class="card-tools">
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <form action="{{ url('/pharmacies_products') }}" method="post"   >
                                    {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputTitle">Product</label>
                                            <select name="products_id" class="form-control">
                                                @foreach($data['products'] as $product)
                                                    <option value="{{$product->id}}">{{$product->title}}</option>
                                                @endforeach
                                            </select>
                                         </div>
                                        <div class="form-group">
                                            <label for="exampleInputTitle">Pharmacies</label>
                                            <select name="pharmacies_id" class="form-control">
                                                @foreach($data['pharmacies'] as $pharmacy)
                                                    <option value="{{$pharmacy->id}}">{{$pharmacy->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                             <div class="form-group">
                                                <label for="exampleInputTitle">price</label>
                                                <input type="number" class="form-control" name="price" id="exampleInputTitle" min="0" placeholder="Enter price" required/>
                                            </div>
                                        <div class="form-group">
                                            <label for="exampleInputTitle">quantity</label>
                                            <input type="number" class="form-control" name="quantity" id="exampleInputTitle" min="0" placeholder="Enter quantity" required/>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
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
