@extends('backend.admin_master')
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
				  <h3 class="box-title">Orders Details</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Product Name </th>
								<th>quantity </th>
								<th>Price </th>
                                <th>GST</th>
                                <th>Total Price</th>
							</tr>
						</thead>
						<tbody>
	 @foreach($details as $item)
	 <tr>
		<td> {{ $item->product->product_name}}  </td>
		<td> {{ $item->quantity }}  </td>
		<td> INR {{ number_format($item->price,2) }}  </td>

		<td> {{ $item->gst }}  </td>
        <td> INR {{ number_format($item->total_price,2) }}  </td>
							 
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
