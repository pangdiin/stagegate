@extends('backend.layouts.app')

@section('title')
Roles
@endsection

@push('styles')
	<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endpush

@section('breadcrumb-links')
	@include('backend.permissions.breadcrumbs')
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		  <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-5">
                <h3 class="card-title">Create Permission</h3>
              </div>
              <div class="col-7">
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-danger pull-right" data-toggle="tooltip" title="Back">
                    <i class="fa fa-arrow-left"></i>
                </a>
              </div>
            </div>
          </div>

          <form method="POST" action="{{ route('admin.permissions.store') }}">
            @csrf
            @include('backend.permissions.fields')
            
            <div class="card-footer">
              <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </div>
          </form>
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
