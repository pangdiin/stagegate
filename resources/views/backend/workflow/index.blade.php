@extends('backend.layouts.app')

@section('title')
Category
@endsection

@push('styles')
	<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endpush

@section('breadcrumb-links')
	@include('backend.workflow.breadcrumbs')
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		  <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-5">
                <h3 class="card-title">Workflow Master</h3>
              </div>
              <div class="col-7">
                <a href="{{ route('admin.workflow.create') }}" class="btn btn-success pull-right" data-toggle="tooltip" title="Create Company">
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
		                    <th>Sort Order</th>
                        <th>Current Owner</th>
		                    <th>Stage</th>
		                    <th>Substage</th>
                        <th>Action</th>
                        <th>Next Owner</th>
                        <th>Next Stage</th>
                        <th>Next Substage</th>
                        <th>Next Action</th>
                        <th>Status</th>
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
                  url: "{{ route('admin.workflow.data') }}",
                  type: 'get',
              },
              "columns": [
                   {
                    data: 'id', name: 'id'
                   },
                   {
                    data: 'sort_order', name: 'sort_order'
                   },
                   {
                    data: 'current_owner', name: 'current_owner'
                   },
                   {
                    data: 'stage_id', name: 'stage_id'
                   },
                   {
                    data: 'substage_id', name: 'substage_id'
                   },
                   {
                    data: 'action_id', name: 'action_id'
                   },
                   {
                    data: 'next_owner', name: 'next_owner'
                   },
                   {
                    data: 'nextstage_id', name: 'nextstage_id'
                   },
                   {
                    data: 'nextsubstage_id', name: 'nextsubstage_id'
                   },
                   {
                    data: 'nextaction_id', name: 'nextaction_id'
                   },
                   {
                    data: 'active', name: 'active'
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
