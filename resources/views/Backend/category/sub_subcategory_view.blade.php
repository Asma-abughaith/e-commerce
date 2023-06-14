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
                        <h3 class="box-title">Sub-Sub-Category List <span class="badge badge-pill badge-danger">
                                {{ count($subsubcategory) }} </span></h3>
                        <a href="{{ route('add.subsubcategory') }}" style="float: right;"
                            class="btn btn-rounded btn-success mb-5"> Add Sub-Sub-Category</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>sl </th>
                                        <th>Category </th>
                                        <th>SubCategory Name</th>
                                        <th>Sub-Subcategory English </th>
                                        <th>Image </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subsubcategory as $key =>$item)
                                    <tr>
                                        <td> {{ $key+1 }} </td>
                                        <td> {{ $item['category']['category_name_en'] }} </td>
                                        <td>{{ $item['subcategory']['subcategory_name_en'] }}</td>
                                        <td>{{ $item->subsubcategory_name_en }}</td>
                                        <td><img src="{{ asset($item->subsubcategory_image) }}"
                                                style="width: 70px; height: 40px;">
                                        </td>
                                        <td width="30%">
                                            <a href="{{ route('subsubcategory.edit',$item->id) }}" class="btn btn-info"
                                                title="Edit Data"><i class="fa fa-pencil"></i> </a>

                                            <a href="{{ route('subsubcategory.delete',$item->id) }}"
                                                class="btn btn-danger" title="Delete Data" id="delete">
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


            <!--   ------------ Add Category Page -------- -->



        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



@endsection