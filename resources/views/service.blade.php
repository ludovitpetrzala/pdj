@extends('layouts.app')

@section('content')
@include('helper.panel_top')

<div class="panel-heading">Select service</div>

<div class="panel-body">
	<form class="form-horizontal" role="form" method="POST">
		{{ csrf_field() }}

		@include('form.yes_no', ['name' => 'brunch', 'title' => 'Brunch', 'start' => 0, 'default' => $user->registration->brunch])
		@include('form.yes_no', ['name' => 'hosted_housing', 'title' => 'Hosted Housing', 'start' => 0, 'default' => $user->registration->hosted_housing])
		@include('form.outreach', ['name' => 'outreach_support', 'title' => 'Outreach Support', 'start' => 0, 'default' => $user->registration->outreach_support])
		<div class="row">
			<div class="col-md-8 col-md-offset-4">
				<p>Voluntary contribution towards our outreach program. Outreach program will help some students to come and play with us.</p>
			</div>
		</div>
		@include('form.yes_no', ['name' => 'outreach_request', 'title' => 'Outreach Request', 'start' => 0, 'default' => $user->registration->outreach_request])
		<div class="row">
			<div class="col-md-8 col-md-offset-4">
				<p>Please, read this info <a href="http://www.praguerainbow.eu/outreach-program.html" target="_blank">http://www.praguerainbow.eu/outreach-program.html</a></p>
			</div>
		</div>

		<div class="form-group">
			<label for="note" class="col-md-4 control-label">Your Note</label>
			<div class="col-md-8">
				<textarea id="note" name="note" class="form-control">{{ old('note', $user->registration->note) }}</textarea>
			</div>
		</div>


		@include('form.footer', ['back' => '/registration'])
	</form>
</div>

@include('helper.panel_bottom')
@endsection
