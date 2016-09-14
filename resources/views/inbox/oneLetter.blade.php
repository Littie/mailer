@extends('layouts.app')

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Тема: {{$mail->subject}}</h3>

                    <div class="box-tools pull-right">
                        <strong> Дата: {{$mail->date}}</strong>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! $mail->textHtml !!}
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection
