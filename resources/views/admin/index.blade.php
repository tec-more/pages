@extends('tukecx-core::admin._master')

@section('css')

@endsection

@section('js')

@endsection

@section('content')
    <div class="layout-1columns">
        <div class="column main">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="icon-layers font-dark"></i>
                        所有页面
                    </h3>
                    <div class="box-tools">
                        <a class="btn btn-transparent green btn-sm"
                           href="{{ route('admin::pages.create.get') }}">
                            <i class="fa fa-plus"></i> 创建
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $dataTable or '' !!}
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        @php do_action('meta_boxes', 'main', 'tukecx-pages.index') @endphp
    </div>
@endsection
