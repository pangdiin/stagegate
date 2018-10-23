
<div class="card-body">
  
  <div class="form-group">
      <label class="form-control-label" for="first_name">First Name</label>
      <input type="text" class="form-control" name="first_name"  required="" id="first_name" value="{{ isset($model) ? $model->first_name : old('first_name') }}">
      @if ($errors->has('first_name'))
        <span class="text-danger">{{ $errors->first('first_name') }}</span>
      @endif
  </div>

  <div class="form-group">
      <label class="form-control-label" for="middle_name">Middle Name</label>
      <input type="text" class="form-control" name="middle_name"  required="" id="middle_name" value="{{ isset($model) ? $model->middle_name : old('middle_name') }}">
      @if ($errors->has('middle_name'))
        <span class="text-danger">{{ $errors->first('middle_name') }}</span>
      @endif
  </div>

  <div class="form-group">
      <label class="form-control-label" for="last_name">Last Name</label>
      <input type="text" class="form-control" name="last_name"  required="" id="last_name" value="{{ isset($model) ? $model->last_name : old('last_name') }}">
      @if ($errors->has('last_name'))
        <span class="text-danger">{{ $errors->first('last_name') }}</span>
      @endif
  </div>

    <label class="form-control-label" for="role">Assign Roles</label>
    <select class="custom-select select2" multiple="multiple" id="role" name="roles[]">
        @foreach($roles as $role)
          <option value="{{ $role->id }}" {{ (isset($model) ? ($model->roles->contains($role->id) ? 'selected' : '') : '') }}>{{ $role->name }}</option>
        @endforeach
    </select>
  
    <label class="form-control-label" for="category">Assign Categories</label>
    <select class="custom-select select2" multiple="multiple" id="category" name="category[]">
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ (isset($model) ? ($model->categories->contains($category->id) ? 'selected' : '') : '') }}>{{ $category->name }}</option>
        @endforeach
    </select>

  <div class="form-group">
      <label class="form-control-label" for="company">Company</label>
      <select class="custom-select" id="company" required="" name="company_id">
        <option selected value="" >Please Select</option>
        @foreach($companies as $company)
            <option value="{{ $company->id }}" {{ (isset($model) ? ($model->company_id == $company->id ? 'selected' : '') : '') }}>{{ $company->name }}</option>
        @endforeach
    </select>
  </div>

  <div class="form-group">
      <label class="form-control-label" for="department">Department</label>
      <select class="custom-select" id="department" required="" name="department_id">
        <option selected value="">Please Select</option>
        @foreach($departments as $department)
            <option value="{{ $department->id }}" {{ (isset($model) ? ($model->department_id == $department->id ? 'selected' : '') : '') }}>{{ $department->name }}</option>
        @endforeach
    </select>
  </div>

 
</div>
