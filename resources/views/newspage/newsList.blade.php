
@extends ("mainlayout.mainbody")

@section ("maincontent")
	<div class="hk-pg-wrapper">

		<div class="container mt-xl-50 mt-sm-30 mt-15">
			<div class="row" style="margin:10px;">
				<div class="">
					@if(session('success'))
					<div style="color:green">{{session('success')}}</div>
					
					@elseif(session('error'))
					<div style="color:red">{{session('error')}}</div>
					
					@endif

				</div>
				<table class="table">
					<thead style="border:thin solid gray; background-color: #2b383e; color: white">
						<th>Title</th>
						<th>Published By</th>
						<th>Publish Date</th>
						<th>Status</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($newsList as $news)
						<tr>
							<td>{{$news->update_title}}</td>
							<td> {{$news->postedBy->name}} </td>
							<td> 
								@php $update_time = gmdate('Y-m-d', $news->update_time) @endphp
								{{$update_time}}
							</td>
							<td>{{$news->update_status}}</td>
							<td>
								<div class="dropdown">
								  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    Choose Action
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								    <a class="dropdown-item" href="/news/editnews/{{$news->update_id}}">Edit News</a>
								    <a class="dropdown-item" href="/news/deletenew/{{$news->update_id}}">Mark Inactive</a>
								  </div>
								</div>
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<style type="text/css">
		.table thead th {
			color: white;
		}
	</style>
@endsection