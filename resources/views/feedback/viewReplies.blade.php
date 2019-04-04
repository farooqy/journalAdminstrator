@extends ("mainlayout.mainbody")


@section ("maincontent")

		

<div class="hk-pg-wrapper">
	<div class="container mt-xl-50 mt-sm-30 mt-15">
		<div class="row">
			<div class="col-md-1 col-lg-1"></div>
			<div class="col-md-10 col-lg-10 feedbackContainer">
				<div class="row ">
					@if($feedbackReplies)
					@php $reply = $feedbackReplies[0] @endphp
					<div class="">
						<div class="feedbackTitle">
							<h4> Reply message to:</h4> {{$reply->feedback->title}}
						</div>
						@foreach($feedbackReplies as $reply)
						<div class="eachReply">
							<div class="feedbackDate">
								<h4> Reply date:</h4> {{$reply->updated_at}}
							</div>
							<div class="feedbackWhoReplied">
								<h4> Replied by: </h4> {{$reply->who_replied->name}}
							</div>
							<div class="feedbackMessage">
								@php echo str_replace("\n", "<br>", $reply->replied_content); @endphp
							</div>
						</div>
						@endforeach
							
					</div>
					@else
					@endif
				</div>
			</div>
			<div class="col-md-1 col-lg-1"></div>
		</div>
		<style type="text/css">
			.feedbackContainer {
				background-color: white;
				padding: 20px;
				border: thin solid gray;
				font-family: Times New York;
				font-size: 22px;
			}
			.feedbackTitle , .feedbackTitle h4{
				text-align: center;
				text-decoration: underline;
			}
			.feedbackTitle h4, .feedbackDate h4 , .feedbackWhoReplied h4{
				display: inline-flex;

			}
			.feedbackMessage {
				border: thin solid gray;
				width: 70%;
				padding: 20px;
			}
			.eachReply {
				border: thin solid;
				margin: 20px;
				padding: 20px;
			}
		</style>
	</div>
</div>
		

@endsection