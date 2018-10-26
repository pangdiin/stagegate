@extends('backend.layouts.app')

@section('title')
Category
@endsection

@push('styles')
	<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endpush

@section('breadcrumb-links')
	@include('stages.idea.breadcrumbs')
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		  <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-5">
                <h3 class="card-title">Ideas</h3>
              </div>
              <div class="col-7">
                <a href="{{ route('stages.ideas.create') }}" class="btn btn-success pull-right" data-toggle="tooltip" title="Create Ideas">
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
                        <th>Owner</th>
                        <th>Company</th>
                        <th>Category</th>
                        <th>Product Concept</th>
                        <th>Product Description</th>
                        <th>Oppurtunities</th>
                        <th>Competition</th>
                        <th>Retail Price</th>
                        <th>Action</th>
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
                  url: "{{ route('stages.ideas.data') }}",
                  type: 'get',
              },
              "columns": [
                   {
                    data: 'id', name: 'id'
                   },
                   {
                    data: 'owner', name: 'owner'
                   },
                   {
                    data: 'company', name: 'company'
                   },
                   {
                    data: 'category', name: 'category'
                   },
                   {
                    data: 'product_concept', name: 'product_concept'
                   },
                   {
                    data: 'product_description', name: 'product_description'
                   },
                   {
                    data: 'opportunities', name: 'opportunities'
                   },
                   {
                    data: 'competition', name: 'competition'
                   },
                   {
                    data: 'retail_price', name: 'retail_price'
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


