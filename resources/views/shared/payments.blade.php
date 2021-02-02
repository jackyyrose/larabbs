@if($payment_history->count() > 0)

<ul class="list-unstyled">
@foreach ($payment_history as $payment)
    <li>
      Pay to user: {{$payment->payee_id}} , Amount:{{$payment->amount}},
      Pay from channel: {{$payment->binded_payment_account_id}},
      Status: {{$payment->status}},
      Time created: {{$payment->created_at}}
    </li>
@endforeach
</ul>

@else
<p>No payment history!</p>
@endif

@include('shared.qrscanner')
