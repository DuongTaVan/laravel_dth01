@extends('layouts.app_master_admin')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm danh mục sản phẩm
            <small>Category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.category.index')}}">Category</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header width-border">


                <div class="box-body">
                    <div class="col-md-8">


                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name <span class="text-danger">(*)</span></label>
                                <input type="text" required name="name" class="form-control" placeholder="Name ...">
                            </div>
                            {!!showErrors($errors,'name')!!}
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" name="image" id="imgInp">

                                <img id="blah" src="#" alt="your image" />
                            </div>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary"> Save <i class="fa fa-save"></i></button>
                                <a href="{{route('admin.category.index')}}" class="btn btn-primary">Quay lại <i
                                        class="fa fa-undo"></i></a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection
