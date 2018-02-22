@extends('admin.public.main')

@section('title', '绿行者追溯系统')
@section('title_first', '产品中心')
@section('main_title', '添加产品')



@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger" style="color: red;">
            @foreach ($errors->all() as $error)
                <ul class="row cl">

                    <li class="form-label col-xs-4 col-sm-2"></li>
                    <li class="formControls col-xs-6 col-sm-6">* {{ $error }}</li>

                </ul>
            @endforeach
        </div>
    @endif
    <form action="{{route('admin.trace.store')}}" method="post" class="form form-horizontal"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        @if(Auth::user()->lavel == 1)
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    产品名称：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="text" class="input-text" value="{{ old('title') }}" placeholder="" name="title">
                </div>
            </div>


            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    基地地址：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="text" class="input-text" value="{{ old('address') }}" placeholder="" name="address">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    产品批次号：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="text" class="input-text" value="" style="background-color: lightgray" readonly placeholder="" name="code">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    地区：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <span class="select-box">
                        <select name="articlecolumn" class="select" id="address">
                            <option value="011">七级</option>
                            <option value="021">临邑</option>
                            <option value="031">开发区</option>
                            <option value="041">陵城北</option>
                            <option value="042">陵城南</option>
                            <option value="051">眉山</option>
                            <option value="061">姚安</option>
                        </select>
				    </span>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    智能温室：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <span class="select-box">
                        <select name="articlecolumn" class="select" id="forcing">
                            <option value="01">1号温室</option>
                            <option value="02">2号温室</option>
                            <option value="03">3号温室</option>
                            <option value="04">4号温室</option>
                            <option value="05">5号温室</option>
                            <option value="06">6号温室</option>
                            <option value="07">7号温室</option>
                            <option value="08">8号温室</option>
                        </select>
				    </span>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    区：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <span class="select-box">
                        <select name="articlecolumn" class="select" id="area">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="00">00(混区)</option>
                        </select>
				    </span>
                </div>
            </div>


            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    包装线：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <span class="select-box">
                        <select name="articlecolumn" class="select" id="line">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                        </select>
				    </span>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    日期：</label>
                <div class="formControls col-xs-6 col-sm-6" id="time">
                    <input type="text" class="input-text" placeholder="" name="time">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    班次：</label>
                <div class="formControls col-xs-6 col-sm-6" id="classes">
                    <span class="select-box">
                        <select name="articlecolumn" class="select">
                            <option value="1">白班</option>
                            <option value="2">夜班</option>
                        </select>
				    </span>
                </div>
            </div>


        @endif

        @if(Auth::user()->lavel == 2)
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    产品图片：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="file" class="input-text" name="image" value=""/>
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">
                    <span class="c-red">*</span>
                    追溯节点：</label>
                <div class="formControls col-xs-2 col-sm-2">
                    <input type="text" class="input-text" value="育苗" placeholder="" name="grow_seedlings_name">
                </div>
                <div class="formControls col-xs-4 col-sm-4">
                    <input type="text" class="input-text" value="" placeholder="" name="grow_seedlings">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"></label>
                <div class="formControls col-xs-2 col-sm-2">
                    <input type="text" class="input-text" value="定植" placeholder="" name="colonization_name">
                </div>
                <div class="formControls col-xs-4 col-sm-4">
                    <input type="text" class="input-text" value="" placeholder="" name="colonization">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"></label>
                <div class="formControls col-xs-2 col-sm-2">
                    <input type="text" class="input-text" value="修剪" placeholder="" name="trim_crop_name">
                </div>
                <div class="formControls col-xs-4 col-sm-4">
                    <input type="text" class="input-text" value="" placeholder="" name="trim_crop">
                </div>
            </div>


            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"></label>
                <div class="formControls col-xs-2 col-sm-2">
                    <input type="text" class="input-text" value="开花" placeholder="" name="bloom_name">
                </div>
                <div class="formControls col-xs-4 col-sm-4">
                    <input type="text" class="input-text" value="" placeholder="" name="bloom">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"></label>
                <div class="formControls col-xs-2 col-sm-2">
                    <input type="text" class="input-text" value="授粉" placeholder="" name="fertilization_name">
                </div>
                <div class="formControls col-xs-4 col-sm-4">
                    <input type="text" class="input-text" value="" placeholder="" name="fertilization">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"></label>
                <div class="formControls col-xs-2 col-sm-2">
                    <input type="text" class="input-text" value="坐果" placeholder="" name="bear_fruit_name">
                </div>
                <div class="formControls col-xs-4 col-sm-4">
                    <input type="text" class="input-text" value="" placeholder="" name="bear_fruit">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"></label>
                <div class="formControls col-xs-2 col-sm-2">
                    <input type="text" class="input-text" value="虫害防治" placeholder="" name="pest_control_name">
                </div>
                <div class="formControls col-xs-4 col-sm-4">
                    <input type="text" class="input-text" value="" placeholder="" name="pest_control">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"></label>
                <div class="formControls col-xs-2 col-sm-2">
                    <input type="text" class="input-text" value="采摘" placeholder="" name="pick_name">
                </div>
                <div class="formControls col-xs-4 col-sm-4">
                    <input type="text" class="input-text" value="" placeholder="" name="pick">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"></label>
                <div class="formControls col-xs-2 col-sm-2">
                    <input type="text" class="input-text" value="包装" placeholder="" name="packing_name">
                </div>
                <div class="formControls col-xs-4 col-sm-4">
                    <input type="text" class="input-text" value="" placeholder="" name="packing">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"></label>
                <div class="formControls col-xs-2 col-sm-2">
                    <input type="text" class="input-text" value="运输" placeholder="" name="transport_name">
                </div>
                <div class="formControls col-xs-4 col-sm-4">
                    <input type="text" class="input-text" value="" placeholder="" name="transport">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2"></label>
                <div class="formControls col-xs-2 col-sm-2">
                    <input type="text" class="input-text" value="到店" placeholder="" name="to_the_store_name">
                </div>
                <div class="formControls col-xs-4 col-sm-4">
                    <input type="text" class="input-text" value="" placeholder="" name="to_the_store">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">追溯信息:</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <input type="file" class="input-text" value="" placeholder="" name="enclosure">
                </div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">产品检测报告：</label>
                <div class="formControls col-xs-6 col-sm-6">
                    <div id="ueditor" class="edui-default">
                        @include('UEditor::head')
                        {{--<script id="container" name="content" type="text/plain">--}}

                        {{--@include('UEditor::head');--}}


                        {{--</script>--}}
                    </div>
                </div>
            </div>
        @endif
        <div class="row cl">
            <div class="col-9 col-offset-2">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script type="text/javascript">
        function changeCode() {
            var address = $('#address option:selected').val();
            var forcing = $('#forcing option:selected').val();
            var area = $('#area option:selected').val();
            var classes = $('#classes option:selected').val();
            var line = $('#line option:selected').val();
            var time = $('input[name=time]').val();

            var codes = address + forcing + area + address + line + time + classes;

            $('input[name=code]').val(codes);
        }

        $("body").on('change', '#address', function(i){
            changeCode();
        });

        $("body").on('change', '#forcing', function(i){
            changeCode();
        });

        $("body").on('change', '#area', function(i){
            changeCode();
        });

        $("body").on('change', '#classes', function(i){
            changeCode();
        });

        $("body").on('change', '#line', function(i){
            changeCode();
        });

        $("#time").on("input",function(){
            changeCode();
        });

    </script>

    <script id="ueditor"></script>
    <script>
        var ue = UE.getEditor("ueditor");
        ue.ready(function () {
            //因为Laravel有防csrf防伪造攻击的处理所以加上此行
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
    </script>
@endsection
