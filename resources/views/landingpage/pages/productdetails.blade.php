@extends('landingpage.index')

@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('index') }}"><i class="fa fa-home"></i> Home</a>
                        <span>{{ $product->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            @foreach ($product->galleries as $item)
                                <a class="pt {{ $loop->first ? 'active' : '' }}" href="#">
                                    <img src="{{ Storage::url($item->url) }}" alt="">
                                </a>
                            @endforeach
                        </div>

                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                @foreach ($product->galleries as $slider)
                                    <img data-hash="{{ Storage::url($slider->url) }}" class="product__big__img"
                                        src="{{ Storage::url($slider->url) }}" alt="">
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}</h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div>
                        <div class="product__details__price">IDR {{ number_format($product->price) }}</div>
                        <p>{!! $product->description !!}</p>
                        <div class="product__details__button">

                            @if (Auth::user()->roles == 'ADMIN')
                                <form action="{{ route('tambahCart', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="cart-btn" disabled><span class="icon_bag_alt"></span>
                                        You're now admin </button>
                                </form>
                            @else
                                <form action="{{ route('tambahCart', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="cart-btn"><span class="icon_bag_alt"></span>
                                        Add To Cart </button>
                                </form>
                            @endif




                            <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                @foreach ($recomendations as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ $item->galleries()->exists() ? Storage::url($item->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}">
                                <div class="label new">New</div>
                                <ul class="product__hover">
                                    <li><a href="{{ $item->galleries()->exists() ? Storage::url($item->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                                            class="image-popup"><span class="arrow_expand"></span></a></li>

                                    <li><a href="{{ route('detail', $item->slug) }}"><span
                                                class="icon_bag_alt"></span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{ $item->name }}</a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">IDR {{ number_format($item->price) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
@endsection
