@extends('landingpage.index')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="breadcrumb__links">
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Shopping cart</span>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carts as $cart)
                                    <tr>
                                        <td class="cart__product__item">
                                            <img src="{{ $cart->product->galleries()->exists() ? Storage::url($cart->product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                                                width="100px" alt="">
                                            <div class="cart__product__item__title">
                                                <h6>{{ $cart->product->name }}</h6>
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">IDR {{ number_format($cart->product->price) }}</td>

                                        <td class="cart__total">IDR {{ number_format($cart->product->price) }}</td>

                                        <td class="cart__close">
                                            <form action="{{ route('hapusCart', $cart->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fa fa-times"
                                                        aria-hidden="true"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="cart__product__item">
                                            Keranjang kamu masih kosong nih, yuk lihat semua product kita!
                                        </td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center mb-5">

            <h3 class="font-weight-bolder text-monoscope text-pyche ">Form Transaction</h3>
        </div>

        <div class="container">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group font-weight-bolder text-monoscope">
                            <label for="text">Name</label>
                            <input id="text" placeholder="your name .." type="text" required="required"
                                class="form-control" name="name">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="form-group font-weight-bolder text-monoscope">
                            <label for="text1">Email</label>
                            <input id="text1" placeholder="your email .." type="text" class="form-control"
                                name="email">
                        </div>
                    </div>
                </div>

                <div class="form-group font-weight-bolder text-monoscope">
                    <label for="text2">Phone</label>
                    <input id="phone" placeholder="phone number" type="text" class="form-control" name="phone">
                </div>

                <div class="form-group font-weight-bolder text-monoscope">
                    <label for="select">Courier</label>
                    <div>
                        <select id="courier" required="required" class="custom-select" name="courier">
                            <option value="FEDEX">FEDEX</option>
                            <option value="BLOG">Blog</option>
                            <option value="JNE">JNE</option>
                        </select>
                    </div>
                </div>

                <div class="form-group font-weight-bolder text-monoscope">
                    <label for="select1">Payment</label>
                    <div>
                        <select id="payment" name="payment" required="required" class="custom-select">
                            <option value="MIDTRANS">MIDTRANS</option>
                        </select>
                    </div>
                </div>

                <div class="form-group font-weight-bolder text-monoscope">
                    <label for="textarea">Alamat</label>
                    <textarea id="address" name="address" cols="40" rows="4" aria-describedby="textareaHelpBlock"
                        required="required" class="form-control"></textarea>
                    <span id="textareaHelpBlock" class="form-text text-muted">your full address</span>
                </div>

                <div class="form-group d-flex justify-content-center">
                    <div class="cart__btn update__btn">
                        <button type="submit" class="btn font-weight-bolder text-monoscope btn-submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                             Checkout</button>
                    </div>
                </div>

            </form>

            <div class="cart__btn update__btn ">
                <a href="{{ __('shop')}}" class="btn font-weight-bolder text-monoscope btn-submit"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Back to Shop</a>
            </div>
        </div>

        </div>

    </section>
    <!-- Shop Cart Section End -->
@endsection
