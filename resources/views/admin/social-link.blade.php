@extends('admin.layout')

@section('title', 'Social Link')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Social Links</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Social Links</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
              <!-- small box -->
              	@if (Session('msg'))
	                <div class="alert alert-success show">
	                    <strong>{{Session('msg')}}</strong>
	                </div>
	            @endif
              	<form action="{{ route('social.update') }}" method="post">
              		@csrf
              		<input type="hidden" name="id" value="{{ $links->id }}">
              		<div class="card">
	              		<div class="card-header">
	              			All Social Links
	              		</div>
	              		<div class="card-body">
	              			
	              			<div class="form-group">
	              				<label for="facebook">
	              					<i class="fab fa-facebook"></i>
	              					Facebook
	              					<small class="text-muted">Example: https://www.facebook.com/username</small>
	              				</label>
	              				<input type="ulr" value="{{ $links->fb_ulr }}" class="form-control" name="fb" id="facebook" placeholder="Example: https://www.facebook.com/username">
	              			</div>
	              			<div class="form-group">
	              				<label for="instagram">
	              					<i class="fab fa-instagram"></i>
	              					Instagram
	              					<small class="text-muted">Example: https://www.instagram.com/username</small>
	              				</label>
	              				<input type="ulr" value="{{ $links->inst_url }}" class="form-control" name="inst" id="instagram" placeholder="Example: https://www.instagram.com/username">
	              			</div>
	              			<div class="form-group">
	              				<label for="twitter">
	              					<i class="fab fa-twitter"></i>
	              					Twitter
									<small class="text-muted">Example: https://www.twitter.com/username</small>
	              				</label>
	              				<input type="ulr" value="{{ $links->twt_url }}" class="form-control" name="twt" id="twitter" placeholder="Example: https://www.twitter.com/username">
	              			</div>
	              			<div class="form-group">
	              				<label for="google">
	              					<i class="fab fa-google-plus"></i>
	              					Google-plus
	              					<small class="text-muted">Example: https://www.google-plus.com/username</small>
	              				</label>
	              				<input type="ulr" value="{{ $links->gle_url }}" class="form-control" name="gle" id="google" placeholder="Example: https://www.google-plus.com/username">
	              			</div>
	              		</div>
	              		<div class="card-footer">
	              			<button type="submit" class="btn btn-success btn-sm">Update</button>
	              		</div>
	              	</div>
              	</form>
            </div>
          </div>
      </div>
  </section>

@endsection
