@extends('layouts.app')

@section('content')
@include('helper.panel_top')
<div class="panel-heading">Registration summary</div>

<div class="panel-body">

	<div class="row">
		<div class="table-responsive">
			<div class="col-md-10 col-md-offset-1">
			<table class="table">
				<thead>
				<tr>
					<th>Item</th>
					<th>Price</th>
				</tr>
				</thead>
				<tbody>
				@foreach($user->registration->sports as $regSport)
				<tr>
					@if ($regSport->sport->id == \App\Sport::VISITOR)
						<td>
							Visitor<br>
							<small>Includes public transport and party tickets.</small>
						</td>
					@else
						<td>{{ $regSport->sport->name }}</td>
					@endif
					<td>@include('helper.price', ['price' => $regSport->sport->price])</td>
				</tr>
				@endforeach

				@if ($user->registration->brunch)
				<tr>
					<td>Brunch</td>
					<td>@include('helper.price', ['price' => $price->getBrunchPrice()])</td>
				</tr>
				@endif

				@if ($user->registration->concert)
					<tr>
						<td>Concert Doodles and Podium Paris ticket</td>
						<td>@include('helper.price', ['price' => $price->getConcertTicketPrice()])</td>
					</tr>
				@endif

				@if ($user->registration->hosted_housing)
				<tr>
					<td>Hosted Housing</td>
					<td>@include('helper.price', ['price' => $price->getHostedHousingPrice()])</td>
				</tr>
				@endif

				@if ($user->registration->outreach_support)
				<tr>
					<td>Outreach Support</td>
					<td>
					@if (intval($user->currency_id) === \App\Currency::CZK)
						{{ $price->getOutreachSupportPrice()->czk * $user->registration->outreach_support }} Kč
					@else
						{{ $price->getOutreachSupportPrice()->eur * $user->registration->outreach_support }} €
					@endif
					</td>
				</tr>
				@endif
				</tbody>
				<tfoot>
					<tr class="success">
						<th>Total Price</th>
						<th>{{ $totalPrice['price'] }} {{ $totalPrice['currency']->short }}</th>
					</tr>
				</tfoot>
			</table>
			</div>
		</div>
	</div>
	<form role="form" method="POST">
		{{ csrf_field() }}
		@include('form.footer', ['back' => '/service'])
	</form>
</div>

@include('helper.panel_bottom')
@endsection
