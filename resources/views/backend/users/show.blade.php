@extends('backend.layouts.app')

@section('title')
Category
@endsection

@push('styles')
	<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endpush

@section('breadcrumb-links')
	@include('backend.users.breadcrumbs')
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		  <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-5">
                <h3 class="card-title">Overview</h3>
              </div>
              <div class="col-7">
                <div class="btn-group pull-right">
                  <a href="{{ route('admin.users.index') }}" class="btn btn-danger btn-flat" data-toggle="tooltip" title="Back">
                      <i class="fa fa-arrow-left"></i>
                  </a>
                  <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-flat" data-toggle="tooltip" title="User Create">
                      <i class="fa fa-plus-circle"></i>
                  </a>
                  <a href="{{ route('admin.users.edit', $model) }}" class="btn btn-info btn-flat" data-toggle="tooltip" title="User Edit">
                      <i class="fa fa-pencil"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table">
                      <tr>
                          <th class="border-0">First Name</th>
                          <td class="border-0">{{ $model->first_name }}</td>
                      </tr>
                      <tr>
                          <th class="border-0">Middle Name</th>
                          <td class="border-0">{{ $model->middle_name }}</td>
                      </tr>
                      <tr>
                          <th class="border-0">Last Name</th>
                          <td class="border-0">{{ $model->last_name }}</td>
                      </tr>
                      <tr>
                          <th class="border-0">Company</th>
                          <td class="border-0">{{ $model->company->name }}</td>
                      </tr>
                      <tr>
                          <th class="border-0">Roles</th>
                          <td class="border-0">{{ transformToLabels($model->getRoleNames()) }}</td>
                      </tr>
                      <tr>
                          <th class="border-0">Categories</th>
                          <td class="border-0">{{ count($model->categories) ?transformToLabels($model->categories->pluck('name')) : '' }}</td>
                      </tr>
                  </table>
              </div>
          </div>
      </div>
	</div>
</div>

@endsection

@push('scripts')

<script>
  $(document).ready( function () {
      
  });
</script>
@endpush
