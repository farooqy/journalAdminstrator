@extends("mainlayout.index")


@section ("title")
	Approved Manuscripts
@endsection

@section ("content")
<div class="row">
	@foreach($articles as $article)
		<div class="col-md-4 col-lg-4">
			@if($article->figures->count() <= 0)
				@php $figureUrl = 'none';  @endphp
			@else
				@php $figureUrl = $article->figures[0]->figure_url; @endphp
			@endif

			<div class="row">
				<img src="{{$figureUrl}}" height="150px" width="99%">
			</div>
			<div class="row">
				@php $article->title = substr($article->title, 0, 30)  @endphp
				{{$article->title}}...
			</div>
		</div>
		<!-- {{$article->figures->count()}}<br> -->
	@endforeach
</div>

@endsection
