
@extends ("mainlayout.mainbody")

@section ("pageTitle")
	Action Not Allowed
@endsection
@section ("maincontent")

<div class="hk-pg-wrapper">
	<div class="container mt-xl-50 mt-sm-30 mt-15">
		<div class="row">
			<h2> Action Not Allowed! </h2>
		</div>
		<div class="row">
			<p>
				The action you are intending to perform cannot be done:-
			</p>
		</div>
		<div class="row">
			
			<p>
				Current status is:- {{$article[0]->status}}
			</p>
		</div>
		<div class="row">
			
			<p>
				Intended status is:- {{$intendedStatus}}
			</p>
		</div>
	</div>
</div>
@endsection