@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">



            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">SubCategory List <span class="badge badge-pill badge-danger">
                                {{ count($subcategory) }} </span> </h3>
                        <a href="{{ route('add.subcategory') }}" style="float: right;"
                            class="btn btn-rounded btn-success mb-5"> Add Sub-Category</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl </th>
                                        <th>Category </th>
                                        <th>SubCategory English</th>
                                        <th>SubCategory Arabic </th>
                                        <th>Image </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subcategory as $key=>$item)
                                    <tr>
                                        <td> {{ $key+1 }} </td>
                                        <td> {{ $item['category']['category_name_en'] }} </td>
                                        <td>{{ $item->subcategory_name_en }}</td>
                                        <td>{{ $item->subcategory_name_ar }}</td>
                                        <td><img src="{{ asset($item->subcategory_image) }}"
                                                style="width: 70px; height: 40px;">
                                        </td>
                                        <td width="30%">
                                            <a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-info"
                                                title="Edit Data"><i class="fa fa-pencil"></i> </a>

                                            <a href="{{ route('subcategory.delete',$item->id) }}" class="btn btn-danger"
                                                title="Delete Data" id="delete">
                                                <i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col -->





        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>




@endsection