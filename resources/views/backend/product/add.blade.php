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
						<h3 class="box-title">Add Product </h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="post" action="{{route("store.product")}}" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<h5>Product Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="product_name" class="form-control" required>
										@error('product_name')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

                                <div class="form-group">
									<h5>Product Price <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="number" name="price" class="form-control" required>
										@error('price')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

                                <div class="form-group">
									<h5>Product Code </h5>
									<div class="controls">
										<input type="text" name="product_code" class="form-control">
										@error('product_code')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

                                <div class="form-group">
									<h5>GST <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="number" name="gst" class="form-control" required>
										@error('gst')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

                                <div class="form-group">
									<h5>Product quantity <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="number" name="product_qty" class="form-control" required>
										@error('product_qty')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>


								<div class="text-xs-right">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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
