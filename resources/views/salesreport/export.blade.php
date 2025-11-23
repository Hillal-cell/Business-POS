
<table>
    <tr>
      <th>Product Name</th>
      <th>Selling Price</th>
      <th>Quantity</th>
      <th>Date</th>
    </tr>
    @foreach($salereport as $salereports)
    <tr>
      <td>{{$salereports->productsale?$salereports->productsale->product_name:"-"}}</td>
      <td>{{$salereports->selling_priceid}}</td>
      <td>{{$salereports->qty}}</td>
      <td>{{$salereports->created_at}}</td>
    </tr>
@endforeach
  </table>
