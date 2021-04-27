@extends('layout.client.index')
@section('title',$detail -> name)
@section('content')
<main class="news select-ctent pd_t40_xs">
	<div class="container">
		<div class="row list-content">
			<div class="col-lg-8 col-xs-12">
				<h1>{{$detail -> name}}</h1>
				<img src="{{asset('public/Uploads')}}/{{$detail -> image}}"
					alt="{{$detail -> name}}"
					title="{{$detail -> name}}" class="img_item">
				<div class="word-ctent s-content">
					 {!!$detail->content!!}
				</div>
			</div>
			<div class="col-lg-4 col-xs-12 ">
				<div class="item slick6 border-2">
					@foreach($blg as $value)
					<div class="box">
						<a href="{{route('blog-detail',['slug'=>$value->slug])}}" class="smooth hv-scale">
							<img src="{{asset('public/Uploads')}}/{{$value -> image}}"
								alt="error" title="" class="img-fluid" />
						</a>
						<div class="desc">
							<a href="{{route('blog-detail',['slug'=>$value->slug])}}" title="" class="c-feb f-16 row-1">{{$value -> name}}</a>
							<div class="content_news c-fff f-14 row-3">
								 {!!Str::limit($value->des,150)!!}
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<section class="thumbs-cus space-title">
		<div class="container">
			<h2 class="text-center">
				<span class="title-big">Typical customers</span>
			</h2>
			 <section class="slick5 pt-lg-5 pt-4 pb-5 wow zoomIn">
                @foreach($brand as $value)
                <div>
                    <a href="" title="" class="avt">
                        <img src="{{asset('public/Uploads')}}/{{$value -> image}}" alt="">
                    </a>
                   
                </div>
                @endforeach
            </section>
		</div>
	</section>
</main>
@endsection
