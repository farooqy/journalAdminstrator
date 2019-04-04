
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
				<div class="col-md-10 col-lg-10">
					<div class="row">
						<h3 style="font-size: 18px; font-family: Times New Roman; text-decoration: underline; padding-left: 20px">
							Replied Feedbacks
						</h3>
					</div>
					<table class="table">
						<thead>
							<th>Sender Email</th>
							<th>Title</th>
							<th>Time</th>
							<th>Number of Replies</th>
							<th>Action</th>
						</thead>
						<tbody>
							@foreach($readFeedbacks as $feedback)
							<tr>
								<td>{{$feedback->email}}</td>
								<td>{{$feedback->title}}</td>
								<td>@php echo gmdate('Y-m-d',$feedback->time) @endphp</td>
								<td>
									@if($feedback->replied_status === 'true') 
										{{count($feedback->replies)}} Reply(ies)
									@else 
										0 Reply
									@endif 
									
								</td>
								<td>
									
									<div class="dropdown">
									  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Choose Action
									  </button>
									  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									    <a class="dropdown-item" href="/feedback/{{$feedback->id}}">View Feedback</a>
									    <a class="dropdown-item" href="/feedback/replies/{{$feedback->id}}">View Replies</a>
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
			width: 100%;
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