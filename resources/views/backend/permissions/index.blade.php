@extends('backend.layouts.app')

@section('title')
Category
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
                <h3 class="card-title">Permissions</h3>
              </div>
              <div class="col-7">
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-success pull-right" data-toggle="tooltip" title="Create Roles">
                    <i class="fa fa-plus-circle"></i>
                </a>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="content-table" class="table table-condensed table-hover table-responsive-mobile">
		            <thead>
		                <tr>
		                    <th>ID</th>
		                    <th>Name</th>
                        <th>Actions</th>
		                </tr>
		            </thead>
		            <tbody>
		            </tbody>
		        </table>
          </div>
      </div>
	</div>
</div>

@endsection

@push('scripts')

<script src="{{ asset('DataTables/datatables.min.js') }}"></script>

<script>
  $(document).ready( function () {

      oTable = $('#content-table').DataTable({
              "processing": true,
              "serverSide": true,
              scrollY: '50vh',
              ajax: {
                  url: "{{ route('admin.permissions.data') }}",
                  type: 'get',
              },
              "columns": [
                   {
                    data: 'id', name: 'id'
                   },
                   {
                    data: 'name', name: 'name'
                   },
                   {
                      data: 'actions', name: 'actions' ,sortable:false,
                      'render': function(data) {
                        return renderLinkActions(data);
                      }
                   },
              ],
              "aLengthMenu": [ [20, 50,100], [20, 50,100] ],
              "iDisplayLength" : 20 ,
              "responsive": true,
              "searchable": true
         });  
  });

</script>
@endpush
