@extends('admin.public.main')

@section('title', '绿行者追溯系统')
@section('title_first', '单页管理')
@section('main_title', '添加')


@section('content')
    <form action="{{route('admin.pages.store')}}" method="post" class="form form-horizontal"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">*</span>
                名称：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <input type="text" class="input-text" value="" placeholder="" name="title">
            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">*</span>
                类型：</label>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="radio" name="status" value="1" > 公司介绍
            </div>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="radio" name="status" value="2" > 品牌介绍
            </div>
            <div class="formControls col-xs-2 col-sm-2">
                <input type="radio" name="status" value="3" > 接地介绍
            </div>
        </div>



        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">备注：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <div id="ueditor" class="edui-default">
                    @include('UEditor::head')
                    {{--<script id="container" name="content" type="text/plain">--}}

{{--@include('UEditor::head');--}}


                    {{--</script>--}}
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
    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });
    </script>
    {{--<script type="text/javascript">--}}
        {{--var ue = UE.getEditor('container');--}}
    {{--</script>--}}
@endsection