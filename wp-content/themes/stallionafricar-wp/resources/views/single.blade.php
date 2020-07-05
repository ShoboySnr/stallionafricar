@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection

@section('scripts')
<script>
function showVideo(youtube_id) {
    $('#toggle-image-video .video').append('<iframe width="100%" height="450"src="https://www.youtube-nocookie.com/embed/'+youtube_id+'?autoplay=1&loop=1&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    $('#toggle-image-video .video').show();
    $('#toggle-image-video .image').hide();
} 
</script>
@endsection
