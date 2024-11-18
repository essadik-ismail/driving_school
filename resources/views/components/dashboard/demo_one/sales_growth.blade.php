<div class="col-xxl-4 mb-25">

              <div class="card border-0 px-25 h-100">
                <div class="card-header px-0 border-0">
                  <h6>Sales Growth</h6>
                  <div class="card-extra">
                    <ul class="card-tab-links nav-tabs nav" role="tablist">
                      <li>
                        <a class="active" href="#salesgrowth" data-bs-toggle="tab" id="salesgrowth-tab" role="tab" aria-selected="true">Today</a>
                      </li>
                      <li>
                        <a href="#salesgrowth2" data-bs-toggle="tab" id="salesgrowth2-tab" role="tab" aria-selected="false">Week</a>
                      </li>
                      <li>
                        <a href="#salesgrowth3" data-bs-toggle="tab" id="salesgrowth3-tab" role="tab" aria-selected="false">Month</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card-body p-0 pb-sm-25">
                  <div class="tab-content">
                    <div class="tab-pane active show" id="salesgrowth" role="tabpanel" aria-labelledby="salesgrowth-tab">
                      <div class="label-detailed label-detailed--two">
                        <div class="label-detailed__single"><strong class="label-detailed__total">$8,550</strong> <span class="label-detailed__status color-success"><img src="{{ asset('assets/img/svg/arrow-success-up.svg') }}" class="svg"> <strong>25%</strong></span> </div>
                        
                        <div class="label-detailed__single"><strong class="label-detailed__total">$5,550</strong> <span class="label-detailed__status color-danger"><img src="{{ asset('assets/img/svg/arrow-danger-down.svg') }}" class="svg"> <strong>15%</strong></span> </div>
                        
                      </div>
                      <div class="parentContainer">


                        <div>
                          <canvas id="salesGrowthToday"></canvas>
                        </div>


                      </div>
                    </div>
                    <div class="tab-pane" id="salesgrowth2" role="tabpanel" aria-labelledby="salesgrowth2-tab">
                      <div class="label-detailed label-detailed--two">
                        <div class="label-detailed__single"><strong class="label-detailed__total">$8,550</strong> <span class="label-detailed__status color-success">
                        <img src="{{ asset('assets/img/svg/arrow-success-up.svg') }}" class="svg">
                           <strong>25%</strong></span> </div>
                        <div class="label-detailed__single"><strong class="label-detailed__total">$5,550</strong> <span class="label-detailed__status color-danger">
                        <img src="{{ asset('assets/img/svg/arrow-danger-down.svg') }}" class="svg">
                           <strong>15%</strong></span> </div>
                      </div>
                      <div class="parentContainer">


                        <div>
                          <canvas id="salesGrowthWeek"></canvas>
                        </div>


                      </div>
                    </div>
                    <div class="tab-pane" id="salesgrowth3" role="tabpanel" aria-labelledby="salesgrowth3-tab">
                      <div class="label-detailed label-detailed--two">
                        <div class="label-detailed__single"><strong class="label-detailed__total">$8,550</strong> <span class="label-detailed__status color-success">
                          <img src="{{ asset('assets/img/svg/arrow-success-up.svg') }}" class="svg">
                           <strong>25%</strong></span> </div>
                        <div class="label-detailed__single"><strong class="label-detailed__total">$5,550</strong> <span class="label-detailed__status color-danger">
                        <img src="{{ asset('assets/img/svg/arrow-danger-down.svg') }}" class="svg">
                           <strong>15%</strong></span> </div>
                      </div>
                      <div class="parentContainer">


                        <div>
                          <canvas id="salesGrowthMonth"></canvas>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>