@extends('admin.layout')
@section('title', 'Rent Type Manage')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Rent Type Manage</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Rent Type Manage</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

    <!-- Main content -->
    <section class="content">

            @if (Session('msg'))
                <div class="alert alert-success show">
                    <strong>{{Session('msg')}}</strong>
                </div>
            @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add New Type</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('add.rent-type') }}" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Type Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" autofocus autocomplete="false" placeholder="Enter the title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-2 imgUp">
                            <div class="form-group">
                                <div class="imagePreview"></div>
                                <label class="btn btn-primary">
                                    Icon
                                    <input name="icon" type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                </label>
                                @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><!-- col-2 -->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" name="save" class="btn btn-info">Submit</button>
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>


        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Rent Type</h3>

            </div>
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Type Title</th>
                      <th width="10%">Icon</th>
                      <th>Total post</th>
                      <th width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $item)
                            <tr>
                                <td>

                                    {{ $item->title }}

                                </td>
                                <td class="text-center">
                                    <img src="../{{ $item->icon }}" />
                                </td>
                                <td>
                                    20
                                </td>
                                <td>
                                    <a href="{{ route('delete.type', $item->id) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </a>

                                    <a href="" class="btn btn-success btn-sm">
                                        <i class="far fa-pancile"></i>
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
