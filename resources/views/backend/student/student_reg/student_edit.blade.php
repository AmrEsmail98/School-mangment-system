@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="container-full">


            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Student</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{route('student.registration.update',$editDate->student_id)}}"  enctype="multipart/form-data" >
                                    @csrf
                                    <input type="hidden" name="id" value="{{$editDate->id}}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Student  Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" required="" value="{{$editDate['student']['name']}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>  Father Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="fname" class="form-control" required="" value="{{$editDate['student']['fname']}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>  Last Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="lname" class="form-control" required=""value="{{$editDate['student']['lname']}}">
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
                                                            <input type="text" name="mobile" class="form-control" required=""value="{{$editDate['student']['mobile']}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Address <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control" required="" value="{{$editDate['student']['address']}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>  Gender <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="gender"  required class="form-control">
                                                                <option value="" disabled="" selected="">Select Gender </option>
                                                                <option value="Male" {{($editDate['student']['gender']=='Male')?'selected':''}}>Male</option>
                                                                <option value="Female" {{($editDate['student']['gender']=='Female')?'selected':''}}>Female</option>

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
                                                            <option value="Islam" {{($editDate['student']['religion']=='Islam')?'selected':''}}>Islam</option>
                                                            <option value="Christan" {{($editDate['student']['religion']=='Christan')?'selected':''}}>Christan</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Date Of Birth <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="dob" class="form-control" required="" value="{{$editDate['student']['dob']}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5> Discount <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="discount" class="form-control" value="{{$editDate['discount']['discount']}}" >
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
                                                            <option value="{{$year->id}}" {{($editDate->year_id == $year->id)? "selected":""}}>{{$year->name}}</option>
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
                                                            <option value="{{$class->id}}" {{($editDate->class_id == $class->id)? "selected":""}}>{{$class->name}}</option>
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
                                                                <option value="{{$group->id}}" {{($editDate->group_id == $group->id)? "selected":""}}>{{$group->name}}</option>
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
                                                            <option value="" disabled="" selected="">Select Shift </option>
                                                            @foreach ($shifts as $shift )
                                                            <option value="{{$shift->id}}" {{($editDate->shift_id == $shift->id)? "selected":""}}>{{$shift->name}}</option>
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
                                                               >
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <img id="showimage"
                                                                src="{{ !empty($editDate['student']['image']) ? url('upload/student_images/' . $editDate['student']['image']) : url('upload/no_image.jpg') }}"
                                                                style="width:100px; border:1px solid #000000;">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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
