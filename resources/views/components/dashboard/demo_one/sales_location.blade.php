<div class="col-xxl-8 mb-25">

    <div class="card border-0 h-100">
      <div class="card-header">
        <h6>Sales by Location</h6>
        <div class="card-extra">
          <ul class="card-tab-links nav-tabs nav" role="tablist">
            <li>
              <a href="#se_region-today" class="active" data-bs-toggle="tab" id="se_region-today-tab" role="tab" aria-selected="true">Today</a>
            </li>
            <li>
              <a href="#se_region-week" data-bs-toggle="tab" id="se_region-week-tab" role="tab" aria-selected="false">Week</a>
            </li>
            <li>
              <a href="#se_region-month" data-bs-toggle="tab" id="se_region-month-tab" role="tab" aria-selected="false">Month</a>
            </li>
            <li>
              <a href="#se_region-year" data-bs-toggle="tab" id="se_region-year-tab" role="tab" aria-selected="false">Year</a>
            </li>
          </ul>
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
      <div class="card-body pt-sm-30 pb-sm-50 pb-30">
        <div class="tab-content">
          <div class="tab-pane active show" id="se_region-today" role="tabpanel" aria-labelledby="se_region-today-tab">
            <div class="row">
              <div class="col-md-6">

                <div class="table-responsive table-top-regions">
                  <table class="table table--default table-borderless">
                    <thead>
                      <tr>
                        <th>Top region</th>
                        <th>order</th>
                        <th>Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>United States</td>
                        <td>90</td>
                        <td>$536</td>
                      </tr>
                      <tr>
                        <td>Australia</td>
                        <td>70</td>
                        <td>$573</td>
                      </tr>
                      <tr>
                        <td>Canada</td>
                        <td>30</td>
                        <td>$457</td>
                      </tr>
                      <tr>
                        <td>Japan</td>
                        <td>50</td>
                        <td>$524</td>
                      </tr>
                      <tr>
                        <td>India</td>
                        <td>20</td>
                        <td>$354</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
              <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="regions-svg">
                  <div id="s_region-map_T"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="se_region-week" role="tabpanel" aria-labelledby="se_region-week-tab">
            <div class="row">
              <div class="col-md-6">

                <div class="table-responsive table-top-regions">
                  <table class="table table--default table-borderless">
                    <thead>
                      <tr>
                        <th>Top region</th>
                        <th>order</th>
                        <th>Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>United States</td>
                        <td>90</td>
                        <td>$536</td>
                      </tr>
                      <tr>
                        <td>Australia</td>
                        <td>70</td>
                        <td>$573</td>
                      </tr>
                      <tr>
                        <td>Canada</td>
                        <td>30</td>
                        <td>$457</td>
                      </tr>
                      <tr>
                        <td>Japan</td>
                        <td>50</td>
                        <td>$524</td>
                      </tr>
                      <tr>
                        <td>India</td>
                        <td>20</td>
                        <td>$354</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
              <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="regions-svg">
                  <div id="s_region-map_W"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="se_region-month" role="tabpanel" aria-labelledby="se_region-month-tab">
            <div class="row">
              <div class="col-md-6">

                <div class="table-responsive table-top-regions">
                  <table class="table table--default table-borderless">
                    <thead>
                      <tr>
                        <th>Top region</th>
                        <th>order</th>
                        <th>Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>United States</td>
                        <td>90</td>
                        <td>$536</td>
                      </tr>
                      <tr>
                        <td>Australia</td>
                        <td>70</td>
                        <td>$573</td>
                      </tr>
                      <tr>
                        <td>Canada</td>
                        <td>30</td>
                        <td>$457</td>
                      </tr>
                      <tr>
                        <td>Japan</td>
                        <td>50</td>
                        <td>$524</td>
                      </tr>
                      <tr>
                        <td>India</td>
                        <td>20</td>
                        <td>$354</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
              <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="regions-svg">
                  <div id="s_region-map_M"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="se_region-year" role="tabpanel" aria-labelledby="se_region-year-tab">
            <div class="row">
              <div class="col-md-6">

                <div class="table-responsive table-top-regions">
                  <table class="table table--default table-borderless">
                    <thead>
                      <tr>
                        <th>Top region</th>
                        <th>order</th>
                        <th>Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>United States</td>
                        <td>90</td>
                        <td>$536</td>
                      </tr>
                      <tr>
                        <td>Australia</td>
                        <td>70</td>
                        <td>$573</td>
                      </tr>
                      <tr>
                        <td>Canada</td>
                        <td>30</td>
                        <td>$457</td>
                      </tr>
                      <tr>
                        <td>Japan</td>
                        <td>50</td>
                        <td>$524</td>
                      </tr>
                      <tr>
                        <td>India</td>
                        <td>20</td>
                        <td>$354</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
              <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="regions-svg">
                  <div id="s_region-map_Y"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>