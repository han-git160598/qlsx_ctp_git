@extends('home_page.home.dasboard_home')
@section('js')
    <script src="{{asset('public_home/home/home_home.js')}}" type="text/javascript "></script>
@endsection
@section('home_content')
<div id="wrapper">
    <div class="wp-container">
        <div id="slide-home" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators" id="stt_home">
                
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner" id="content_home">
               

            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#slide-home" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#slide-home" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
        <!-- contact box -->
        <div id="contact-box">
            <span class="box-contact-shadow"></span>
            <span class="box-contact-close"></span>
            <div class="box-contact">
    
                <div class="icon-contact ">
                    <div><img src="{{asset('ctp/images/phone_1.png')}} " alt=" "></div>
                    <p>Liên hệ</p>
                </div>
    
                <div class="menu-contact ">
                    <span class="triangle "></span>
                    <ul class="content-contact ">
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-phone.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">(+84) 932653789</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-mes.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">Messager</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-viber.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">Viber</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-zalo.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">Zalo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection