<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <style>
      .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 17cm;  
  height: auto; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <h1>INVOICE</h1>
      <div id="company" class="clearfix">
        <div>Ekhata</div>
    {{--    <div>455 Foggy Heights,<br /> AZ 85004, US</div>  --}}
        <div></div>
        <div><a href="mailto:company@example.com">www.ekhata.com</a></div>
      </div>
      <div id="project">
        <div><span>CLIENT</span> {{$data[0]->customer_name}}</div>
        <div><span>PHONE</span> <a href="mailto:john@example.com">{{$data[0]->phone}}</a></div>
        <div><span>DATE</span> {{ Carbon\Carbon::now()->format('d F Y')}}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="desc">PRODUCT NAME</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>GST</th>
            <th>TOTAL PRICE</th>
          </tr>
        </thead>
        <tbody>
            <?php  $total = 0 ?>
            @foreach ($items as $item)
          <tr>
            <td class="desc">{{$item->product->product_name}}</td>
            <td class="unit">INR {{ number_format($item->price,2)}}</td>
            <td class="qty">{{$item->quantity}}</td>
            <td>{{$item->gst}}</td>
            <td class="total">INR {{ number_format($item->total_price,2)}}</td>
          </tr>
          <?php $total = $total + $item->total_price; ?>
          @endforeach
          
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">{{number_format($total,2)}}</td>
          </tr>
        </tbody>
      </table>
    </main>
    <footer>
      THIS INVOICE WAS CREATED FROM EKHATA. TRY EKHATA NOW.
    </footer>
  </body>
</html>
