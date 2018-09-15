@extends('backend.layout.index')

@section('content')
	 <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                
                {!! $news_comment->content !!}
            </div>
        </div>
    </div>
@endsection