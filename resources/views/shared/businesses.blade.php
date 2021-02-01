@if($businesses->count() > 0)

<ul class="list-unstyled">
@foreach ($businesses as $bs)
    <li>
      {{$bs->user_id}} |
      {{$bs->company_name}},<br>
      {{$bs->city}},<br>
      {{$bs->country}},<br>
      {{$bs->zip}}.<br>
    </li><br>
@endforeach
</ul>

@else

@endif
