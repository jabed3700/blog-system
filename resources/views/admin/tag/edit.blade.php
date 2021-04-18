@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Category List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.index')}}">category list</a></li>
            <li class="breadcrumb-item active">Edit Category</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Edit - {{$category->name}} category</h3>
                    <a href="{{route('category.create')}}" class="btn btn-primary">Go back to category list</a>
                  </div>
                </div>
              
                <div class="card-body p-0">
                  <div class="row">
                    <div class="col-6">
                      <form method="post" action="{{route('category.update',[$category->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                          @include('includes.errors')
                          <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control" id="exampleInputEmail1" placeholder="Category Name">
                          </div>
                          <div class="form-group">
                            <label for="descrption">Description</label>
                           <textarea name="description" id="descrption" cols="30" rows="4" placeholder="description" class="form-control"> {{$category->description}}</textarea>
                          </div>        
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg ml-3 mb-4">Update Category</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
</section>
@endsection