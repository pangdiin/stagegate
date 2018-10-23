
<div class="card-body">
  
  <div class="form-group">
      <label class="form-control-label" for="code">Code</label>
      <input type="text" class="form-control" name="code"  required="" id="code" value="{{ isset($model) ? $model->code : old('code') }}">
      @if ($errors->has('code'))
        <span class="text-danger">{{ $errors->first('code') }}</span>
      @endif
  </div>

  <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
    <label for="name" class="form-control-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" required="" value="{{ isset($model) ? $model->name : old('name') }}">
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
  </div>

  <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
    <label for="description" class="form-control-label">Description</label>
    <input type="text" class="form-control" name="description" required="" id="description" value="{{ isset($model) ? $model->description : old('description') }}">
    @if ($errors->has('description'))
      <span class="text-danger">{{ $errors->first('description') }}</span>
    @endif
  </div>

</div>
