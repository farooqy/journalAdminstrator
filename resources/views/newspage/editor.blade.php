
@extends ("mainlayout.mainbody")

@section ("maincontent")
	<div class="hk-pg-wrapper">
		<script src="{{env('APP_URL')}}js/jquery-1.11.3.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="{{env('APP_URL')}}css/jodit.min.css">
		<script type="text/javascript" src="{{env('APP_URL')}}js/jodit.js"></script>
		<div class="container mt-xl-50 mt-sm-30 mt-15">
			<form action="" method="post" class="form row">
				<div class="col-md-2 col-lg-2"></div>
				<div class="col-md-8 col-lg-8">
					<div class="row">
						@csrf
					</div>
					<div class="row" style="color: green">
						@if(session('success'))
						{{session('success')}}
						@endif
					</div>
					<div class="row" style="color: red">
						@if($errors->any())
						<ul>
							@foreach($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
						</ul>
						@endif
					</div>
					<div class="row" >
						<input style="height: 35px; width:70%; border:thin solid gray; margin-bottom: 20px" placeholder="Enter Title" name="newsTitle" value="{{old('newsTitle')}}">
					</div>
					<div class="row">
						<textarea id="newsEditor" placeholder="Enter News" name="newsEditor" >
							{{old('newsEditor')}}
						</textarea>
					</div>
					<div class="row">
						<div class="col-md-4 col-lg-4"></div>
						<div class="col-md-4 col-lg-4">
							<div class="row" style="margin-top: 20px">
								<input type="submit" name="submitNews" class="btn btn-primary" value="Publish News">
							</div>
						</div>
						<div class="col-md-4 col-lg-4"></div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection