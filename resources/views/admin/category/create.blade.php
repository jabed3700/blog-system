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
            <li class="breadcrumb-item active">Create Category</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Create Category</h3>
                    <a href="{{route('category.create')}}" class="btn btn-primary">Go back to category list</a>
                  </div>
                </div>
              
                <div class="card-body p-0">
                    <form method="post" action="{{route('category.store')}}">
                        @csrf
                        <div class="card-body">
                          @include('includes.errors')
                          <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Category Name">
                          </div>
                          <div class="form-group">
                            <label for="descrption">Description</label>
                           <textarea name="description" id="descrption" cols="30" rows="4" placeholder="description" class="form-control"></textarea>
                          </div>        
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                </div>
              </div>
        </div>
    </div>
</div>
</section>
@endsection