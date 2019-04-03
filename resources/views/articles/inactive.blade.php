

@extends ("mainlayout.mainbody")

@section ("maincontent")
	<div class="hk-pg-wrapper">
		<div class="container mt-xl-50 mt-sm-30 mt-15">
			<div class="row">
				<form class="form" action="{{route('searchInactiveArticles')}}" method="post">
					@csrf
					<input type="text" name="search_value" placeholder="Search Article by title/author">
					<input type="submit" name="submit" value="Search" class=" btn-search">
				</form>
			</div>
			<div class="row "  id="articleWrap">
			@foreach($articles as $article)
				<div class="col-md-3 col-lg-3">
					@if($article->figures->count() <= 0)
						@php $figureUrl = 'none';  @endphp
					@else
						@php $figureUrl = $article->figures[0]->figure_url; @endphp
					@endif

					<div class="row imageArticle">

                        <div class="inline-block dropdown">
                            <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button">
                            	<i class="ion ion-md-brush"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{env('APP_URL')}}articles/published/activate/{{$article->manToken}}">Activate</a>
                                <a class="dropdown-item" href="{{env('APP_URL')}}articles/{{$article->manToken}}">View</a>
                                
                                <div class="dropdown-divider"></div>
                                
                            </div>
                        </div>
						<img src="{{$figureUrl}}" height="200px" width="99%" style="border:thin solid gray;">

					</div>
					<div class="row articleTitle">
						@php $article->title = substr($article->title, 0, 30)  @endphp
						{{$article->title}}
					</div>
				</div>
				<!-- {{$article->figures->count()}}<br> -->
			@endforeach
			@if($articles->count() <= 0)
			There are no available articles
			@endif
			</div>
		</div>
			
	</div>
	<style type="text/css">
		#articleWrap {
			background: rgb(255,255,255);
			border:thin solid gray;
			padding: 20px;
		}
		.imageArticle {
			margin-right: 2px;
		}
		.imageArticle img {
			padding-right: 8px;
		}
		.articleTitle {
			margin-bottom: 20px;
			border-bottom: thin solid gray;
		}
		.articleMenu {
			border: thin solid gray;
		}
		.dropdown-menu .dropdown-item:focus:not(.active):not(.disabled), .dropdown-menu .dropdown-item:hover:not(.active):not(.disabled) {
			background-color: lightblue;
			color: black;
		}
		.form {
			display: inline-flex;
			width: 70%;
			margin-bottom: 20px;
			margin-left: 20px;
		}
		.form input {
			height: 40px;
			width: 100%;
		}
		.form .btn-search {
			width: 30%;
			background-color: #87ffa2;
			border: thin solid gray;
		}
	</style>
		
	
@endsection

