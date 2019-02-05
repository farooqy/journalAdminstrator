
	<ul class="row adminLeftBar">
		Articles
		<li>
			<a href="{{env('APP_URL').'articles/topublish'}}">
				Ready for Publication
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'articles/toapprove'}}">
				Articles That require approval
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'articles/resent'}}">
				Resent Articles
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'articles/rejected'}}">
				Rejected articles
			</a>
		</li>
	</ul>
	<ul class="row adminLeftBar">
		Editorial Board Members
		<li>
			<a href="{{env('APP_URL').'editorial/active'}}">
				Active Board Members
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'editorial/newmemember'}}">
				Add New Board Member
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'editorial/inactive'}}">
				Diactivated Board Members
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'editorial/newrole'}}">
				Add New Editorial Role
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'editorial/existingrole'}}">
				View existing roles
			</a>
		</li>
	</ul>
	<ul class="row adminLeftBar">
		Team Members
		<li>
			<a href="{{env('APP_URL').'team/active'}}">
				Active Team Members
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'team/newmemember'}}">
				Add New Team Member
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'team/inactive'}}">
				Diactivated Team Members
			</a>
		</li>
	</ul>
	<ul class="row adminLeftBar">
		News
		<li>
			<a href="{{env('APP_URL').'rejected'}}">
				Active News
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'news/addnews'}}">
				Add News
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'news/deactivatenews'}}">
				Diactivate News
			</a>
		</li>
	</ul>
	<ul class="row adminLeftBar">
		Others
		<li>
			<a href="{{env('APP_URL')}}others/harvest">
				Harvest Emails
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL')}}others/analyis">
				Users Data Analysis
			</a>
		</li>
	</ul>	
	<ul class="row adminLeftBar">
		Feedback Messages
		<li>
			<a href="{{env('APP_URL').'feedback/unread'}}">
				Unread Messages
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'feedback/nonreplied'}}">
				Non-replied Messages
			</a>
		</li>
		<li>
			<a href="{{env('APP_URL').'feedback/replied'}}">
				Replied Messages
			</a>
		</li>
	</ul>