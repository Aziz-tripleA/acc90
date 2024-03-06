<div class="custom-navigation-wrap">
    <div class="custom-navigation">
        <div class="custom-btn swiper-button-prev">
            <div class="custom-btn-icon">
                @php
                    $color = isset($color)?"white":"black";
                @endphp
                <img
                    src="{{asset('assets/images/icons/btn-arrow-prev-'.$color.'.png')}}" alt=""></div>
        </div>
        <div class="custom-btn swiper-button-next">
            <div class="custom-btn-icon"><img
                    src="{{asset('assets/images/icons/btn-arrow-next-'.$color.'.png')}}" alt=""></div>
        </div>
    </div>
</div>
