
@extends ("mainlayout.mainbody")

@section ("maincontent")
	<div class="hk-pg-wrapper">

		<div class="container mt-xl-50 mt-sm-30 mt-15">
			<div class="row">

				<div class="col-md-2 col-lg-2"></div>
				<div class="col-md-8 col-lg-8 divBlock">
					<form class="row" method="post" action="/members/newmember">
						@csrf
						<div class="col-md-12 col-lg-12">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="row">
										<h3 style="font-family: Times New Roman; text-decoration: underline;">
											Add new editor
										</h3>
									</div>
									<div class="row">
										@if($errors->any())
										<ul>
										@foreach($errors->all() as $error)
											<li style="color: red">{{$error}}</li>
										@endforeach
										</ul>
										@elseif(session('error'))
											<li style="color: red">{{session('error')}}</li>
										@elseif(session('success'))
											<li style="color: green">{{session('success')}}</li>
										@endif
									</div>
									<div class="row">
										<label for="edEmail" class="label">Editor Email</label>
										<input type="text" name="edEmail" placeholder="Enter editor email" value="{{old('edEmail')}}">
									</div>
									<div class="row">
										<label for="edTitle" class="label">Editor Title</label>
										<input type="text" name="edTitle" placeholder="Enter editor title" value="{{old('edTitle')}}">
									</div>
									<div class="row">
										<label for="edFullName" class="label">Editor Full Name</label>
										<input type="text" name="edFullName" placeholder="Enter editor full name" value="{{old('edFullName')}}">
									</div>
									<div class="row">
										<label for="edInstitute" class="label">Editor Institute</label>
										<input type="text" name="edInstitute" placeholder="Enter editor institute" value="{{old('edInstitute')}}">
									</div>
									<div class="row">
										<label for="edDepartment" class="label">Editor Department</label>
										<input type="text" name="edDepartment" placeholder="Enter editor department" value="{{old('edDepartment')}}">
									</div>
									<div class="row">
										<label for="edLocation" class="label">Editor Location</label>
										<input type="text" name="edLocation" placeholder="Enter editor location" value="{{old('edLocation')}}">
									</div>
								</div>
								<div class="col-md-6 col-lg-6">

								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="row">
										<label for="edRole" class="label">Editor Role</label>
										<select class="select editorSelectRole" name="edRole">
											<option value="dft">Select Role</option>
											@foreach($roles  as $role)
											<option value="{{$role->role_id}}">{{$role->role_name}}</option>
											@endforeach
										</select>
										<div class="hint roleIndexHint">
											<span style="font-size: 13px" class="hintValue">Select role to see highest index</span>
										</div>
									</div>
									<div class="row">
										<label for="edRoleIndex" class="label">Editor Role Index</label>
										<input type="number" name="edRoleIndex" placeholder="Enter editor location" value="{{old('edRoleIndex')}}">
									</div>
									<div class="row" style="margin-bottom: 30px">
										<input type="submit" name="submit" value="Add Editor"  class="btn btn-success">
									</div>
								</div>
							</div>
						</div>
								
					</form>
					<form action="/members/role/index" method="post" class="roleIndexForm" id="roleIndexForm">
						@csrf
						<input type="hidden" name="roleIndexValue" value="" class="roleIndexValue">
					</form>
				</div>
				<div class="col-md-2 col-lg-2"></div>
			</div>
		</div>
	</div>
	<style type="text/css">
		.label {
			display: block;
			width: 100%;
		}
		input {
			width: 100%;
			border:thin solid gray;
			height: 35px;
			margin-bottom: 20px;
			border-radius: 4px;
		}
		.divBlock {
			border:thin solid gray;
			background-color: white;
			padding-left: 20px;
		}
		.select {
			width: 100%;
			border:thin solid gray;
			border-radius: 4px;
			height: 35px;
		}
	</style>
@endsection