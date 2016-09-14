@extends('layouts.app')



@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="col-xs-12 notification">
                    {!!  Notification::showAll() !!}
                </div>
                <form action="/delete" method="post" id="mail-form" name="form_name1">
                    <div class="box-header with-border">

                        <a href="{{asset('/new')}}">
                            <button type="button" class="btn btn-success">
                                <span class="glyphicon glyphicon-pencil"></span> Написать письмо
                            </button>
                        </a>
                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span> Удалить выбранные письма
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {!! $grid !!}

                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
