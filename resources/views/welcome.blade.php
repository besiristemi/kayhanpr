<div class="lower-row">

    <div class="auto-container">

        <div class="row clearfix">

            <div class="text-col col-xl-6 col-lg-6 col-md-12 col-sm-12">

                <div class="inner">

                    <div class="sec-title with-separator">

                        <h2>Hakkımızda</h2>

                        <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>

                    </div>

                    <div class="text">
                        {!! str_limit(strip_tags($hakkimizda->aciklama),$limit=440,$end='...') !!}
                    </div>


                    <div class="video-link">

                        <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="link lightbox-image">
                            <span class="icon flaticon-play-button-4"></span>
                            <span style="margin-top: 12px" class="txt">Tanıtım Filmimiz</span>
                        </a>

                    </div>

                </div>

            </div>



            <div class="image-col col-xl-5 col-lg-6 col-md-12 col-sm-12">

                <div class="images">

                    <div class="row clearfix">

                        <div class="image col-md-6 col-sm-12">

                            <a class="lightbox-image" data-fancybox="about-gallery" href="{{$hakkimizda->resim1}}">
                                <img src="{{$hakkimizda->resim1}}" alt="">
                            </a>

                        </div>

                        <div class="image col-md-6 col-sm-12">

                            <a class="lightbox-image" data-fancybox="about-gallery" href="{{$hakkimizda->resim2}}">
                                <img src="{{$hakkimizda->resim2}}" alt="">
                            </a>

                        </div>

                        <div class="image col-md-4 col-sm-12">

                            <a class="lightbox-image" data-fancybox="about-gallery" href="{{$hakkimizda->resim3}}">
                                <img src="{{$hakkimizda->resim3}}" alt="">
                            </a>

                        </div>

                        <div class="image col-md-4 col-sm-12">

                            <a class="lightbox-image" data-fancybox="about-gallery" href="{{$hakkimizda->resim4}}">
                                <img src="{{$hakkimizda->resim4}}" alt="">
                            </a>

                        </div>

                        <div class="image col-md-4 col-sm-12">

                            <a class="lightbox-image" data-fancybox="about-gallery" href="{{$hakkimizda->resim5}}">
                                <img src="{{$hakkimizda->resim5}}" alt="">
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
