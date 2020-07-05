@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
  <div id="search-page">
    <div class="container">
      <div class="flex justify-center items-center flex-col">
        <div class="featured-image text-center">
          <h3>No results found</h3>
          <img src="<?= get_template_directory_uri() ?>/assets/images/empty-white-box.png" alt="empty-box" />
        </div>
        <div class="content text-center">
          <div class="alert alert-warning">
           <p>Sorry, no results was found for '<?= $_GET['s']; ?>'.</p>
          </div>
          <br /><br />
          <p style="font-size: 14px;">Haven't seen what you're looking for? Search again... </p>
          {!! get_search_form(false) !!}
        </div>
      </div>
    </div>
  </div>
  @endif

  @if(have_posts())
  <div class="single-search-page" id="search-page">
    <div class="container">
      <div class="title text-left">
        <h3>Search results for: '<?= $_GET['s']; ?>'</h3>
      </div>
      <div class="content">
        <div class="flex justify-start flex-wrap">
          @while(have_posts())  @php the_post() @endphp
            @include('partials.content-search')
          @endwhile
        </div>
      </div>
    </div>
  </div>
  @endif

  {!! get_the_posts_navigation() !!}
@endsection
