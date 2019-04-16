
@extends ("mainlayout.mainbody")

@section ("pageTitle")
	Approving Article
@endsection
@section ("maincontent")



<div class="hk-pg-wrapper">
	<div class="container mt-xl-50 mt-sm-30 mt-15">
		<div class="row">
			<h1 style="font-size: 18; font-family: Times New Roman">
				Please confirm the paper you are about to approve.
			</h1>
		</div>
		<div class="row" style="font-size: 15; font-family: Times New Roman; margin-top: 20px;">
			<strong style="padding-right: 10px">Title: </strong> 
			<span> {{ $article[0]->title }} </span>
		</div>
		<div class="row" style="font-size: 15; font-family: Times New Roman; margin-top: 20px;">
			<strong style="padding-right: 10px">Current Status: </strong> 
			<span> {{ $article[0]->status }} </span>
		</div>
		<div class="row" style="font-size: 15; font-family: Times New Roman; margin-top: 20px;">
			<strong style="padding-right: 10px">Corresponding Author: </strong> 
			<span style=" font-family: Times New Roman; padding-right: 20px;"> {{  $manCAuthor[0]->a_title.' '.$manCAuthor[0]->a_firstName.' '. $manCAuthor[0]->a_secondName }} </span><a href="mailto:{{  $manCAuthor[0]->a_email }}"><span> ({{  $manCAuthor[0]->a_email }} )</span></a>
		</div>
		<div class="row" style="font-size: 15; font-family: Times New Roman; margin-top: 20px;">
			<strong style="padding-right: 10px">submitter Author:	 </strong> 
			
			@php $authors = $article[0]->authors @endphp
			@foreach($authors as $author)
				@if($author->a_email === $article[0]->submitter)
				<span style=" font-family: Times New Roman; padding-right: 20px;"> {{  $author->a_title.' '.$author->a_firstName.' '. $author->a_secondName }} </span>
				<a href="mailto:{{  $author->a_email }}">(<span> {{  $author->a_email }} )</span></a>
				@endif
			@endforeach
			
		</div>
		<div class="row " style="margin-top: 20px; border:thin solid gray; padding: 10px; padding-bottom: 50px;">
			<form class="form col-md-6 col-lg-6" method="POST" action="">
				@csrf
				<div class="row">
					@if(session()->has('articleError'))
					<span><strong style="color:red">{{ session('articleError') }}</strong></span>
					@endif
					@php session()->forget('articleError') @endphp
				</div>
				<div class="row">
					<input type="hidden" name="articleToken" style="border:thin solid gray; height: 30px; width: 100%"  value="{{ $article[0]->manToken }}">
					@if($errors->has('articleToken'))
					<span> <strong style="color: red"> {{ $errors->first('articleToken') }} </strong></span>
					@endif()
				</div>
				<div class="row">
					<label for="adminPassword">
						Please Enter your password to confirm
					</label>
					<input type="password" name="adminPassword" style="border:thin solid gray; height: 30px; width: 100%" placeholder="Enter your password" >
					@if($errors->has('adminPassword'))
					<span> <strong style="color: red"> {{ $errors->first('adminPassword') }} </strong></span>
					@endif()
				</div>
				<div class="row">
					<label for="adminPassword">
						Please Enter the captcha displayed
					</label>
					<input type="text" name="adminCaptcha" style="border:thin solid gray; height: 30px; width: 100%" placeholder="Enter captcha">
					@if($errors->has('adminCaptcha'))
					<span> <strong style="color: red"> Invalid captcha Code </strong></span>
					@endif()
				</div>
				<div class="row">
					<p> {!! captcha_img() ; !!} </p>
				</div>
				<div class="row">
					<input type="submit" name="submitAdminForm" value="Approve Article" class="btn btn-primary">
				</div>

               
			</form>
		</div>
	</div>
</div>
@endsection