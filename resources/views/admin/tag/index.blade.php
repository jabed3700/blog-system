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
            <li class="breadcrumb-item active">tag list</li>
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
                    <h3 class="card-title">tag list</h3>
                    <a href="{{route('tag.create')}}" class="btn btn-primary">Create tag</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Post Count</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($tags->count())
                      @php($i=1)
                      @foreach ($tags as $tag)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$tag->tag_name}}</td>
                        <td>{{$tag->slug}}</td>
                        <td>{{$tag->id}}</td>
                        <td class="d-flex">
                          <a href="{{route('tag.edit',[$tag->id])}}" class="mr-2">
                            <span class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></span>
                          </a>

                          <form action="{{route('tag.destroy',[$tag->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                          </form>
                        </td>
                      </tr> 
                      @endforeach
                      
                      @else
                      <tr>
                        <td colspan="5"><h5>No tags found</h5></td>
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