@extends('layouts.app')

@section('title', 'Add to Listing')
@section('content')

<style>
    .imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color:#fff;
    background-size: cover;
  background-repeat:no-repeat;
    display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
}
.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
</style>

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
                    <span class="last-item">New Post</span>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.breadcrumbs-area -->
<br>
	<div class="register-area" style="background-color: rgb(249, 249, 249);">
		<div class="container">
			<div class="col-md-12">
				<div class="box-for overflow">
					<div class="col-md-12 col-xs-12 register-blocks">
						<h2 style="margin: 10px 0px;font-size: 25px;font-weight: 300;text-transform: uppercase;letter-spacing: 4px;border-bottom: 4px double #DDD;padding: 8px 0;color: #aa0114;">Create a new post : </h2>
                        @if (Session('msg'))
                            <div class="alert alert-success show">

                                <strong>{{Session('msg')}}</strong>
                            </div>
                        @endif
						<form action="{{ route('save-post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
							<div class="form-group row">
								<div class="col-md-12">
									<label for="name">Rent Title<span class="be">*</span>
                                        <small style="color: #f58f06;font-weight:400;font-size: 12px;font-family:arial;">Title Max: 50</small>
                                    </label>
									<input type="text" autofocus class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" autocomplete="off" required="">
								</div>

							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="name">Floore<span class="be">*</span></label>
									<input type="text" class="form-control @error('floore') is-invalid @enderror" value="{{ old('floore') }}" name="floore" autocomplete="off" required="">
								</div>
								<div class="col-md-2">
									<label for="name">Bedrooms<span class="be">*</span></label>
									<input type="number" min="1" class="form-control @error('room') is-invalid @enderror" value="{{ old('room') }}" name="room" autocomplete="off" required="">
								</div>
								<div class="col-md-2">
									<label for="name">Bathroom<span class="be">*</span></label>
									<input type="number" min="1" class="form-control @error('bath') is-invalid @enderror" value="{{ old('bath') }}" name="bath" autocomplete="off" required="">
								</div>
								<div class="col-md-2">
									<label for="name">Rent for<span class="be">*</span></label>

									<select name="type" id="" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}">
										<option selected><==Select One==></option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
									</select>
								</div>
								<div class="col-md-2">
									<label for="name">On available<span class="be">*</span></label>
									<input type="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" name="date" autocomplete="off" required="">
								</div>
								<div class="col-md-2">
									<label for="name">Price<span class="be">*</span></label>
									<input type="number" min="1" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" autocomplete="off" required="">
								</div>

							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<label for="name">Facilities <span class="be">*</span></label>
									<textarea name="description" class="form-control  @error('description') is-invalid @enderror"  id="" cols="30" rows="3">{{ old('description') }}</textarea>

								</div>
								<div class="col-md-6">
									<label for="name">Aditional Facilities <span class="be">*</span></label>
									<textarea name="feature" class="form-control @error('feature') is-invalid @enderror"  id="" cols="30" rows="3">{{ old('feature') }}</textarea>
								</div>

							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="col-md-12">
										<label for="district">Select District<span class="be">*</span></label>
										<select name="district" id="" readonly="on" class="form-control  @error('district') is-invalid @enderror" value="{{ old('district') }}"">
                                            @foreach ($district as $item)
                                                <option selected value="{{ $item->id }}">{{ $item->title }}</option>
                                            @endforeach



										</select>
									</div>
									<div class="col-md-12">
										<label for="city">Select City<span class="be">*</span> <small>On depend select district</small></label>
										<select name="city" id="city" class="form-control  @error('city') is-invalid @enderror" value="{{ old('city') }}"">

											<option selected>>====Select One====<</option>
                                            @foreach ($cities as $city)
											    <option value="{{ $city->id }}">{{ $city->title }}</option>

                                            @endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<label for="name">House Address <span class="be">*</span></label>
									<textarea name="address" class="form-control @error('address') is-invalid @enderror" id="" cols="30" rows="4">{{ old('address') }}</textarea>

								</div>
							</div>
                            <label for="name">Select Image <span class="be">*</span> <small style="color: #f58f06;font-weight:400;font-size: 12px;font-family:arial;">First image will be featured</small></label>
                            <div class="form-group row">

                                <div class="col-sm-4 imgUp">
                                    <div class="imagePreview"></div>
                                    <label class="btn btn-primary">
                                        Upload
                                        <input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" name="images_one">

                                    </label>
                                </div><!-- col-2 -->
                                <div class="col-sm-2 imgUp">
                                    <div class="imagePreview"></div>
                                    <label class="btn btn-primary">
                                        Upload
                                        <input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" name="images_two">
                                    </label>
                                </div><!-- col-2 -->
                                <div class="col-sm-2 imgUp">
                                    <div class="imagePreview"></div>
                                    <label class="btn btn-primary">
                                        Upload
                                        <input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" name="images_three">
                                    </label>
                                </div><!-- col-2 -->
                                <div class="col-sm-2 imgUp">
                                    <div class="imagePreview"></div>
                                    <label class="btn btn-primary">
                                        Upload
                                        <input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" name="images_four">
                                    </label>
                                </div><!-- col-2 -->
                                <div class="col-sm-2 imgUp">
                                    <div class="imagePreview"></div>
                                    <label class="btn btn-primary">
                                        Upload
                                        <input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" name="images_five">
                                    </label>
                                </div><!-- col-2 -->

                            </div>


							<div class="text-center">
								<button type="submit" class="btn btn-success upload" style="border-radius:5px" name="save" id="upload" >Submit</button>
								<button type="reset" style="border-radius:5px" class="btn btn-danger" name="reset">Cancel</button>
							</div>
						</form>
                        <br>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection

