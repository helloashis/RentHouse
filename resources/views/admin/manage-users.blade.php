@extends('admin.layout')
@section('title', 'Users Manage Page')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users Manage Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Users Manage Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Users</h3>
            </div>
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Register Date</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->name }}
                                    <span class="badge badge-info right"> {{ App\Post::where('user_id',$item->id)->count() }} </span>
                                </td>
                                <td> <a href="callto:{{ $item->phone }}" class="text-dark">{{ $item->phone }}</a>  <a href="mailto:{{ $item->email }}"><small style="color:green">( {{ $item->email }} )</small></a></td>
                                <td>{{ $item->getdist->title }}, {{ $item->getdiv->title }}</td>
                                <td>
                                    {{ date('d M Y', strtotime($item->created_at))  }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm">Disable</a>
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
