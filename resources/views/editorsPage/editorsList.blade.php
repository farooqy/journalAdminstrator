
@extends ("mainlayout.mainbody")

@section ("maincontent")
	<div class="hk-pg-wrapper">

		<div class="container mt-xl-50 mt-sm-30 mt-15">

			<div class="row" style="margin:10px;">
				<div class="col-md-12 col-lg-12">
					@if(session('success'))
					<div style="color:green">{{session('success')}}</div>
					
					@elseif(session('error'))
					<div style="color:red">{{session('error')}}</div>
					
					@endif

				</div>
				
				@foreach($roleList as $role)
				<p class="" style="text-align: center; display: block;width: 100%; font-weight: bolder; text-decoration: underline; margin-bottom: 20px;">
						Roles and members in charge
				</p>
					<p class="role_name" style="display: block; width: 100%">
						{{$role->role_name}}
					</p>
					<table class="table">
						@php
						$membersList = $role->editorsInThisRole;
						if(count($membersList) <= 0) 
							$class = "class=bg-danger";
						else
							$class="class=''";
						@endphp
						<thead {{$class}} style="border:thin solid gray; background-color: #2b383e; color: white; ">
							<th>Member Name</th>
							<th>Email</th>
							<th>Institute</th>
							<th>Department</th>
							<th>Location</th>
							<th>Action</th>
						</thead>
						<tbody>
						@php @endphp
						@if(count($membersList) > 0)
							@foreach($membersList  as $member)
							<tr>
								<td>{{$member->ed_title.' '.$member->ed_name}}</td>
								<td><a href="mailto:{{$member->ed_email}}">{{$member->ed_email}}</a></td>
								<td>{{$member->ed_institute}}</td>
								<td>{{$member->ed_department}}</td>
								<td>{{$member->ed_location}}</td>
								<td>
									
									<div class="dropdown">
									  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Choose Action
									  </button>
									  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									    <a class="dropdown-item" href="/member/deactivate/{{$member->ed_id}}">Mark Inactive</a>
									  </div>
									</div>

								</td>
							</tr>
							@endforeach
						@else
							<tr>
								<td><h4 style="color: red"> This role does not have any member in charge </h4></td>

								
							</tr>
						@endif
						</tbody>
					</table>
				@endforeach
			</div>
		</div>
	</div>
	<style type="text/css">
		.table thead th {
			color: white;
		}
		.table {
			border-bottom: medium solid black;
			margin-bottom: 20px;
		}
		.role_name {
			font-weight: bold;
		}
	</style>
@endsection