@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Create Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">post list</a></li>
            <li class="breadcrumb-item active">Create tag</li>
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
                    <h3 class="card-title">Create post</h3>
                    <a href="{{route('post.index')}}" class="btn btn-primary">Go back to post list</a>
                  </div>
                </div>
              
                <div class="card-body p-0">
                  <div class="row">
                    <div class="col-6">
                      <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          @include('includes.errors')
                          <div class="form-group">
                            <label for="name"> title</label>
                            <input type="text" name="title" class="form-control" value='{{ old('title') }}' id="exampleInputEmail1" placeholder="title">
                          </div>
                          <div class="form-group">
                            <label for="name"> title</label>
                            <select name="category_id" class="form-control"  id="">
                                <option style="display:none">Select Category</option>
                                @foreach ($categories as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group d-flex">
                          @foreach ($tags as $tag)
                            <div class="custom-control custom-checkbox mr-3">
                              <input class="custom-control-input" type="checkbox" id="tag{{$tag->id}}"  value="{{$tag->id}}" name="tags[]">
                              <label for="tag{{$tag->id}}" value="" class="custom-control-label">{{$tag->tag_name}}</label>
                            </div>
                            @endforeach
                          </div>
                          <div class="form-group">
                            <label for="descrption">Description</label>
                           <textarea name="description" id="descrption" cols="30" rows="4" placeholder="description" class="form-control">{{ old('description') }}</textarea>
                          </div>
                          <div class="form-group">
                              <label for="">Image</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="image">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                          </div>        
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg ml-3 mb-4">Submit</button>
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