@extends('admin.public.main')

@section('title', '绿行者追溯系统')
@section('title_first', '单页管理')
@section('main_title', '修改')


@section('content')
    <form action="{{route('admin.pages.update')}}" method="post" class="form form-horizontal"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$info->id}}">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">*</span>
                名称：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <input type="text" class="input-text" value="{{$info->title}}" placeholder="" name="title">
            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">备注：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <div id="ueditor" class="edui-default" data-content="{{$info->content}}">
                    @include('UEditor::head')
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
            ue.setContent($('#ueditor').attr('data-content'));

            //因为Laravel有防csrf防伪造攻击的处理所以加上此行
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
    </script>
@endsection