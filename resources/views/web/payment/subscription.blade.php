@extends('layouts.web')
  
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Subscription</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user/new">Home</a></li>
                    <li class="breadcrumb-item active">Subscription</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<!-- End All Title Box -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Select Plane:</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($plans as $plan)
                            <div class="col-md-6">
                                <div class="card mb-3">
                                  <div class="card-header"> 
                                        ${{ $plan->price }}/Mo
                                  </div>
                                  <div class="card-body">
                                    <h5 class="card-title">{{ $plan->name }}</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  
                                    <a href="{{ route('web.subscription.show', $plan->id) }}" class="btn btn-primary pull-right">Choose</a>
  
                                  </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection