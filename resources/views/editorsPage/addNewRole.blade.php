
@extends ("mainlayout.mainbody")

@section ("maincontent")
	<div class="hk-pg-wrapper">

		<div class="container mt-xl-50 mt-sm-30 mt-15">
			<div class="row">
				<div class="col-md-2 col-lg-2"></div>
				<div class="col-md-8 col-lg-8">
					<div class="row">
						<h4 style="font-family: Times New Roman; text-decoration: underline;">
							Existing Roles
						</h4>
					</div>
					<div class="row">
						<table class="table">
							<thead>
								<th>#</th>
								<th>Role name</th>
								<th>Role Status</th>
								<th>Role has</th>
								<th>Action</th>
							</thead>
							@if($existingRoles)
							
							<tbody>
							@foreach($existingRoles as $role)
								<tr>
									<td></td>
									<td>{{$role->role_name}}</td>
									<td>{{$role->role_status}}</td>
									<td>{{count($role->editorsInThisRole)}} member(s)</td>
									<td>

										<div class="dropdown">
										  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										    Choose Action
										  </button>
										  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										    <a class="dropdown-item" href="/roles/members/{{$role->role_id}}">View Role Members</a>
										    <a class="dropdown-item" href="/roles/deactivate/{{$role->role_id}}">Deactivate Role</a>
										  </div>
										</div>

									</td>
								</tr>
							@endforeach
							</tbody>
							
							@endif
						</table>
					</div>
				</div>
				<div class="col-md-2 col-lg-2"></div>
			</div>
					
			<div class="row">
				<div class="col-md-2 col-lg-2"></div>
				<form class="col-md-8 col-lg-8" method="post" action="">
					@csrf
					<div class="row" style="margin-bottom: 30px">
						<div class="col-md-12 col-lg-12" >
								<div class="row">
									<h3 style="padding-left: 20px; text-decoration: underline; font-family: Times New Roman"> Add New Role</h3>
								</div>
							<div class="row">
								<div class="col-md-8 col-lg-8">
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
									<input type="text" name="roleName" placeholder="Role name" style="width: 100%; height: 35px">
								</div>
								<div class="col-md-4 col-lg-4">
									<input type="submit" name="submitRole" value="Save Role" class="btn btn-primary">
								</div>
								
								
							</div>
								
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<style type="text/css">
		.table thead {
			background-color: #2b383e;
		}
		.table thead th {
			color: white;
		}
		.table tbody tr:nth-child(even)
		{
			background-color: #c9cccf;
		}
	</style>
@endsection