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
		</span> has been approved for review. 
		<br><br>
		The editors at Journal of Toxicology and Molecular Biology will evaluate your paper <br>
		for either publications or if changes are necessary. 
		<br><br>
		You will recieve email  notifications on the publication of the paper or otherwise.
	</div>
</div>