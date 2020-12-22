@extends('layouts.app_master_admin')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lí danh mục
            <small>Category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Category</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    <!-- Default box -->
        <div class="box">
            <div class="box-header width-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{route('admin.category.create')}}" class="btn btn-primary">Thêm mới
                            <i class="fa fa-plus"></i></a></h3>
                </div>

                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td><img src="{{$category->image}}" alt=""></td>

                                    <td>
                                        <a href="{{route('admin.category.edit',$category->id)}}"
                                           class="btn btn-xs btn-primary"><i class="fa fa-pencil">Edit</i></a>
                                        <a href="{{route('admin.category.delete',$category->id)}}"
                                           class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection
