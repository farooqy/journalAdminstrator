@extends ("mainlayout.mailbody")
<div class="" style="font-family: Times New Roman">
	<div class="header">
		<h1 style="font-size: 18">
			Congratulations,
		</h1>
	</div>
	<div class="content">
		Your paper titled: 
		<span style="text-decoration: underline; font-weight: bold">
			{{$article[0]->title}} 
		</span> has been published successfully. 
		<br>
		You can view or download your paper on the button below.
		<br>
		<div class="">
			<a href="{{$article[0]->articleDetails[0]->j_url}}">
			<button style="height: 40px; width: 120px; color:white; background-color:green; border:none; border-radius: 5px">
					View paper
				</button>
			</a>
				
		</div>
	</div>
</div>