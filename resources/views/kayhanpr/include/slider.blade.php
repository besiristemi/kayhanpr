<section>
    <div class="banner1 banner-top cover-image">
        <div class="owl-carousel bannner-owl-carousel1 slider banner-height slider-images owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(-7664px, 0px, 0px); transition: all 0s ease 0s; width: 13412px;">

                    @foreach($sliderler as $slider )

                        <div class="owl-item " style="width: 1916px;">
                            <div class="item slider-img2">
                                <img src="{{$slider->resim}}">
                                <div class="banner-text mb-0">
                                    <div class="container">
                                        <div class="col-md-12">
                                        <!--  <h1 class="banner-title">{{--{{$slider->baslik}}--}}</h1>
                                            <p class="banner-desc">{{--{!! $slider->icerik !!}--}}</p>
                                            <a href="/iletisim" class="btn btn-orange btn-lg">İletişim</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
            <div class="owl-nav">
                <button type="button" role="presentation" class="owl-prev">
                    <span aria-label="Previous">‹</span>
                </button>
                <button type="button" role="presentation" class="owl-next">
                    <span aria-label="Next">›</span>
                </button>
            </div>
            <div class="owl-dots disabled"></div>
        </div>
    </div>
</section>
