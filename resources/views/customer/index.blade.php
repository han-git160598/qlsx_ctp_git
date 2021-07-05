@extends('dashboard_introduce')
@section('content_introduce')
    <div id="wrapper">
        <div class="wp-container">
            <div id="slide-home" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#slide-home" data-slide-to="0" class="active"></li>
                    <li data-target="#slide-home" data-slide-to="1"></li>
                    <li data-target="#slide-home" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('public_customer/images/bg-home.png')}}" alt="Los Angeles">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public_customer/images/bg-home.png')}}" alt="Chicago">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public_customer/images/bg-home.png')}}" alt="New York">
                    </div>
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
                        <div><img src="{{ asset('public_customer/images/phone_1.png')}} " alt=" "></div>
                        <p>Liên hệ</p>
                    </div>

                    <div class="menu-contact ">
                        <span class="triangle "></span>
                        <ul class="content-contact ">
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-phone.png')}} " alt=" "></a>
                                <a href="# " class="item-title ">(+84) 944810055</a>
                            </li>
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-mes.png')}}" alt=" "></a>
                                <a href="# " class="item-title ">Messager</a>
                            </li>
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-viber.png')}} " alt=" "></a>
                                <a href="# " class="item-title ">Viber</a>
                            </li>
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-zalo.png')}} " alt=" "></a>
                                <a href="# " class="item-title ">Zalo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('public_customer/url_global.js')}}" type="text/javascript "></script>


    <script>
        var item = JSON.parse(localStorage.getItem('account_customer'));
        if(item ==null || item=='')
        {
            
        }else{
            window.location.href= urlserver +'customer-home';
        }
    </script>
@endsection