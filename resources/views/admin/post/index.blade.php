@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">post List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item active">post list</li>
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
                    <h3 class="card-title">Post list</h3>
                    <a href="{{route('post.create')}}" class="btn btn-primary">Create post</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>tags</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     @if($posts->count())
                     @php($i=1)
                     @foreach ($posts as $post)
                         <tr>
                           <td>{{$i++}}</td>
                           <td><div class="" style="width:70px;height:70px;overflow:hidden">
                                <img src="{{asset($post->image)}}" alt="" class="img-fluid">
                          </div></td>
                          <td>{{$post->title}}</td>
                          <td>@foreach ($post->tags as $tag)
                            <span class="badge badge-primary">{{$tag->tag_name}}</span>
                          @endforeach</td>
                          <td>{{$post->category->name}}</td>
                          <td>{{$post->user->name}}</td>
                          <td class="d-flex">
                            <a href="{{route('post.show',[$post->id])}}" class="mr-2"><span class="btn btn-info btn-sm">
                              <i class="fas fa-eye"></i></span></a>
                            <a href="{{route('post.edit',[$post->id])}}" class="mr-2">
                              <span class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></span>
                            </a>

                            <form action="{{route('post.destroy',[$post->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash
                                  "></i></button>
                            </form>
                          </td>
                         </tr>
                     @endforeach
                     @else
                      <tr>
                        <td colspan="7"><h5 class="text-center">No Post found.</h5></td>
                      </tr>
                     @endif
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
    </div>
</div><!-- /.container-fluid -->
</section>
@endsection