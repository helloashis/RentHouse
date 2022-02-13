@extends('admin.layout')
@section('title', 'Manage All Location')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Location Manage</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Locations</li>
            <li class="breadcrumb-item active">Location Manage</li>
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
            
            <!-- Modal -->
            <div class="modal fade" id="zilla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('add.zilla') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">Add new Upzilla</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="division">Division</label>
                                        <select class="form-control" name="division" id="division">
                                            <option selected>====Select One=====</option>
                                            @foreach ($divisions as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="division">District</label>
                                        <select name="district" id="district" class="form-control @error('district') is-invalid @enderror">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="district">District</label>
                                    <br>
                                    <select class="form-control" name="zilla[]" multiple data-role="tagsinput">
                                    </select>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success btn-sm">Submit</button>
                                <button class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Location Tree View</h3>
                    </div>
                    <div class="card-body">

                        <div id="test" class="tree">
                           <ul>
                                <li class="parent_li">
                                     <span title="Division">Division</span>
                                    <ul>
                                        @foreach($divisions as $item)
                                            <li class="parent_li">
                                                <span title="{{ $item->title }}" style="background: #9a9ae142;">
                                                    {{ $item->title }}
                                                </span>
                                                
                                                <ul>

                                                    <li>
                                                        <!-- Button trigger modal -->
                                                        <span type="button" class="badge badge-info showQuickInfo" data-toggle="modal" data-target="#district" data-entry="{{ $item->id }}">
                                                        <i class="fas fa-plus-circle"></i> Add 
                                                        </span>
                                                    </li>
                                                    @foreach($dist as $dists)
                                                        @if($dists->division_id==$item->id)
                                                    <li class="parent_li">
                                                       <span title="{{ $dists->title }}">{{ $dists->title }}</span>
                                                        <ul>
                                                            <li>
                                                                <!-- Button trigger modal -->
                                                                <span type="button" class="badge badge-info" data-toggle="modal" data-target="#zilla">
                                                                <i class="fas fa-plus-circle"></i> Add 
                                                                </span>
                                                            </li>
                                                            @foreach(App\Upzilla::get() as $zilla)
                                                                @if($zilla->district_id==$dists->id)
                                                                <li>
                                                                    <span title="{{ $zilla->title }}">{{ $zilla->title }}</span>

                                                                </li>
                                                                @endif
                                                            @endforeach
                                                           
                                                        </ul>
                                                    </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                           </ul>
                        </div>

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
