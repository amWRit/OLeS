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
              <h3 class="box-title">Add New Leave Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('leave.store')}}" method="post">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Employee Name</label>


                  <div class="col-sm-10">
                    <select class="form-control">
                      @foreach($employees as $employee)                    
                        <option  name = "emp_name">{{$employee->f_name}}</option> 
                        {!! $errors->first('emp_name','<p class="help-block">:message</p>') !!}
                     
                      @endforeach
                    </select>
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Leave Type</label>

                  <div class="col-sm-10">
                    <select class="form-control">
                      @foreach($leave_types as $leave_type)                    
                        <option  name = "leave_type">{{$leave_type->name}}</option> 
                        {!! $errors->first('leave_type','<p class="help-block">:message</p>') !!}                     
                      @endforeach
                    </select>
                    
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Leave Category</label>

                   <div class="col-sm-10">
                    <select class="form-control">
                      @foreach($leave_categories as $leave_category)                    
                        <option  name = "leave_category">{{$leave_category->name}}</option>                      
                      @endforeach
                    </select>
                    {!! $errors->first('leave_category','<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">From </label>

                  <div class="col-sm-10">
                    <input name = "fromDate" type="date" class="form-control" id="inputEmail3" placeholder="join_date">
                    {!! $errors->first('fromDate','<p class="help-block">:message</p>') !!}
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">To </label>

                  <div class="col-sm-10">
                    <input name="toDate" type="date" class="form-control" id="inputEmail3" placeholder="join_date">
                    {!! $errors->first('toDate','<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Note </label>

                  <div class="col-sm-10">
                    <textarea name = "note" class="form-control" rows="3" placeholder="Enter ..." autocomplete="off"></textarea>
                    {!! $errors->first('note','<p class="help-block">:message</p>') !!}
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
