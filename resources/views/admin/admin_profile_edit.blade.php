@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Admin Profile Edit</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin User Name <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $editData->name }}">
                                                </div>
                                            </div>
                                        </div> <!-- end cold md 6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin Email <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" required=""
                                                        value="{{ $editData->email }}">
                                                </div>
                                            </div>

                                        </div> <!-- end cold md 6 -->

                                    </div> <!-- end row 	 -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin Phone <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="phone" class="form-control"
                                                        value="{{ $editData->phone }}" required="">
                                                </div>
                                            </div>
                                        </div> <!-- end cold md 6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin Address<span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="text" name="address" class="form-control" required=""
                                                        value="{{ $editData->address }}">
                                                </div>
                                            </div>

                                        </div> <!-- end cold md 6 -->

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Profile Image <span class="text-danger"></span></h5>
                                                <div class="controls">
                                                    <input type="file" name="profile_photo_path"
                                                        class="form-control ImageShow">
                                                </div>
                                            </div>
                                        </div><!-- end cold md 6 -->
                                        <div class="col-md-6">
                                            <img class="showImage"
                                                src="{{ (!empty($editData->profile_photo_path))? url('upload/admin_images/'.$editData->profile_photo_path):url('upload/no_image.jpg') }}"
                                                style="width: 100px; height: 100px;">
                                        </div><!-- end cold md 6 -->
                                    </div><!-- end row 	 -->
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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


@endsection