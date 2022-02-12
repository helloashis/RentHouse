@extends('admin.layout')

@section('title', 'Terms Section')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage terms</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage terms</li>
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
              	<form action="{{ route('terms.update') }}" method="post" enctype="multipart/form-data">
              		@csrf
              		<input type="hidden" name="id" value="{{ $terms->id }}">
              		<div class="card">
	              		<div class="card-header">
	              			Terms & Condition Content
	              		</div>
	              		<div class="card-body">
	              			<div class="row">
	              				<div class="col-md-8">
	              					<div class="form-group">
		                        <label for="summernote">Description</label>
		                        
		                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="summernote">{{ $terms->content }}</textarea>
		                      </div>
	              				</div>
	              				<div class="col-md-4">
	              					<label for="thumbnail">Thumbnail</label>
												  <div id="msg"></div>
												  <input type="file" name="thumbnail" class="file" >
											    <div class="input-group">
											      <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
											      <div class="input-group-append">
											        <button type="button" style="margin-top: 0px;height: 38px;border-radius: 0px 5px 5px 0px;" class="browse btn btn-primary">Browse...</button>
											      </div>
											    </div>
											    <img src="{{ asset('') }}{{ $terms->thumbnail }}" style="width:100%;height: 255px;" id="preview" class="img-thumbnail">
												</div>

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
