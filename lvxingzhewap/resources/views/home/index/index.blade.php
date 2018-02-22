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
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}">
    <script type="text/javascript" src="{{ asset('home/js/flexible.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <style>

        .main .part1 p:nth-of-type(3) {
            margin-bottom: 0.46875rem;
            color: #000;
            font-size: 0.34375rem;
            text-align: center; }
        .main .part1 p:nth-of-type(3) span {
            margin: 0 0.39063rem;
            color: #005d32;
            font-size: 0.46875rem; }
        .main .part1 p:nth-of-type(4) {
            margin-bottom: 0.46875rem;
            color: #000;
            font-size: 0.34375rem;
            text-align: center; }
        .main .part1 p:nth-of-type(4) span {
            margin: 0 0.39063rem;
            color: #005d32;
            font-size: 0.46875rem; }
        .m-10 {
            margin-top: 10px;
        }
    </style>

</head>
<body>
<header onclick="indexTo()" id="index_url" data-url="{{ route('home.index.index', ['id' => $id]) }}">
    <a class="tmall" href="">天猫商城</a>
    <a class="wechat" href="">微信商城</a>
    <img class="logo" src="{{ asset('home/images/logo.png') }}" alt="绿行者">
</header>
<nav>
    <a href="{{ route('home.pages.company') }}">公司介绍</a>
    <a href="{{ route('home.pages.brand') }}">品牌介绍</a>
    <a href="{{ route('home.pages.base') }}">基地介绍</a>
    <a href="{{ route('home.evaluate.index') }}">意见反馈</a>
</nav>
<section class="main">
    <div class="part1">
        <p>{{$info->title}}</p>
        <img src="{{$info->image}}" alt="">
        {!! $info->codeImage !!}
        <p>{{$info->code}}</p>
        <p>{{$info->address}}</p>
        <div class="tree">
            <span>{{$info->to_the_store_name}}：<em>{{$info->to_the_store}}</em></span>
            <span>{{$info->transport_name}}：<em>{{$info->transport}}</em></span>
            <span>{{$info->packing_name}}：<em>{{$info->packing}}</em></span>
            <span>{{$info->pick_name}}：<em>{{$info->pick}}</em></span>
            <span>{{$info->pest_control_name}}：<em>{{$info->pest_control}}</em></span>
            <span>{{$info->bear_fruit_name}}：<em>{{$info->bear_fruit}}</em></span>
            <span>{{$info->fertilization_name}}：<em>{{$info->fertilization}}</em></span>
            <span>{{$info->bloom_name}}：<em>{{$info->bloom}}</em></span>
            <span>{{$info->trim_crop_name}}：<em>{{$info->trim_crop}}</em></span>
            <span>{{$info->colonization_name}}：<em>{{$info->colonization}}</em></span>
            <span>{{$info->grow_seedlings_name}}：<em>{{$info->grow_seedlings}}</em></span>
        </div>

        {{--<p class="m-10"><a href="{{$info->enclosure}}">更多追溯信息下载</a></p>--}}
        <img src="{{ asset('home/images/img4.png') }}" alt="">
    </div>
    <div class="part2">
        {!! $info->content !!}
    </div>
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
<script>
    function indexTo() {
        var url = $('#index_url').attr('data-url');
        location.href = url
    }
</script>
</html>