@extends('layouts.app')

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Новое письмо</h3>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif
                    <div class="col-xs-12 notification">
                        {!!  Notification::showAll() !!}
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" method="post" action="/send">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="inputTitle" class="col-xs-3 control-label">Получатель</label>

                            <div class="col-xs-9 col-sm-4">
                                <input type="text" name="address" class="form-control" id="inputTitle"
                                       value="{{ old('address') }}" placeholder="Получатель">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputTitle" class="col-xs-3 control-label">Тема письма</label>

                            <div class="col-xs-9 col-sm-4">
                                <input type="text" name="title" class="form-control" id="inputTitle"
                                       value="{{ old('title') }}" placeholder="Тема">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription" class="col-xs-3 control-label">Текст письма</label>

                            <div class="col-xs-9 col-sm-4">
                                        <textarea id="inputDescription" name="body" class="form-control"
                                                  rows="6">{{ old('body') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
