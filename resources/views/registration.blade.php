@extends('layouts.app')

@section('content')
@include('helper.panel_top')

<div class="panel-heading">Select events you want to participate in</div>

<div class="panel-body">
    @include('form.errors')

    <form class="form-horizontal" role="form" method="POST">
        {{ csrf_field() }}
        <div class="form-group days">
			@foreach(['saturday' => 'Saturday', 'sunday' => 'Sunday', 'monday' => 'Monday', 'all' => ''] as $day => $dayTitle)
				<div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1 {{ $day }}">
					<div class="col-md-4">{{ $dayTitle }}</div>
					<div class="col-md-8">
						@foreach ($sports->where('day', $day) as $sport)
							<div class="checkbox {{ $sport->status_id == \App\Status::DISABLED ? 'disabled' : '' }}">
								<label @if($sport->title) data-toggle="tooltip" title="{{ $sport->title }}" @endif>
									<input
											name="sports[]"
											type="checkbox"
											value="{{ $sport->id }}"
											{{ in_array($sport->id, old('sports', $defaultSports)) ? ' checked' : '' }}
											{{ $sport->status_id == \App\Status::DISABLED ? 'disabled' : '' }}
									>
									{{ $sport->id == \App\Sport::VISITOR ? "I'm a visitor only" : $sport->name }}
								</label>
							</div>
						@endforeach
					</div>
				</div>
			@endforeach
		</div>

        @include('form.footer', ['back' => '/personal'])
    </form>
</div>

@include('helper.panel_bottom')
@endsection
