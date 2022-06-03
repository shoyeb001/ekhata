@extends('backend.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Product </h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route("item.update",$item[0]->id)}}" method="post">

                                @csrf
                                <input type="hidden" name="product_id" value="{{$item[0]->product_id}}">
                                <input type="hidden" name="gst" value="{{$item[0]->gst}}">
                                <input type="hidden" name="order_id" value="{{$item[0]->order_id}}">

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <!-- start 1st row  -->
                                            

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name" class="form-control" id="product_name"
                                                            required="" value="{{$item[0]->product->product_name}}" disabled>
                                                        @error('product_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 2nd row  -->



                                        <div class="row">
                                            <!-- start 3RD row  -->
                                            {{-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" class="form-control"
                                                            required="">
                                                        @error('product_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 4 --> --}}

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="quantity" class="form-control"
                                                            required="" id="product_qty" value="{{$item[0]->quantity}}">
                                                        @error('product_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 3RD row  -->



                                        <div class="row">
                                            <!-- start 6th row  -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="price" class="form-control" id="discount_price" value="{{$item[0]->price}}"
                                                            required="" step="0.01">
                                                        @error('discount_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                           {{--- <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>GST <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="gst" class="form-control" id="gst"
                                                            required="" >
                                                        @error('gst')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->---}}


                                        </div> <!-- end 6th row  -->





                                     {{--  <div class="row">
                                            <!-- start 7th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Short Description <span class="text-danger">*</span></h5>
                                                    <div class="controls" id="short_desc">
                                                        <textarea name="short_descp" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->



                                        </div> <!-- end 7th row  -->





                                        <div class="row">
                                            <!-- start 8th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Long Description <span class="text-danger">*</span></h5>
                                                    <div class="controls" id="long_descp">
                                                        <textarea class="a1" id="a1" name="long_descp" rows="10" cols="80"
                                                            required="">
                                  
                                          </textarea>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->
                                        </div> <!-- end 8th row  -->--}}



                                        <hr>



                                   
                                        <input type="submit" class="btn btn-success" value="Update">

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
        <!-- /.content -->

        
       
    </div>


@endsection
