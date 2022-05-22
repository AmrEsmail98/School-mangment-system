@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Updata Student Year</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{route('student.year.update',$editData->id)}}" >
                                    @csrf

                                                     <div class="form-group">
                                                    <h5> Student Year <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" id="name" value="{{$editData->name}}" class="form-control" >

                                                    </div>
                                                 </div>

                                                </div>
                                            </div>

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Updata">
                                            </div>
                                        </div>

                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->

                <!-- /.box -->

            </section>



@endsection
