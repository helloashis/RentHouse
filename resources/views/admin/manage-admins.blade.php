@extends('admin.layout')
@section('title', 'Admin Manage Page')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Admins Manage Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Admins Manage Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

    <!-- Main content -->
    <section class="content">

        @if (Auth::user()->is_super == 1)
            @if (Session('msg'))
                <div class="alert alert-success show">
                    <strong>{{Session('msg')}}</strong>
                </div>
            @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add New Admin</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('add.admin') }}" class="form-horizontal" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">Admin Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" autofocus autocomplete="false" placeholder="Enter the name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="number">Phone Number</label>
                                <input type="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" id="number" autocomplete="false" placeholder="Enter the number">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="false" id="exampleInputEmail1" placeholder="Enter email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rolls">Select Roles</label>
                                <select name="rolls" class="form-control @error('rolls') is-invalid @enderror" id="rolls">
                                    <option selected>===[ Select One ]===</option>
                                    <option value="0">Genaral Admin</option>
                                    <option value="1">Super Admin</option>
                                </select>
                                @error('rolls')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" name="save" class="btn btn-info">Save info</button>
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>

        @endif

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Admins</h3>

            </div>
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>User Roles</th>
                      <th>Register Date</th>
                      @if (Auth::user()->is_super == 1)<th>Action</th>@endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $item)
                            <tr @if (Auth::user()->id == $item->id) style="background: #007bff61 !important" @endif>
                                <td>

                                    {{ $item->name }}

                                </td>
                                <td>
                                    <a href="callto:{{ $item->phone }}" class="text-dark">{{ $item->phone }}</a>
                                </td>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td>
                                    @if ($item->is_super == 1)
                                        <span class="badge badge-success right">Super Admin</span>
                                    @else
                                        <span class="badge badge-info right">Genaral Admin</span>
                                    @endif
                                </td>
                                <td>
                                    {{ date('d M Y', strtotime($item->created_at))  }}
                                </td>
                                @if (Auth::user()->is_super == 1)
                                <td>
                                    @if (Auth::user()->is_super == 1)
                                        @if ($item->is_super == 0)
                                            <a href="{{ route('make-super', $item->id) }}" class="btn btn-success btn-sm">Make Super Admin</a>
                                        @endif
                                    @endif


                                    @if (Auth::user()->id == $item->id)
                                        <span class="badge badge-warning right">It's Me</span>
                                    @else
                                        <a href="{{ route('delete', $item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    @endif

                                </td>
                                @endif
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
