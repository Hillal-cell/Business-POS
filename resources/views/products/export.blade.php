
<table>
    <tr>
      <th>Product Name</th>
      <th>Unit Name</th>
      <th>Selling Price</th>
      <th>Quantity</th>
      <th>Alert Stock</th>
      <th>Buying Price</th>
    </tr>
    @foreach($product as $products)
    <tr>
      <td>{{$products->product_name}}</td>
      <td>{{$products->unit?$products->unit->unit_name:"-"}}</td>
      <td>{{$products->selling_price}}</td>
      <td>{{$products->quantity}}</td>
      <td>{{$products->alert_stock}}</td>
      <td>{{$products->buying_price}}</td>
    </tr>
@endforeach
  </table>
