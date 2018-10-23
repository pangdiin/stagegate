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
                <h3 class="card-title">Users</h3>
              </div>
              <div class="col-7">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success pull-right" data-toggle="tooltip" title="Create Company">
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Department</th>
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
                  url: "{{ route('admin.users.data') }}",
                  type: 'get',
              },
              "columns": [
                   {
                    data: 'id', name: 'id'
                   },
                   {
                    data: 'first_name', name: 'first_name'
                   },
                   {
                    data: 'last_name', name: 'last_name'
                   },
                   {
                    data: 'company', name: 'company'
                   },
                   {
                    data: 'department', name: 'department'
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
