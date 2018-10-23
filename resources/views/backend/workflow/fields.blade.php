
<div class="card-body">

  <div class="form-group">
      <label class="form-control-label" for="sort_order">Sort Order</label>
      <input type="number" class="form-control" name="sort_order"  required="" id="sort_order" value="{{ isset($model) ? $model->sort_order : old('sort_order') }}">
      @if ($errors->has('sort_order'))
        <span class="text-danger">{{ $errors->first('sort_order') }}</span>
      @endif
  </div>
  
  <div class="form-group">
    <label class="form-control-label" for="role">Current Role Owner</label>
    <select class="custom-select select2 form-control" multiple="multiple" id="role" name="currentowners[]">
        @foreach($roles as $role)
          <option value="{{ $role }}" {{ (isset($model) ? ($model->currentRoleOwner->pluck('user_role')->contains($role) ? 'selected' : '') : '') }}>{{ $role }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group mt-3">
      <label class="form-control-label" for="company">Stage</label>
      <select class="custom-select" id="stage" required="" name="stage_id">
        <option selected value="" >Please Select</option>
        @foreach($stages as $stage)
            <option value="{{ $stage->id }}" {{ (isset($model) ? ($model->stage_id == $stage->id ? 'selected' : '') : '') }}>{{ $stage->name }} - {{ $stage->description }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
      <label class="form-control-label" for="substage">Sub Stage</label>
      <select class="custom-select" id="substage" required="" name="substage_id">
        <option selected value="" >Please Select</option>
        @foreach($stages as $stage)
            <option value="{{ $stage->id }}" {{ (isset($model) ? ($model->substage_id == $stage->id ? 'selected' : '') : '') }}>{{ $stage->name }} - {{ $stage->description }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
      <label class="form-control-label" for="action">Action</label>
      <select class="custom-select" id="action" required="" name="action_id">
        <option selected value="" >Please Select</option>
        @foreach($actions as $action)
            <option value="{{ $action->id }}" {{ (isset($model) ? ($model->action_id == $action->id ? 'selected' : '') : '') }}>{{ $action->name }} - {{ $action->description }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
    <label class="form-control-label" for="nextroles">Next Role Owner</label>
    <select class="custom-select select2 form-control" multiple="multiple" id="nextroles" name="nextowners[]">
        @foreach($roles as $role)
          <option value="{{ $role }}" {{ (isset($model) ? ($model->nextRoleOwner->pluck('user_role')->contains($role) ? 'selected' : '') : '') }}>{{ $role }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group mt-3">
      <label class="form-control-label" for="nextstage">Next Stage</label>
      <select class="custom-select" id="nextstage" required="" name="nextstage_id">
        <option selected value="" >Please Select</option>
        @foreach($stages as $stage)
            <option value="{{ $stage->id }}" {{ (isset($model) ? ($model->nextstage_id == $stage->id ? 'selected' : '') : '') }}>{{ $stage->name }} - {{ $stage->description }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
      <label class="form-control-label" for="nextsubstage">Next Sub Stage</label>
      <select class="custom-select" id="nextsubstage" required="" name="nextsubstage_id">
        <option selected value="" >Please Select</option>
        @foreach($stages as $stage)
            <option value="{{ $stage->id }}" {{ (isset($model) ? ($model->nextsubstage_id == $stage->id ? 'selected' : '') : '') }}>{{ $stage->name }} - {{ $stage->description }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
      <label class="form-control-label" for="nextaction">Next Action</label>
      <select class="custom-select" id="nextaction" required="" name="nextaction_id">
        <option selected value="" >Please Select</option>
        @foreach($actions as $action)
            <option value="{{ $action->id }}" {{ (isset($model) ? ($model->nextaction_id == $action->id ? 'selected' : '') : '') }}>{{ $action->name }} - {{ $action->description }}</option>
        @endforeach
    </select>
  </div>

</div>
