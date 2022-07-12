@extends("frontEndTemplates.creative.inner_pages_layout")
@section('content')
<section class="page-section bg-dark text-white">
    <div class="container text-center">
        <h2 class="mb-4">Home / Blog Categories </h2>
    </div>
</section>
<section class="page-section">
      <div class="col-10">
      @forelse($blogCategories as $blogCategory)
        <a href="{{ route('blogCategory',$blogCategory->id) }}">
            <h3>{{ $blogCategory->category_name }}</h3>
        </a>
      @empty
      @endforelse
      </div>
</section>
@stop