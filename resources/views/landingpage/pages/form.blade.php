@extends('landingpage.index')

@section('content')
<div class="product-detail spad">
    <div class="d-flex justify-content-center mb-5">
        <h4 class="font-weight-bolder text-monoscope text-pyche ">Form Transaction</h4>
        <div class="line"></div>
    </div>
    <div class="container">
                <form>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group font-weight-bolder text-monoscope">
                                <label for="text">Name</label>
                                <input id="text" name="text" placeholder="your name .." type="text" required="required" class="form-control">
                              </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group font-weight-bolder text-monoscope">
                                <label for="text1">Email</label>
                                <input id="text1" name="text1" placeholder="your email .." type="text" class="form-control">
                              </div>
                        </div>
                    </div>
                    <div class="form-group font-weight-bolder text-monoscope">
                      <label for="text2">Phone</label>
                      <input id="text2" name="text2" placeholder="phone number" type="text" class="form-control">
                    </div>
                    <div class="form-group font-weight-bolder text-monoscope">
                      <label for="select">Courier</label>
                      <div>
                        <select id="select" name="select" required="required" class="custom-select">
                          <option value="rabbit">FEDEX</option>
                          <option value="duck">Blog</option>
                          <option value="fish">JNE</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group font-weight-bolder text-monoscope">
                      <label for="select1">Payment</label>
                      <div>
                        <select id="select1" name="select1" required="required" class="custom-select">
                          <option value="rabbit">PayPall</option>
                          <option value="duck">BCA</option>
                          <option value="fish">BNI</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group font-weight-bolder text-monoscope">
                      <label for="textarea">Alamat</label>
                      <textarea id="textarea" name="textarea" cols="40" rows="4" aria-describedby="textareaHelpBlock" required="required" class="form-control"></textarea>
                      <span id="textareaHelpBlock" class="form-text text-muted">your full address</span>
                    </div>
                    <div class="form-group d-flex justify-content-center ">
                      <button name="submit" type="submit" class="btn font-weight-bolder text-monoscope btn-submit">Submit</button>
                    </div>
                  </form>
    </div>
</div>
@endsection
