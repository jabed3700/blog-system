@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Show Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post list</a></li>
            <li class="breadcrumb-item active">Show Post</li>
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
                  <h3 class="card-title">Show post</h3>
                  <a href="{{route('post.index')}}" class="btn btn-primary">Go back to post list</a>
                </div>
              </div>
               <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="max-width: 200px;">Image</th>
                            <td><div class="" style="width:200px;height:200px;overflow:hidden">
                                <img src="{{asset($post->image)}}" alt="" class="img-fluid">
                          </div></td>
                        </tr>
                        <tr>
                            <th style="max-width: 200px;">Author</th>
                            <td>{{$post->user->name}}</td>
                        </tr>
                        <tr>
                            <th style="max-width: 200px;">Title</th>
                            <td>{{$post->title}}</td>
                        </tr>
                        <tr>
                            <th style="max-width: 200px;">Category</th>
                            <td>{{$post->category->name}}</td>
                        </tr>
                        <tr>
                            <th style="max-width: 200px;">Tags</th>
                            <td>
                                @foreach ($post->tags as $t)
                                <span class="badge badge-primary">{{$t->tag_name}}</span>
                                @endforeach
                        </td>
                        </tr>
                        <tr>
                            <th style="max-width: 200px;">Description</th>
                            <td>{!!$post->description!!}</td>
                        </tr>
                    </tbody>
                  </table>
               </div>
           </div>
        </div>
    </div>
</div><!-- /.container-fluid -->
</section>
@endsection