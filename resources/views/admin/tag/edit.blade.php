@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">tag List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('tag.index')}}">tag list</a></li>
            <li class="breadcrumb-item active">Edit tag</li>
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
                    <h3 class="card-title">Edit - {{$tag->tag_name}} tag</h3>
                    <a href="{{route('tag.create')}}" class="btn btn-primary">Go back to tag list</a>
                  </div>
                </div>
              
                <div class="card-body p-0">
                  <div class="row">
                    <div class="col-6">
                      <form method="post" action="{{route('tag.update',[$tag->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                          @include('includes.errors')
                          <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" name="tag_name" value="{{$tag->tag_name}}" class="form-control" id="exampleInputEmail1" placeholder="tag Name">
                          </div>
                          <div class="form-group">
                            <label for="descrption">Description</label>
                           <textarea name="description" id="descrption" cols="30" rows="4" placeholder="description" class="form-control"> {{$tag->description}}</textarea>
                          </div>        
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg ml-3 mb-4">Update tag</button>
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