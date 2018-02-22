@extends('admin.public.main')

@section('title', '绿行者追溯系统')
@section('title_first', '产品中心')
@section('main_title', '修改产品')

@section('content')
    @if (count($errors)>0)
        <div class="alert alert-danger" style="color: red;">
            <ul class="row cl">
                <li class="form-label col-xs-4 col-sm-2"></li>
                <li class="formControls col-xs-6 col-sm-6">* {{ $errors }}</li>
            </ul>
        </div>
    @endif
    <form action="{{route('admin.trace.update')}}" method="post" class="form form-horizontal"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $info->id }}"/>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">*</span>
                产品名称：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <input type="text" class="input-text" value="{{ $info->title }}" @if(Auth::user()->lavel == 2) disabled
                       @endif placeholder="" name="title">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">*</span>
                基地地址：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <input type="text" class="input-text" value="{{ $info->address }}"
                       @if(Auth::user()->lavel == 2) disabled @endif  placeholder="" name="address">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">*</span>
                产品批次号：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <input type="text" class="input-text" value="{{ $info->code }}" @if(Auth::user()->lavel == 2) disabled
                       @endif  placeholder="" name="code">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">*</span>
                产品图片：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <input type="file" class="input-text" name="image" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->image }}"/>
                <img src="{{ $info->images }}" alt="">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">*</span>
                追溯节点：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->grow_seedlings_name }}" placeholder=""
                       name="grow_seedlings_name">
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->grow_seedlings }}" placeholder=""
                       name="grow_seedlings">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"></label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->colonization_name }}" placeholder=""
                       name="colonization_name">
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->colonization }}" placeholder=""
                       name="colonization">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"></label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->trim_crop_name }}" placeholder=""
                       name="trim_crop_name">
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->trim_crop }}" placeholder="" name="trim_crop">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"></label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{$info->bloom_name}}" placeholder="" name="bloom_name">
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{$info->bloom}}" placeholder="" name="bloom">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"></label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->fertilization_name }}" placeholder=""
                       name="fertilization_name">
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->fertilization }}" placeholder=""
                       name="fertilization">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"></label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->bear_fruit_name }}" placeholder=""
                       name="bear_fruit_name">
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->bear_fruit }}" placeholder="" name="bear_fruit">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"></label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->pest_control_name }}" placeholder=""
                       name="pest_control_name">
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->pest_control }}" placeholder=""
                       name="pest_control">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"></label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->pick_name }}" placeholder="" name="pick_name">
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->pick }}" placeholder="" name="pick">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"></label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->packing_name }}" placeholder=""
                       name="packing_name">
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->packing }}" placeholder="" name="packing">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"></label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->transport_name }}" placeholder=""
                       name="transport_name">
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->transport }}" placeholder="" name="transport">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"></label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->to_the_store_name }}" placeholder=""
                       name="to_the_store_name">
            </div>
            <div class="formControls col-xs-4 col-sm-4">
                <input type="text" class="input-text" @if(Auth::user()->lavel == 1) disabled
                       @endif value="{{ $info->to_the_store }}" placeholder=""
                       name="to_the_store">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">追溯信息:</label>
            <div class="formControls col-xs-6 col-sm-6">
                <input type="file" class="input-text" @if(Auth::user()->lavel == 1) disabled @endif value=""
                       placeholder="" name="enclosure">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">产品检测报告：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <div id="ueditor" class="edui-default" @if(Auth::user()->lavel == 1) disabled
                     @endif data-content="{{$info->content}}">

                    @if(Auth::user()->lavel == 1)
                        {!! $info->content !!}
                    @else
                        @include('UEditor::head')
                    @endif
                </div>
            </div>
        </div>

        <div class="row cl">
            <div class="col-9 col-offset-2">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script id="ueditor"></script>
    <script>
        var ue = UE.getEditor("ueditor");
        ue.ready(function () {
            //因为Laravel有防csrf防伪造攻击的处理所以加上此行
            ue.setContent($('#ueditor').attr('data-content'));
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
    </script>
@endsection
