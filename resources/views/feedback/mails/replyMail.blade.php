@extends("mainlayout.mailbody")

@section('mailTitle')
Feedback | SCIMAZON
@endsection
@section('mailContent')
<div class="">
	@if($feedbackContent)
	@php
	echo str_replace("\n", "<br>", $feedbackContent)
	@endphp
	
	@else
	The feedback reply is missing
	@endif
</div>
@endsection