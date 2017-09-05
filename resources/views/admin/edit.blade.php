@extends('tukecx-core::admin._master')

@section('css')

@endsection

@section('js')

@endsection

@section('js-init')
    <script type="text/javascript">
        $(document).ready(function () {
            Tukecx.ckeditor($('.js-ckeditor'));
        });
    </script>
@endsection

@section('content')
    {!! Form::open(['class' => 'js-validate-form', 'url' => route('admin::pages.edit.post', ['id' => $object->id])]) !!}
    <div class="layout-2columns sidebar-right">
        <div class="column main">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">基础信息</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label">
                            <b>标题</b>
                            <span class="required">*</span>
                        </label>
                        <input required type="text" name="title"
                               class="form-control"
                               value="{{ $object->title or '' }}"
                               autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            <b>slug</b>
                            <span class="required">*</span>
                        </label>
                        <input type="text" name="slug"
                               class="form-control"
                               value="{{ $object->slug or '' }}" autocomplete="off">
                    </div>
                    @if($object->slug)
                        <div class="form-group">
                            <label class="control-label">
                                <b>浏览页:</b>
                            </label>
                            <a href="{{ route('front.web.resolve-pages.get', ['slug' => $object->slug]) }}" target="_blank">{{ route('front.web.resolve-pages.get', ['slug' => $object->slug]) }}</a>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="control-label">
                            <b>内容</b>
                        </label>
                        <textarea name="content"
                                  class="form-control js-ckeditor">{{ $object->content or '' }}</textarea>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">SEO</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label">
                            <b>关键词</b>
                        </label>
                        <input type="text" name="keywords"
                               class="form-control js-tags-input"
                               value="{{ $object->keywords or '' }}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            <b>描述</b>
                        </label>
                        <textarea name="description"
                                  class="form-control"
                                  rows="5">{{ $object->description or '' }}</textarea>
                    </div>
                </div>
            </div>
            @php do_action('meta_boxes', 'main', 'pages.edit', $object) @endphp
        </div>
        <div class="column right">
            @php do_action('meta_boxes', 'top-sidebar', 'pages.edit', $object) @endphp
            @include('tukecx-core::admin._widgets.page-templates', [
                'name' => 'page_template',
                'templates' => get_templates('Page'),
                'selected' => isset($object) ? $object->page_template : '',
            ])
            @include('tukecx-core::admin._widgets.thumbnail', [
                'name' => 'thumbnail',
                'value' => (isset($object->thumbnail) ? $object->thumbnail : null)
            ])
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">排序</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <input type="text" name="order"
                               class="form-control"
                               value="{{ $object->order or '0' }}" autocomplete="off">
                    </div>
                </div>
            </div>
            @php do_action('meta_boxes', 'bottom-sidebar', 'pages.edit', $object) @endphp
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">发布内容</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label">
                            <b>状态</b>
                            <span class="required">*</span>
                        </label>
                        {!! form()->select('status', [
                            'activated' => '激活',
                            'disabled' => '禁止',
                        ], (isset($object->status) ? $object->status : ''), ['class' => 'form-control']) !!}
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-check"></i> 保存
                        </button>
                        <button class="btn btn-success" type="submit"
                                name="_continue_edit" value="1">
                            <i class="fa fa-check"></i> 保存继续
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
