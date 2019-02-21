@extends ("mainlayout.mailbody")
<div class="" style="font-family: Times New Roman">
	<div class="header">
		<h1 style="font-size: 18">
			Sincere apologies,
		</h1>
	</div>
	<div class="content">
		Your paper titled: 
		<span style="text-decoration: underline; font-weight: bold">
			{{$article[0]->title}} 
		</span> has been resent for further changes. 
		<br><br>
		The editors at Journal of Toxicology and Molecular Biology has evaluated your paper, <br>
		after much considerations, it was not viable for publications. 
		<br>
		The editors in charge has uploaded a reason for the resending of the paper.<br>
		You can login to the site to view the reason for the resend.
	</div>
	<div class="">
		
		<a href="{{ 'https://jtmb.scimazon.org/login' }}">
			<button style="height: 40px; width: 120px; color:white; background-color:green; border:none; border-radius: 5px">
				Login Here
			</button>
		</a>
				
	</div>
</div>