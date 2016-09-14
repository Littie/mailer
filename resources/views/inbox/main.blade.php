@extends('layouts.app')



@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="col-xs-12 notification">
                    {!!  Notification::showAll() !!}
                </div>
                <form action="/inbox/delete" method="post" id="mail-form" name="form_name1">
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
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 20px">
                                    <a id="checkbox"><span class="label label-primary">check</span></a>
                                </th>
                                <th style="width: 300px">
                                    Отправитель
                                </th>
                                <th style="width: 300px">
                                    Тема
                                </th>
                                <th style="width: 100px">
                                    Полученно
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mails as $one)
                                <tr>
                                    <td>
                                        <input class="input shiftCheckbox" type="checkbox"
                                               name="letterId.{{$one->id}}."
                                               value="{{$one->id}}"/>
                                    </td>
                                    <td>
                                        <a href="/inbox/{{$one->id}}">{{$one->fromAddress}}</a>
                                    </td>
                                    <td>
                                        <a href="/inbox/{{$one->id}}">{{$one->subject}}</a>
                                    </td>
                                    <td>{{$one->date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
