
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	<label for="{{ $name }}" class="col-md-4 control-label">{{ $title }}</label>

	<div class="col-md-4">
		<select id="{{ $name }}" class="form-control" name="{{ $name }}">
			@for ($i = 1; $i <= 16; $i++)
				<option value="{{ $i }}" {{ old($name) == $i ? ' selected' : '' }}>
					{{ $i }} person{{ $i > 1 ? 's' : ''}}
				</option>
			@endfor
		</select>

		@if ($errors->has($name))
			<span class="help-block">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
		@endif
	</div>
</div>
