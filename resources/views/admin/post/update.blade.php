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
            <li><a href="{{route('admin.post.index')}}">Category</a></li>
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
                        <form role="form" action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Root</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                @if($category->id == $post->category_id) selected="selected" @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name <span class="text-danger">(*)</span></label>
                                <input type="text" required name="name" class="form-control" placeholder="Name ..."
                                       value="{{$post->name}}">

                            </div>
                            {!!showErrors($errors,'name')!!}
                            <div class="form-group">
                                <label>Summary <span class="text-danger">(*)</span></label>
                                <textarea id="summary-summary" name="description" class="form-control" placeholder="summary ...">{{$post->summary}} </textarea>
                            </div>
                            {!!showErrors($errors,'summary')!!}
                            <div class="form-group">
                                <label>Description <span class="text-danger">(*)</span></label>
                                <textarea id="summary-description" name="description" class="form-control" placeholder="description ...">{{$post->description}} </textarea>
                            </div>
                            {!!showErrors($errors,'description')!!}
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
