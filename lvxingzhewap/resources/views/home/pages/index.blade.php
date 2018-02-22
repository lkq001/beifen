<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>绿行者</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="renderer" content="webkit">
    <meta name="robots" content="index,follow"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="format-detection" content="telphone=no, email=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="baidu-site-verification" content="eAsfmG0pun"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- head 中 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.2/style/weui.min.css">
    {{--<link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.0/css/jquery-weui.min.css">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}">
    <script type="text/javascript" src="{{ asset('home/js/flexible.js') }}"></script>
    <style>
        .weui-slider__inner {
            height: 20px;
        }

        .weui-slider__track {
            height: 20px;
        }

        .text-center {
            text-align: center;

        }

        .green-color {
            color: darkgreen;
        }

        .pj {
            font-size: 16px;
            margin: 20px 20px 10px 20px;
        }

        .m-l-20 {
            margin-left: 20px;
        }

        .m-t-10 {
            margin-top: 10px;
        }

        .m-b-20 {
            margin: 20px;
        }
    </style>

</head>
<body>
@if(!empty($id))
    <header onclick="indexTo()" id="index_url" data-url="{{ route('home.index.index', ['id' => $id]) }}">
@else
            <header onclick="indexTo()" id="index_url" data-url="{{ route('home.index.index')}}">
@endif
    <a class="tmall" href="">天猫商城</a>
    <a class="wechat" href="">微信商城</a>
    <img class="logo" src="{{ asset('home/images/logo.png') }}" alt="绿行者">
</header>
<nav>
    <a href="{{route('home.pages.company')}}">公司介绍</a>
    <a href="{{route('home.pages.brand')}}">品牌介绍</a>
    <a href="{{route('home.pages.base')}}">基地介绍</a>
    <a href="{{ route('home.evaluate.index') }}">意见反馈</a>
</nav>
<section class="main">
    @if(!empty($info))

        {!! $info->content !!}
    @else
        <form action="" method="post">

            <input type="hidden" name="star" value="100"/>
            <div class="weui-flex pj">
                <div class="weui-flex__item green-color">整体评价</div>
            </div>

            <div class="weui-slider-box" id="slider">
                <div class="weui-slider">
                    <div id="sliderInner" class="weui-slider__inner">
                        <div id="sliderTrack" style="width: 100%;" class="weui-slider__track"></div>
                        <div id="sliderHandler" style="left: 100%;" class="weui-slider__handler"></div>
                    </div>
                </div>
            </div>

            <div class="weui-flex">
                <div class="weui-flex__item text-center green-color">很差</div>
                <div class="weui-flex__item text-center green-color">不满意</div>
                <div class="weui-flex__item text-center green-color">一般</div>
                <div class="weui-flex__item text-center green-color">满意</div>
                <div class="weui-flex__item text-center green-color">惊喜</div>
            </div>

            <div class="weui-flex pj">
                <div class="weui-flex__item green-color">产品反馈</div>
            </div>

            <div class="weui-flex m-l-20 m-t-10 green-color ">
                <div class="weui-flex__item"><input type="radio" name="feedback" value="1"/>太酸</div>
                <div class="weui-flex__item"><input type="radio" name="feedback" value="2"/>太甜</div>
                <div class="weui-flex__item"><input type="radio" name="feedback" value="3"/>酸甜适合</div>
            </div>
            <div class="weui-flex m-l-20 m-t-10 green-color ">
                <div class="weui-flex__item"><input type="radio" name="feedback" value="4"/>浓郁番茄味</div>
                <div class="weui-flex__item"><input type="radio" name="feedback" value="5"/>无味</div>
                <div class="weui-flex__item"><input type="radio" name="feedback" value="6"/>味道奇怪</div>
            </div>
            <div class="weui-flex m-l-20 m-t-10 green-color ">
                <div class="weui-flex__item"><input type="radio" name="feedback" value="7"/>新鲜</div>
                <div class="weui-flex__item"><input type="radio" name="feedback" value="8"/>不新鲜</div>
                <div class="weui-flex__item"></div>
            </div>


            <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea class="weui-textarea" id="message" placeholder="其他建议" rows="3"></textarea>
                        <div class="weui-textarea-counter"></div>
                    </div>
                </div>
            </div>

            <div class="weui-cells weui-cells_form m-b-20">
                <input type="button" id="submit" data-url="{{ route('home.evaluate.store') }}" value="提交"
                       class="weui-btn weui-btn_primary">
            </div>

        </form>
    @endif
</section>
<footer>
    <img class="logo" src="{{ asset('home/images/logo.png') }}" alt="绿行者">
    <span>
			<img src="{{ asset('home/images/wechat-code.png') }}" alt="微信服务号">微信服务号
		</span>
    <span>
			<img src="{{ asset('home/images/weibo-code.png') }}" alt="微博二维码">微博二维码
		</span>
    <p class="contact">官方客服电话<br>400-658-0088</p>
    <p>国际标准蔬菜&nbsp;就选绿行者</p>
</footer>
</body>
<!-- body 最后 -->
<script src="https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js"></script>

<!-- 如果使用了某些拓展插件还需要额外的JS -->
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/swiper.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/city-picker.min.js"></script>
<script>
    $('#slider').slider(function (event) {
        var star = event;
        $('input[name=star]').val(star);
    })

    function indexTo() {
        var url = $('#index_url').attr('data-url');
        location.href = url
    }

    $('#submit').click(function (event) {
        var url = $(this).attr('data-url');
        var star = $('input[name=star]').val();
        var feedback = $('input[name=feedback]:checked').val();
        var message = $('#message').val();

        if (!star || !feedback || !message) {
            $.alert("请完整填写信息", function () {
                location.reload();
            });
            return false;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url,
            data: {
                'star': star,
                'feedback': feedback,
                'message': message
            },
            type: 'post',
            success: function (res) {
                console.log(res);
                if (res.code == 'SN200') {

                    $.alert("添加成功", function () {
                        location.reload();
                    });

                } else {
                    $.alert("添加失败", function () {
                        //点击确认后的回调函数
                        return false;
                    });
                }
            },
            error: function (res) {
                $.alert("添加失败", function () {
                    //点击确认后的回调函数
                    return false;
                });
            }
        });


    });
</script>
</html>