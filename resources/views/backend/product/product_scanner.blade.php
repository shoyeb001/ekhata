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
                            <form action="{{route("add.invoice")}}" method="post">

                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Product Code <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" id="product_code" name="product_code" class="form-control"
                                                    required="">
                                                    <p class="text-center mt-3"><button class="btn btn-primary" type="button" id="getinfo">Get Info</button></p>
                                                @error('product_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- start 1st row  -->
                                            

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name" class="form-control" id="product_name"
                                                            required="" value="" >
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
                                                        <input type="text" name="product_qty" class="form-control"
                                                            required="" id="product_qty" value="">
                                                        @error('product_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 4 -->
                                        </div> <!-- end 3RD row  -->

                                        <div class="row">
                                            <!-- start 5th row  -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Product Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="number" name="price" class="form-control" id="price"
                                                            required="" step="0.01">
                                                        @error('price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 5th row  -->

                                        <hr>
                        
                                        <input type="submit" class="btn btn-success" value="Add to Invoice">

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

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Invoice Items </h4>
                </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Price </th>
                                    <th>Quantity </th>
                                    <th>gst </th>
                                    <th>total </th>
                                    <th>Action</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
         @foreach($items as $item)
         <tr>
            <td>{{ $item->product->product_name }}</td>
             <td>{{ number_format($item->product->price, 2) }} INR </td>
             <td>{{ $item->quantity}} Pic</td>
             <td>{{$item->gst}}</td>
             <td>{{ number_format($item->total_price, 2)}}</td>
    
    
    
            <td width="30%">
    
     <a href="{{route("edit.item",$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
    
     <a href="{{route("delete.item",$item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
         <i class="fa fa-trash"></i></a>
            </td>
                                 
         </tr>
         @php
             $total= $total + $item->total_price;
         @endphp
          @endforeach
                            </tbody>
                            <tfoot>
                                <td colspan="4">Total Amount</td>
                                
                                <td colspan="2">{{ number_format($total, 2)}}</td>
                            </tfoot>
                             
                          </table>
                        </div>
                        @if (count($items)!=0)
                        <a style="margin-left: 30px; width:200px;"  href="{{route("invoice.view",$id)}}" class="btn btn-success">View Invoice</a>

                        @endif

                    </div>

                    <!-- /.box-body -->
    
                    
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

        
       
    </div>







  {{--  <script type="text/javascript">
       let code = "";
let reading = false;

document.addEventListener('keypress', e => {
  //usually scanners throw an 'Enter' key at the end of read
   if (e.keyCode === 13) {
          if(code.length > 10) {
            console.log(code);
            /// code ready to use                
            code = "";
         }
    } else {
        code += e.key; //while this is not an 'enter' it stores the every key            
    }

    //run a timeout of 200ms at the first read and clear everything
    if(!reading) {
        reading = true;
        setTimeout(() => {
            code = "";
            reading = false;
        }, 200);  //200 works fine for me but you can adjust it
    }
    document.getElementById("product_code").value=code;

});
    </script>--}}

    <script type="text/javascript">
           
           $(document).ready(function() {
            $('#product_code').on('change', function() {
                var $p_code = $(this).val();
                if ($p_code) {
                    $.ajax({
                        url: "{{ url('/scan/data/ajax') }}/" + $p_code,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                           //const new_data =  JSON.stringify(data)
                           //console.log(new_data);
                            //myObj = JSON.parse(new_data);
                            //console.log(new_data.id);

                            $.each(data, function(key, value) {
                                $("#product_name").val(value.product_name);
                                $("#product_qty").val(value.product_qty);
                                $("#price").val(value.price);
                                $("#gst").val(value.gst);

                              // $("#short_desc").append(' <textarea name="short_descp" id="textarea" class="form-control" required placeholder="Textarea text">'+value.short_descp+'</textarea>');
                              $("#textarea").html(value.short_descp);
                               $("#a1").html(value.long_descp);
                             //  $("#long_descp").append(' <textarea id="editor1" class="long_descp" name="long_descp" rows="10" cols="80" required="">'+value.long_descp+'</textarea>')
                             if (value.hot_deals == 1) {
                                $("#checkbox_2").attr("checked","");
                             }
                             if (value.featured == 1) {
                                $("#checkbox_3").attr("checked","");
                             }
                             if (value.special_offer == 1) {
                                $("#checkbox_4").attr("checked","");
                             }
                             if (value.special_deals == 1) {
                                $("#checkbox_5").attr("checked","");
                             }
                                



                            });
                            
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            

        });



        



       
    </script>




@endsection
