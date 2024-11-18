<div class="col-xxl-6 mb-25">
  <div class="card border-0 h-100">
    <div class="card-header border-0 pb-md-0 pb-20">
      <h4>Sales Reports</h4>
      <div class="card-extra">
        <div class="dropdown dropleft">
          <a href="#" role="button" id="else" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('assets/img/svg/more-horizontal.svg') }}" alt="more-horizontal" class="svg">
          </a>
          <div class="dropdown-menu" aria-labelledby="else">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body pt-0 pb-25 mt-n10">
      <div class="label-detailed">
        <div class="label-detailed__single"><span class="label-detailed__type label-detailed__type--primary">Orders</span> 
        <strong class="label-detailed__total">$8,550</strong> 
        <span class="label-detailed__status color-success">
          <img src="{{ asset('assets/img/svg/arrow-success-up.svg') }}" class="svg">
          <strong>25%</strong>
        </span> 
      </div>
        <div class="label-detailed__single"><span class="label-detailed__type label-detailed__type--info">Sales</span> <strong class="label-detailed__total">$5,550</strong> <span class="label-detailed__status color-danger">
        <img src="{{ asset('assets/img/svg/arrow-danger-down.svg') }}" class="svg">
           <strong>15%</strong></span> </div>
      </div>
      <div class="parentContainer position-relative">


        <div>
          <canvas id="salesReports"></canvas>
        </div>


      </div>
    </div>
  </div>
</div>