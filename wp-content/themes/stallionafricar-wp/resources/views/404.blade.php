@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
  <div id="search-page">
    <div class="container">
      <div class="flex justify-center items-center flex-col">
        <div class="featured-image text-center">
          <h3>Error 404</h3>
          <img src="<?= get_template_directory_uri() ?>/assets/images/empty-white-box.png" alt="empty-box" />
        </div>
        <div class="content text-center">
          <div class="alert alert-warning">
           <p>Sorry, but the page you were trying to view does not exist.</p>
          </div>
          <br /><br />
          <p style="font-size: 14px;">Would you like to search instead? </p>
          {!! get_search_form(false) !!}
        </div>
      </div>
    </div>
  </div>
  @endif
@endsection
