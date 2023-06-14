@extends('admin.admin_master')
@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black">
                    <a href="{{ route('admin.profile.edit') }}" style="float: right;"
                        class="btn btn-rounded btn-success mb-5"> Edit Profile</a>
                </div>
                <div class="widget-user-image">
                    <img class="rounded-circle"
                        src="{{ (!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/no_image.jpg') }}"
                        alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="description-block">
                                <h5 class="description-header"><i class="mdi mdi-rename-box p-2"></i> Name</h5>
                                <span class="description-text">{{ $adminData->name }}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 br-1 bl-1">
                            <div class="description-block">
                                <h5 class="description-header"><i class="fa fa-envelope-open-o p-2"
                                        aria-hidden="true"></i> E-mail</h5>
                                <span class="description-text">{{ $adminData->email }}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="description-block">
                                <h5 class="description-header"><i class="fa fa-phone p-2" aria-hidden="true"></i> Phone
                                </h5>
                                <span class="description-text">{{ $adminData->phone }}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 br-1 bl-1">
                            <div class="description-block">
                                <h5 class="description-header"><i class="mdi mdi-map-marker-radius p-2"></i>Adress</h5>
                                <span class="description-text">{{ $adminData->address }}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection