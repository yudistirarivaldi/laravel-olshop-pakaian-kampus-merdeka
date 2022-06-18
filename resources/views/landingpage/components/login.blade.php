<link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('landing/css/auth.css')}}">


<div class="">
    <div class="container py-5">

        <div class="my-5">
            <span class="d-flex justify-content-center  display-4 font-weight-bold">
                <a href="{{ url('/')}}" class="text-logo text-none">Trixie</a>
            </span>
        </div>
            <div class="row">
              <div class="col-lg-7 mx-auto">
                <div class="bg  rounded-lg shadow-lg p-5">

                  <!-- Login -->
                  <div class="tab-content my-3">
                    <!--  Login -->
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <p class="text-center text-form text-monospace font-weight-light">Login to Buy all of product on this website</p>
                      <form role="form">
                        <div class="form-group text-form-label">
                          <label for="username">Email</label>
                          <input type="text" name="username" placeholder="Email" required class="form-control">
                        </div>
                        <div class="form-group text-form-label">
                          <label for="cardNumber">Password</label>
                          <div class="form-group">
                            <input type="text" name="username" placeholder="Password" required class="form-control">
                          </div>
                        </div>

                        <button type="button" class="subscribe my-5 btn btn-mate btn-block rounded-pill shadow-sm">Login</button>
                      </form>
                    </div>
                    <!-- End -->

                  </div>
                  <!-- End -->

                </div>
              </div>
            </div>
        </div>
</div>
