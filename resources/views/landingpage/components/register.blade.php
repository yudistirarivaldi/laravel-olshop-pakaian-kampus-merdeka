<link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('landing/css/auth.css')}}">


<div class="">
    <div class="container">

        <div class="my-5">
            <span class="d-flex justify-content-center  display-4 font-weight-bold">
                <a href="{{ url('/')}}" class="text-logo text-none">Trixie</a>
            </span>
        </div>
            <div class="row">
              <div class="col-lg-7 mx-auto">
                <div class="bg  rounded-lg shadow-lg p-5">

                  <!-- Register -->
                  <div class="tab-content">
                    <!--  Register -->
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <p class="text-center text-form text-monospace font-weight-light">Register to Join with Us</p>
                      <form role="form ">
                        <div class="form-group text-form-label">
                          <label for="username">Nama</label>
                          <input type="text" name="username" placeholder="your name" required class="form-control">
                        </div>
                        <div class="form-group text-form-label">
                            <label for="username">Email</label>
                            <input type="text" name="username" placeholder="email" required class="form-control">
                          </div>
                        <div class="form-group text-form-label">
                          <label for="cardNumber">Password</label>
                          <div class="form-group">
                            <input type="text" name="username" placeholder="password" required class="form-control">
                          </div>
                        </div>
                        <div class="form-group text-form-label">
                            <label for="cardNumber">Confirm Password</label>
                            <div class="form-group">
                              <input type="text" name="username" placeholder="confirm password" required class="form-control">
                            </div>
                          </div>

                        <button type="button" class="subscribe btn mt-4 btn-mate btn-block rounded-pill shadow-sm">Register</button>
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
