<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div id="app" v-cloak>
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Employee</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('employee.store')}}" method="post">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group {{ $errors->has('f_name') ?  $errors->first('f_name') : '' }}">
                  <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="f_name" class="form-control" id="f_name" placeholder="John">
                    {!! $errors->first('f_name','<p class="help-block">:message</p>') !!}
                  </div>
                </div>


                <div class="form-group {{ $errors->has('l_name') ?  $errors->first('l_name') : '' }}">
                  <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="l_name" class="form-control" id="l_name" placeholder="Doe">
                    {!! $errors->first('l_name','<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('dob') ?  $errors->first('dob') : '' }}">
                  <label for="inputEmail3" class="col-sm-2 control-label">DOB</label>

                  <div class="col-sm-10">
                    <input type="date" name="dob" class="form-control" id="dob" placeholder="">
                    {!! $errors->first('dob','<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group {{ $errors->has('join_date') ?  $errors->first('join_date') : '' }}">
                  <label for="inputEmail3" class="col-sm-2 control-label">Joined Date</label>

                  <div class="col-sm-10">
                    <input type="date" name="join_date" class="form-control" id="join_date" placeholder="join_date">
                    {!! $errors->first('join_date','<p class="help-block">:message</p>') !!}
                  </div>
                </div>

               <div class="form-group {{ $errors->has('dept') ?  $errors->first('dept') : '' }}">
                  <label for="inputEmail3" class="col-sm-2 control-label">Department</label>
                    <div class="col-sm-10">
                      <select name="dept" class="form-control">
                        <option>operations</option>
                        <option>designer</option>
                        <option>developer</option>
                        <option>marketing</option>
                        <option>account</option>
                        <option>administration</option>
                      </select>
                      {!! $errors->first('dept','<p class="help-block">:message</p>') !!}
                    </div>
                </div>

               <div class="form-group {{ $errors->has('emp_type') ?  $errors->first('emp_type') : '' }}">
                  <label for="inputEmail3" class="col-sm-2 control-label">Employee Type</label>
                    <div class="col-sm-10">
                      <select name="emp_type" class="form-control">
                        <option>admin</option>
                        <option>employee</option>
                      </select>
                      {!! $errors->first('emp_type','<p class="help-block">:message</p>') !!}
                    </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button id = "cancel-btn" type="submit" class="btn btn-default">Cancel</button>
                <input type="submit" class="btn btn-info pull-right"></input>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.controlsidebar')

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

</body>
</html>
