@extends('admin.layout')
@section('title', 'Division Manage')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Division Manage</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Locations</li>
            <li class="breadcrumb-item active">Division Manage</li>
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
        <!-- Default box -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <form action="{{ route('add.district') }}" method="post">
                        @csrf
                        <div class="card-header">
                            Add new Districts
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="division">Division</label>
                                <select class="form-control" name="division">
                                    <option selected>====Select One=====</option>
                                    @foreach ($divisions as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district">District</label>
                                <br>
                                <select name="dist[]" multiple data-role="tagsinput">
                                </select>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success btn-sm">Submit</button>
                            <button class="btn btn-danger btn-sm">Cancel</button>
                        </div>
                        
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Division wise Districts</h3>
                    </div>
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Type Title</th>
                              <th>Districts</th>
                              <th>Number of Register</th>
                              <th >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($divisions as $item)
                                    <tr>
                                        <td>

                                            {{ $item->title }}

                                        </td>
                                        <td>
                                            @foreach($dist as $dists)
                                                @if($dists->division_id==$item->id)
                                                    <span class="badge badge-info">
                                                        {{ $dists->title }}
                                                    </span>

                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ count($item->user) }}
                                        </td>
                                        <td class="text-center">
                                            @if($item->status == 1)
                                                <a href="{{ route('disabled.division', $item->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-toggle-on"></i>
                                                Enabled
                                                </a>
                                            @else
                                                <a href="{{ route('enabled.division', $item->id) }}" class="btn btn-outline-info btn-sm">
                                                <i class="fas fa-toggle-off"></i>
                                                Disabled
                                                </a>
                                            @endif
                                            

                                            <a href="" class="btn btn-success btn-sm">
                                                <i class="far fa-edit"></i>
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
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection

