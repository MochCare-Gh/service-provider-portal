@extends("frontEndTemplates.creative.inner_pages_layout")
@section('content')
<section class="page-section bg-dark text-white">
    <div class="container text-center">
        <h1>{{ $blog->title }}</h1>
        <h4 class="mb-4">Home / Blog / {{ $blog->title }}</h4>
    </div>
</section>
<section class="page-section">
    <div class="container">
        <div class="row">
                <div class="col-8">
                        <div class="blog-classic-item-01 margin-bottom-60">
                            <div class="thumbnail">
                                <img src="{{ asset('files/'.$blog->image) }}" >
                            </div>
                            <div class="content">
                                <ul>
                                    <li><a href="#"><i class="fa fa-user"></i> {{ $blog->author_name }}</a></li>
                                    <li><a href="#"><i class="fa fa-clock"></i> {{ $blog->updated_at }}</a></li>
                                    <li>
                                        <a href="{{ route('blogCategory',$blog->category) }}">
                                            <i class="fa fa-anchor"></i> {{ $blog->Category->category_name }}
                                        </a>
                                    </li>
                                </ul>
                                <h4 class="title"><a href="#">{{ $blog->title }}</a></h4>
                                <p>{!! $blog->content !!}</p>
                            </div>
                        </div>
                </div>
                <div class="col-4"></div>
        </div>
    </div>

      
</section>
<style>
    .thumbnail{
     margin-bottom: 25px;
     display: block;
    }
    .content ul {
        list-style: none;
        padding: 0px;
    }
    .content ul li {
        display: inline-block;
        margin-right:10px ; 
    }
    .title {font-size: 36px;line-height: 46px;font-weight:700;}
    .title a {color:black;text-decoration: none}
    .margin-bottom-60 { margin-bottom: 60px}
</style>
@stop