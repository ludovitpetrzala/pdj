@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div id="admin-content" class="panel panel-default">
				<div class="panel-body">
					{{--Registrations ---}}
					<form action="">
						<select class="form-control" name="sport_id" title="Sport" onchange="this.form.submit();">
							<option></option>
							@foreach (App\Sport::all() as $sport)
								<option value="{{ $sport->id }}" {{ $sportId == $sport->id ? ' selected' : ''}}>
									{{ $sport->name }}
								</option>
							@endforeach
						</select>
					</form>
				</div>

				@if ($sportId)
					<table class="table">
						<thead>
						<tr>
							<th>ID</th>
							<th>Status</th>
							<th>User</th>
							<th title="Alcedo Member">A. M.</th>
							<th>Currency</th>
							<th>Country</th>
							<th>Brunch</th>
							<th>Housing</th>
							<th title="Outreach Support">O. S.</th>
							<th title="Outreach Request">O. R.</th>
							<th>Note</th>
							<th>Created</th>
							<th>Updated</th>
						</tr>
						</thead>
						<tbody>
						@foreach (App\RegistrationSport::whereSportId($sportId)->get() as $sportReg)
							<tr>
								<td>
									<a href="{{ url('/admin/registration?id=' . $sportReg->registration->id) }}">#{{ $sportReg->registration->id }}</a>
								</td>
								<td>{{ $sportReg->registration->registrationStatus->name }}</td>
								<td>{{ $sportReg->registration->user->name }}</td>
								<td>{{ $sportReg->registration->user->is_member ? 'Yes' : 'No' }}</td>
								<td>{{ $sportReg->registration->user->currency ? $sportReg->registration->user->currency->iso  : '' }}</td>
								<td>{{ $sportReg->registration->user->country ? $sportReg->registration->user->country->name : '' }}</td>

								<td>{{ $sportReg->registration->brunch ? 'Yes' : 'No' }}</td>
								<td>{{ $sportReg->registration->hosted_housing ? 'Yes' : 'No' }}</td>
								<td>{{ $sportReg->registration->outreach_support }}</td>
								<td>{{ $sportReg->registration->outreach_request ? 'Yes' : 'No' }}</td>
								<td>
									@if (!empty($sportReg->registration->note))
										<span data-toggle="popover" data-trigger="hover" data-placement="bottom"
											  data-content="{{$sportReg->registration->note}}">
								note
							</span>
									@endif
								</td>
								<td>{{ $sportReg->registration->created_at }}</td>
								<td>{{ $sportReg->registration->updated_at }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				@endif
			</div>
		</div>
	</div>
@endsection
