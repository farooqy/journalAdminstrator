@extends ("mainlayout.mainbody")


@section ("maincontent")

		

<div class="hk-pg-wrapper">
	<div class="container mt-xl-50 mt-sm-30 mt-15">
		<div class="row">
			<div class="col-md-1 col-lg-1"></div>
			<div class="col-md-10 col-lg-10 feedbackContainer">
				<div class="row ">
					@if($feedback)
					@php $feedback = $feedback[0] @endphp
					<div class="title">
						<h4>{{$feedback->title}}</h4>
					</div>
					<div class="sender">
						Feedback will be replied to: <h6>{{$feedback->email}}</h6>
					</div>
					<div class="feedbackContainer">
						<p>
							{{$feedback->message}}
						</p>
					</div>
					@else
					@endif
				</div>
				<form class="row" action="{{route('feedbackReply')}}" method="post">
					@csrf
					@if(session('success'))
					<div class="">
						{{session('success')}}
					</div>
					@endif
					@if ($errors->has('feedbackContent'))
					<div class="">
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('feedbackContent') }}</strong>
                        </span>
                    </div>
                    @endif
					<div class="">
						<textarea  style="resize: none" placeholder="Write reply" class="textarea" id="textarea" name="feedbackContent">{{old('feedbackContent')}}</textarea>
					</div>

                    @if ($errors->has('targetFeedback'))
					<div class="">
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('targetFeedback') }}</strong>
                        </span>
                    </div>
                    @endif
					<div class="">
						<input type="hidden" name="targetFeedback" class="btn btn-submit" value="{{$feedback->id}}">
					</div>
					<div class="">
						<input type="submit" name="submit" class="btn btn-submit" value="Reply">
					</div>
				</form>
			</div>
			<div class="col-md-1 col-lg-1"></div>
		</div>
		<style type="text/css">
			.feedbackContainer {
				background-color: white;
				padding: 20px;
				border: thin solid gray;
			}
			.feedbackContainer .row {
				display: block;
			}
			.feedbackContainer .sender {
				display: inline-flex;
			}
			.sender h6 {
				padding-left: 20px;
			}
			.feedbackContainer{
				border: thin solid burlywood;
			}
			.feedbackContainer form {
				margin-top: 20px;
				width: 100%;
			}
			form textarea {
				resize: none;
				width: 70%;
				border: thin solid brown;
				height: 300px;
			}
			.btn-submit {
				border: thin solid aquamarine;
				width: 50%;
				margin-top: 20px;
				background-color: #767478;
				color: white;
			}
			.invalid-feedback {
				display: block;
			}
		</style>
	</div>
</div>
		

@endsection