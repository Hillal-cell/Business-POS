
<table>
    <tr>
      <th>Product Category</th>

    </tr>
    @foreach($pdtcategory as $pdtcategories)
    <tr>
      <td>{{$pdtcategories->category_name}}</td>

    </tr>
@endforeach
  </table>
