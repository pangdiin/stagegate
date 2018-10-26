@extends('backend.layouts.app')

@section('title')
Category
@endsection

@push('styles')
	<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endpush

@section('breadcrumb-links')
	@include('assessment.breadcrumbs')
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		  <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-scoring" role="tab" aria-controls="pills-home" aria-selected="true">
                    Scoring
                      <span class="badge badge-success">3</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-prioritization" role="tab" aria-controls="pills-profile" aria-selected="false">Prioritization
                      <span class="badge badge-success">3</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-feasibility" role="tab" aria-controls="pills-contact" aria-selected="false">Feasibility
                      <span class="badge badge-success">3</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-development" role="tab" aria-controls="pills-contact" aria-selected="false">Development
                      <span class="badge badge-success">3</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-testmarket" role="tab" aria-controls="pills-contact" aria-selected="false">Test Market
                      <span class="badge badge-success">3</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-fullLaunch" role="tab" aria-controls="pills-contact" aria-selected="false">Full Launch
                      <span class="badge badge-success">3</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-scoring" role="tabpanel" aria-labelledby="pills-home-tab">
                  @include('assessment.tables.scoring.index')
                </div>
                <div class="tab-pane fade" id="pills-prioritization" role="tabpanel" aria-labelledby="pills-profile-tab">
                  @include('assessment.tables.prioritization.index')
                </div>
                <div class="tab-pane fade" id="pills-feasibility" role="tabpanel" aria-labelledby="pills-contact-tab">
                  @include('assessment.tables.feasibility.index')
                </div>
                <div class="tab-pane fade" id="pills-development" role="tabpanel" aria-labelledby="pills-contact-tab">
                  @include('assessment.tables.development.index')
                </div>
                <div class="tab-pane fade" id="pills-testmarket" role="tabpanel" aria-labelledby="pills-contact-tab">
                  @include('assessment.tables.testmarket.index')
                </div>
                <div class="tab-pane fade" id="pills-fullLaunch" role="tabpanel" aria-labelledby="pills-contact-tab">
                  @include('assessment.tables.fulllaunch.index')
                </div>
              </div>
          </div>
      </div>
	</div>
</div>

@endsection

@push('scripts')

<script src="{{ asset('DataTables/datatables.min.js') }}"></script>

@include('assessment.tables.scripts')

@endpush


