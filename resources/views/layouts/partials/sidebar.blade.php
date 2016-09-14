<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Почта</li>
            <!-- Optionally, you can add icons to the links -->
            <li @if(Request::is('/')||Request::is('inbox*')) class='active' @endif>
                <a href="{{ url('/') }}"> <span class="glyphicon glyphicon-save"> Входящие</span></a>
            </li>
            <li @if(Request::is('sent')||Request::is('letter*')) class='active' @endif>
                <a href="{{url('/sent')}}"><span class="glyphicon glyphicon-open"> Отправленные</span></a>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
