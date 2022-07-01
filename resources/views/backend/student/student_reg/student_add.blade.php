@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="container-full">


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Student</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{route('student.year.registration')}}"  enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Student  Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>  Father Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="fname" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>  Last Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="lname" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Mobile Number <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="mobile" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Address <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>  Gender <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="gender"  required class="form-control">
                                                                <option value="" disabled="" selected="">Select Gender </option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5> Religion <span class="text-danger">*</span></h5>

                                                    <div class="controls">
                                                        <select name="religion" id="religion"  required class="form-control">
                                                            <option value="" disabled="" selected="">Select Religion </option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Christan">Christan</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Date Of Birth <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="dob" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Discount <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="discount" class="form-control" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5> Year <span class="text-danger">*</span></h5>

                                                    <div class="controls">
                                                        <select name="year_id" id="religion"  required class="form-control">
                                                            <option value="" disabled="" selected="">Select Year </option>
                                                            @foreach ($years as $year )
                                                            <option value="{{$year->id}}">{{$year->name}}</option>
                                                            @endforeach



                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Class <span class="text-danger">*</span></h5>

                                                    <div class="controls">
                                                        <select name="class_id"  required class="form-control">
                                                            <option value="" disabled="" selected="">Select Year </option>
                                                            @foreach ($classes as $class )
                                                            <option value="{{$class->id}}">{{$class->name}}</option>
                                                            @endforeach



                                                        </select>

                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Group <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="group_id"  required class="form-control">
                                                                <option value="" disabled="" selected="">Select Year </option>
                                                                @foreach ($groups as $group )
                                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                                                @endforeach

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5> Shift <span class="text-danger">*</span></h5>

                                                    <div class="controls">
                                                        <select name="shift_id"  required class="form-control">
                                                            <option value="" disabled="" selected="">Select Year </option>
                                                            @foreach ($shifts as $shift )
                                                            <option value="{{$shift->id}}">{{$shift->name}}</option>
                                                            @endforeach



                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5> Student image <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="image" id="image"
                                                                class="form-control" value=""
                                                                required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <img id="showimage"
                                                                    src="{{ url('upload/no_image.jpg') }}"
                                                                    style="width:100px; border:1px solid #000000;">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>

        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showimage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
