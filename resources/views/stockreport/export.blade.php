
<table>
    <tr>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Selling Price</th>
      <th>Date</th>
    </tr>
    @foreach($stock as $stocks)
    <tr>
      <td>{{$stocks->stocklistpdt?$stocks->stocklistpdt->product_name:"-"}}</td>
      <td>{{$stocks->qty}}</td>
      <td>{{$stocks->buying_price}}</td>
      <td>{{$stocks->created_at}}</td>
    </tr>
@endforeach
  </table>
