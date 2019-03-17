
@extends ("mainlayout.mainbody")

@section ("maincontent")
	<div class="hk-pg-wrapper">

		<div class="container mt-xl-50 mt-sm-30 mt-15">
			<div class="row">
				<div class="col-md-2 col-lg-2"></div>
				<div class="col-md-8 col-lg-8">
					<div class="row">
						
					@if(session('success'))
					<div style="color:green">{{session('success')}}</div>
					
					@elseif(session('error'))
					<div style="color:red">{{session('error')}}</div>
					
					@endif
					</div>
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
									<td>{{count($role->editorsInThisRole)}} active member(s) </td>
									<td>
										
										<div class="dropdown">
										  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										    Choose Action
										  </button>
										  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										    <a class="dropdown-item" href="/members/roles/{{$role->role_id}}">View Role Members</a>
										    @if($role->role_status === 'active')
										    <a class="dropdown-item" href="/members/roles/deactivate/{{$role->role_id}}">Deactivate Role</a>
										    @else
										    <a class="dropdown-item" href="/members/roles/activate/{{$role->role_id}}">Activate Role</a>
										    @endif
										    
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