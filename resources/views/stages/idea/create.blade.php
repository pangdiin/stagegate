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
      <idea-create 
      :companies="{{ $companies->toJson() }}"
      :categories="{{ $categories->toJson() }}"
      :secs="{{ $secs->toJson() }}"
      :demographics="{{ $demographics->toJson() }}"
      :distributions="{{ $distributions->toJson() }}"/>
	</div>
</div>

@endsection

