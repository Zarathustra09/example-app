@extends('layouts.app')

@section('content')

<div class="container-fluid">
   
    <div class="header-body">
      <div class="row">
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Annual Collection</h5>
                  <span class="h2 font-weight-bold mb-0"> ₱ {{$annualCollection}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                    <i class="fas fa-chart-bar"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-warning mr-2">
                    @if($percentageChangeAnnualCollection > 0)
                        <i class="fas fa-arrow-up"></i> {{ number_format($percentageChangeAnnualCollection, 2) }}%
                    @elseif($percentageChangeAnnualCollection < 0)
                        <i class="fas fa-arrow-down"></i> {{ number_format(abs($percentageChangeAnnualCollection), 2) }}%
                    @else
                        <i class="fas fa-arrow-right"></i> 0.00%
                    @endif
                </span>
                <span class="text-nowrap">Since last month</span>
            </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Monthly Collection</h5>
                  <span class="h2 font-weight-bold mb-0">₱ {{$monthlyCollection}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-chart-pie"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-warning mr-2">
                    @if($percentageChangeCollection > 0)
                        <i class="fas fa-arrow-up"></i> {{ number_format($percentageChangeCollection, 2) }}%
                    @elseif($percentageChangeCollection < 0)
                        <i class="fas fa-arrow-down"></i> {{ number_format(abs($percentageChangeCollection), 2) }}%
                    @else
                        <i class="fas fa-arrow-right"></i> 0.00%
                    @endif
                </span>
                <span class="text-nowrap">Since last month</span>
            </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">New Members</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $newUsersCount }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-warning mr-2">
                    @if($percentageChange > 0)
                        <i class="fas fa-arrow-up"></i> {{ number_format($percentageChange, 2) }}%
                    @elseif($percentageChange < 0)
                        <i class="fas fa-arrow-down"></i> {{ number_format(abs($percentageChange), 2) }}%
                    @else
                        <i class="fas fa-arrow-right"></i> 0.00%
                    @endif
                </span>
                <span class="text-nowrap">Since last month</span>
            </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">New Organizations</h5>
                  <span class="h2 font-weight-bold mb-0">49,65%</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                    <i class="fas fa-percent"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                <span class="text-nowrap">Since last month</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  




@endsection
