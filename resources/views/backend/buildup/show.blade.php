@extends('backend.layouts.app')

@section('title')
Category
@endsection

@push('styles')
	<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endpush

@section('breadcrumb-links')
	@include('backend.buildup.breadcrumbs')
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
                  <a href="{{ route('admin.buildup.index') }}" class="btn btn-danger btn-flat" data-toggle="tooltip" title="Back">
                      <i class="fa fa-arrow-left"></i>
                  </a>
                  <a href="{{ route('admin.buildup.create') }}" class="btn btn-success btn-flat" data-toggle="tooltip" title="Department Create">
                      <i class="fa fa-plus-circle"></i>
                  </a>
                  <a href="{{ route('admin.buildup.edit', $model) }}" class="btn btn-info btn-flat" data-toggle="tooltip" title="Department Edit">
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
                          <th class="border-0">Code</th>
                          <td class="border-0">{{ $model->code }}</td>
                      </tr>
                      <tr>
                          <th class="border-0">Name</th>
                          <td class="border-0">{{ $model->name }}</td>
                      </tr>
                      <tr>
                          <th class="border-0">Description</th>
                          <td class="border-0">{{ $model->description }}</td>
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
