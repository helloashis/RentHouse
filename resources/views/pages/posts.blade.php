@extends('layouts.app')
@section('title', 'Users All Posts')
@section('content')

<!-- ====== Breadcrumbs Area====== -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                    <span class="first-item">
                    <a href="{{ url('/') }}">Home</a></span>
                    <span class="separator">&gt;</span>
                    <span class="last-item">My Account</span>
                    <span class="separator">&gt;</span>
                    <span class="last-item">All Post</span>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.breadcrumbs-area -->
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="woodmart-my-account-sidebar">
                <h3 class="woocommerce-MyAccount-title entry-title">My account</h3>
                <nav class="woocommerce-MyAccount-navigation">
                    <ul>
                        <li class="">
                            <a href="{{ url('/my-account') }}">Dashboard</a>
                        </li>
                        <li class="is-active">
                            <a href="{{ route('posts') }}">All Posts</a>
                        </li>
                        <!--li class="">
                            <a href="{{ route('addresses') }}">Addresses</a>
                        </li-->
                        <li class="">
                            <a href="{{ route('ac-details') }}">Account Details</a>
                        </li>
                        <li class="">
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-9">
            <div class="woocommerce-MyAccount-content table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Sl No</th>
                            <th scope="col" class="text-center">Posted Date</th>
                            <th scope="col" class="text-center">Available Date</th>
                            <th scope="col" class="text-center">Property For</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($posts as $item)
                            <tr style="@if($item->status == 2) border:3px solid red;color:red @endif @if ($item->available > date('Y-m-d')) @else border:3px solid yellow; @endif"   >
                                <th scope="row">{{ $i }}</th>
                                <td>{{ date('d M Y', strtotime($item->created_at))  }}</td>
                                <td class="text-center">{{ date('d M Y', strtotime($item->available)) }}</td>
                                <td>{{ $item->get_type->title }}</td>
                                <th>
                                    @if ($item->status == 0)
                                       
                                        <span class="text-center text-success"> Pandding </span>
                                        
                                    @elseif($item->status == 1)
                                        
                                        @if ($item->available > date('Y-m-d'))
                                            <span class="text-center text-success"> Confirmed</span>
                                        @else
                                            <span class="text-center text-danger">Experied</span>
                                        @endif
                                    @else
                                        <span class="text-center text-danger">Rejected</span>
                                    @endif
                                </th>
                                <td>
                                    <a target="_blank" href="" class="btn btn-info btn-sm">Booked</a>
                                    <a target="_blank" href="{{ route('single-post', $item->slug) }}" class="btn btn-success btn-sm">View</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
