@extends('backend.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

<div class="container-full">
	<!-- Content Header (Page header) -->


	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-9 m-auto">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Edit Product </h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="post" action="{{route("update.product", $product[0]->id)}}" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<h5>Product Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" value="{{$product[0]->product_name}}" name="product_name" class="form-control" required>
										@error('product_name')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

                                <div class="form-group">
									<h5>Product Price <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="number" value="{{$product[0]->price}}" name="price" class="form-control" required>
										@error('price')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

                                <div class="form-group">
                                    <h5>Product BarCode <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <div>
                                            <div class="barcode; text-align: center; align-content: center;"
                                                style="background-color: white; padding-top: 1rem; padding-left: 3rem; display: block; width:300px">
                                                {!! DNS1D::getBarcodeHTML($product[0]->product_code, 'C128', 1.6, 25) !!}
                                           

                                                <p style="padding-left: 2rem;" class="pid">
                                                    {{ $product[0]->product_code }}</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4" style="margin-bottom: 2rem">
                                    <h5>Download Barcode<span class="text-danger">*</span></h5>
                                    <a class="btn btn-success" href="{{route("download.barcode",$product[0]->product_code)}}">Download</a>
                                    
                                </div>

                                <div class="form-group">
									<h5>GST <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="number" value="{{$product[0]->gst}}" name="gst" class="form-control" required>
										@error('gst')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

                                <div class="form-group">
									<h5>Product quantity <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="number" value="{{$product[0]->product_qty}}" name="product_qty" class="form-control" required>
										@error('product_qty')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>


								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
								</div>
							</form>

						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>




		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

</div>




@endsection

<script type="text/javascript">
	function mainThamUrl(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#mainThmb').attr('src', e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>
