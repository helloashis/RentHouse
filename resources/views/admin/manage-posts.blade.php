@extends('admin.layout')

@section('title', 'Posts Manage Page')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Posts Manage Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Post Manage Page</li>
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
                <h3 class="card-title">All Post</h3>
            </div>
            <div class="card-body">
                @if (Session('msg'))
                    <div class="alert alert-success show">
                        <strong>{{Session('msg')}}</strong>
                    </div>
                @endif

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>Posted On</th>
                        <th>Available On</th>
                        <th>Rent Type</th>
                        <th>Rent/Price</th>
                        <th>Phone </th>
                        <th>Address </th>
                        <th width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                            <tr>

                                <td title="Owner Name: {{ $item->getuser->name }}">
                                    @if ($item->created_at == date("Y-m-d"))
                                    <span class="badge badge-info right">Today</span>
                                    @else
                                        {{ date('d M Y', strtotime($item->created_at))  }}
                                    @endif

                                </td>
                                <td title="Owner Name: {{ $item->getuser->name }}">
                                    {{ date('d M Y', strtotime($item->available))  }}
                                </td>
                                <td title="Owner Name: {{ $item->getuser->name }}">
                                    {{ $item->get_type->title }}
                                </td>
                                <td>
                                   <sup> <b> &#2547;</b></sup>{{ $item->price }} Tk
                                </td>
                                <td>
                                     <a href="callto:{{ $item->getuser->phone }}">{{ $item->getuser->phone }}</a>
                                </td>
                                <td>
                                    {{ $item->address }}, {{ $item->getcity->title }}, {{ $item->getdist->title }}
                                </td>
                                <td>
                                    

                                    @if ($item->status == 0)
                                        <a href="{{ route('confirmed', $item->id) }}" class="btn btn-warning btn-sm show_confirm" title='Click to confirmed'>Pandding</a>
                                        
                                    @elseif($item->status == 1)
                                        @if ($item->available > date('Y-m-d'))
                                            <a href="{{ route('rejected', $item->id) }}" class="btn btn-info btn-sm" onclick="return confirm('Are you sure? You wont be able to rejected this!')">Confirmed</a>
                                        @else
                                            <span class="text-center text-danger">Experied</span>
                                        @endif
                                    @else
                                        <a onclick="return confirm('Are you sure? You wont be able to enable this!')" href="{{ route('enabled', $item->id) }}" class="btn btn-danger btn-sm">Rejected</a>
                                    @endif

                                    <a target="_blank" href="{{ route('single-post', $item->slug) }}" class="btn btn-success btn-sm">View</a>
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
