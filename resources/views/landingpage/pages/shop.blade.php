@extends('landingpage.index')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            {{-- search box --}}
            <form action="{{ route('search') }}" method="GET">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control py-4 input-text input-color text-monospace"
                            placeholder="Search products.." name="search" aria-label="Recipient's username"
                            aria-describedby="basic-addon2" value="{{ old('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-submit btn-lg color-btn" type="submit"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            {{-- search box --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12" id="product">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                        data-setbg="{{ $product->galleries()->exists() ? Storage::url($product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}">

                                        <ul class="product__hover">
                                            <li><a href="{{ $product->galleries()->exists() ? Storage::url($product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                                                    class="image-popup"><span class="arrow_expand"></span></a></li>

                                            <li><a href="{{ route('detail', $product->slug) }}"><span
                                                        class="icon_bag_alt"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">{{ $product->name }}</a></h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product__price">Rp. {{ number_format($product->price) }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
