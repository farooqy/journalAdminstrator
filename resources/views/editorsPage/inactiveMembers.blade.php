
@extends ("mainlayout.mainbody")

@section ("maincontent")
	<div class="hk-pg-wrapper">

		<div class="container mt-xl-50 mt-sm-30 mt-15">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					@if(session('success'))
					<div style="color:green">{{session('success')}}</div>
					
					@elseif(session('error'))
					<div style="color:red">{{session('error')}}</div>
					
					@endif

				</div>
				<div class="col-md-8 col-lg-8">
					<div class="row">
						<h3 style="font-size: 18px; font-family: Times New Roman; text-decoration: underline; padding-left: 20px">
							Inactive members
						</h3>
					</div>
					<table class="table">
						<thead>
							<th>Member Name</th>
							<th>Email</th>
							<th>Institute</th>
							<th>Department</th>
							<th>Location</th>
							<th>Role name</th>
							<th>Action</th>
						</thead>
						<tbody>
							@foreach($membersList as $member)
							<tr>
								<td>{{$member->ed_name}}</td>
								<td>{{$member->ed_email}}</td>
								<td>{{$member->ed_institute}}</td>
								<td>{{$member->ed_department}}</td>
								<td>{{$member->ed_location}}</td>
								<td>{{$member->editorRoles->role_name}}</td>
								<td>
									
									<div class="dropdown">
									  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Choose Action
									  </button>
									  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									    <a class="dropdown-item" href="/member/activate/{{$member->ed_id}}">Activate Member</a>
									  </div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="col-md-2 col-lg-2"></div>
			</div>
		</div>
	</div>
	<style type="text/css">
		.table {
			border-bottom: medium solid black;
			margin-bottom: 20px;
		}
		.role_name {
			font-weight: bold;
		}
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