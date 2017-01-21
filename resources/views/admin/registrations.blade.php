@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div id="admin-content" class="panel panel-default">
				<div class="panel-body">
					{{--Registrations ---}}
					<form action="">
						<select class="selectpicker" name="sport_id" title="Sport" _onchange="this.form.submit();">
							<option></option>
							@foreach (App\Sport::all() as $sport)
								<option value="{{ $sport->id }}" {{ $sportId == $sport->id ? ' selected' : ''}}>
									{{ $sport->name }}
								</option>
							@endforeach
						</select>
						<select class="selectpicker" name="states[]" title="State" _onchange="this.form.submit();" multiple>
							@foreach(\App\Registration::$states as $state)
								<option {{ in_array($state, $states) ? ' selected' : ''}}>{{ $state }}</option>
							@endforeach
						</select>
						<button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
					</form>
				</div>

				@if ($sportId)
					@if ($sportId === App\Sport::VOLLEYBALL)
						@include('admin.registrations.volleyball')
					@else
						@include('admin.registrations.default')
					@endif
				@else
					<table class="table">
						<thead>
						<tr>
							<th></th>
							@foreach(\App\Registration::$states as $state)
								<th>{{ $state }}</th>
							@endforeach
						</tr>
						</thead>
						<tbody>
						@foreach (\App\Sport::all() as $sport)
							<tr>
								<td>{{ $sport->name }}</td>
								@foreach(\App\Registration::$states as $state)
									<td><a href="{{ url("/admin/registrations?sport_id=$sport->id&states[]=$state") }}">
										{{ \App\RegistrationSport::join('registrations', 'registrations.id', '=', 'registration_sports.registration_id')
									->where('registrations.state', $state)
									->where('sport_id', $sport->id)
									->count() }}</a></td>
								@endforeach

							</tr>
						@endforeach
						<tr>
							<td>Concert ticket</td>
							@foreach(\App\Registration::$states as $state)
								<td>{{ \App\Registration::whereConcert(1)->whereState($state)->count() }}</td>
							@endforeach
						</tr>
						<tr>
							<td>Brunch</td>
							@foreach(\App\Registration::$states as $state)
								<td>{{ \App\Registration::whereBrunch(1)->whereState($state)->count() }}</td>
							@endforeach
						</tr>
						<tr>
							<td>Hosted Housing</td>
							@foreach(\App\Registration::$states as $state)
								<td>{{ \App\Registration::whereHostedHousing(1)->whereState($state)->count() }}</td>
							@endforeach
						</tr>
						<tr>
							<td>Outreach Support</td>
							@foreach(\App\Registration::$states as $state)
								<td>{{ \App\Registration::where('outreach_support', '>', 0)->whereState($state)->count() }}</td>
							@endforeach
						</tr>
						<tr>
							<td>Outreach Request</td>
							@foreach(\App\Registration::$states as $state)
								<td>{{ \App\Registration::whereOutreachRequest(1)->whereState($state)->count() }}</td>
							@endforeach
						</tr>

						</tbody>
					</table>
				@endif
			</div>
		</div>
	</div>
@endsection
