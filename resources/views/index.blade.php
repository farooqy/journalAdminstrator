@extends("mainlayout.index")

@section("title")
	Journal Adminstration
@endsection

@section ("content")
	
	<div class="row adminArticleInfoDiv">
		<div class="articleCountDiv">
			<div class="articleCountDivImage">
				
			</div>
			<div class="articleCountContent">
				{{$articlesDetails->published}} Published Articles
			</div>
		</div>
		<div class="articleCountDiv">
			<div class="articleCountDivImage">
				
			</div>
			<div class="articleCountContent">
				{{$articlesDetails->resent}} Resent Articles
			</div>
		</div>
		<div class="articleCountDiv">
			<div class="articleCountDivImage">
				
			</div>
			<div class="articleCountContent">
				{{$articlesDetails->submitted}} Submitted Articles
			</div>
		</div>
		<div class="articleCountDiv">
			<div class="articleCountDivImage">
				
			</div>
			<div class="articleCountContent">
				{{$articlesDetails->rejected}} Rejected Articles
			</div>
		</div>
		<div class="articleCountDiv">
			<div class="articleCountDivImage">
				
			</div>
			<div class="articleCountContent">
				{{$articlesDetails->activeteams}} Active Team Members
			</div>
		</div>
		<div class="articleCountDiv">
			<div class="articleCountDivImage">
				
			</div>
			<div class="articleCountContent">
				{{$articlesDetails->activemember}} Active Editorial Members
			</div>
		</div>
		<div class="articleCountDiv">
			<div class="articleCountDivImage">
				
			</div>
			<div class="articleCountContent">
				{{$articlesDetails->livenews}} Live News Updates
			</div>
		</div>
		<div class="articleCountDiv">
			<div class="articleCountDivImage">
				
			</div>
			<div class="articleCountContent">
				{{$articlesDetails->unreadfeedback}} Unread Feedback
			</div>
		</div>
	</div>
@endsection