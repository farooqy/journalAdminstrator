

@extends ("mainlayout.mainbody")

@section ("maincontent")
	<div class="hk-pg-wrapper">
		<div class="container mt-xl-50 mt-sm-30 mt-15">
			<div class="row " >
				<!-- @php print_r($article) @endphp -->
				<div class="col-md-2 col-lg-2"></div>
				<div class="col-md-8 col-lg-8"  id="articleWrap">
					<div class="row">
						<h2 style="font-size: 20px; text-decoration: underline;">
							{{$article[0]->title}}
						</h2>
					</div>
					<div class="row">
						<p>{{gmdate('Y-m-d' , $article[0]->time)}}</p>
					</div>
					<div class="row" >
						<p id="abstractText">
							{{$article[0]->abstract}}
						</p>
					</div>
					<div class="row" style="margin-bottom: 20px; margin-top: 20px; ">
						<p class="glyphicon glyphicon-file" style="color:green;padding-right: 20px;">
							<a href="{{$article[0]->cover_url}}" target="_blank">View Cover</a>
						</p>
						@if($article[0]->status === "published")
						<p class="glyphicon glyphicon-file" style="color:green;padding-right: 20px;">
							<a href="{{$article[0]->publishedDetails->j_url}}" target="_blank">View PDF</a>
						</p>
						@elseif($article[0]->status === "resent")
						<p class="glyphicon glyphicon-file" style="color:green;padding-right: 20px;">
							<a href="{{$article[0]->resentAritclesDetails->j_url}}" target="_blank">View Reason File</a>
						</p>
						@elseif($article[0]->status === "rejected")
						<p class="glyphicon glyphicon-file" style="color:green;padding-right: 20px;">
							<a href="{{$article[0]->rejectedAritclesDetails->j_url}}" target="_blank">View Reason File</a>
						</p>
						@else
						<p class="glyphicon glyphicon-file" style="color:green;padding-right: 20px;">
							<a href="{{$article[0]->manuscript_url}}" target="_blank">View Manuscript</a>
						</p>
						@endif
					</div>
					<div class="row">
						@php $figures = $article[0]->figures @endphp
						
						@foreach($figures as $figure)
						<div class="" style="margin-right: 5px;">
							<img src="{{$figure->figure_url}}" height="160px" style=" border:thin solid gray;">
						</div>
						@endforeach
					</div>
					<div class="row">
						<h2 style="font-size: 18px; padding-left: 30px; text-decoration: underline;">Authors</h2>
						<table class="table">
							<thead>
								<th>Name</th>
								<th>Email</th>
								<th>Institution</th>
								<th>Location</th>
								<th>C.A</th>
							</thead>
							<tbody>
							@php $authors = $article[0]->authors @endphp
							@foreach($authors as $author)
								<tr>
									<td>
										{{$author->a_firstName }} {{$author->a_secondName}}
									</td>
									<td>
										<a href="mailto:{{$author->a_email}}">
											{{$author->a_email}}
										</a>
										
									</td>
									<td> {{$author->a_institution}} </td>
									<td> {{$author->a_location}} </td>
									<td>
										@if($article[0]->c_author === $author->a_email)
										<span class="glyphicon glyphicon-ok" style="color: green"></span>
										@else
										<span class="glyphicon glyphicon-remove" style="color: red"></span>
										@endif
									</td>
								</tr>
							@endforeach
							</tbody>

						</table>
					</div>
						
				</div>
				<div class="col-md-2 col-lg-2"></div>

			</div>
		</div>
		<style type="text/css">
			#articleWrap {
				border:thin solid gray;
				background-color: white;
				padding: 30px;
			}
		</style>
	</div>

@endsection("maincontent")