
<div class="card-body">
  
  <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
    <label for="name" class="form-control-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" required="" value="{{ isset($model) ? $model->name : old('name') }}">
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
  </div>

  @foreach($roles as $role)
	<div class="form-check-inline">
	  <label class="form-check-label">
	    <input type="checkbox" class="form-check-input" name="roles[]" value="{{ $role->id }}" {{ (isset($model) ? ($model->hasRole($role->name) ? 'checked' : '') : '') }}
	    >
	    {{ $role->name }}
	  </label>
	</div><br>
@endforeach

</div>
