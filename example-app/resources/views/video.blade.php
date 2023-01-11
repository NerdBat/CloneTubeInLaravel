@include('header');

@foreach($data as $row)
<video width="320" height="240" autoplay muted>
  <source src="{{ $data }}{{$row['video']}}" type="video/mp4">
</video>
@endforeach

@include('footer');