@if($businesses->count() > 0)

<ul class="list-unstyled">
@foreach ($businesses as $bs)
    <li>
      {{$bs->user_id}} |
      {{$bs->company_name}},
      {{$bs->city}},
      {{$bs->country}},
      {{$bs->zip}}.<br>
      <img src={{$bs->generateQR()}} alt="QR code" />
    </li><br>
@endforeach
</ul>

@else

@endif
