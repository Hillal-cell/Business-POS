<table>
    <tr>
        <th>Supplier Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Date</th>

    </tr>
    @foreach($supplier as $suppliers)
    <tr>
        <td>{{$suppliers->supplier_name}}</td>
        <td>{{$suppliers->address}}</td>
        <td>{{$suppliers->phone}}</td>
        <td>{{$suppliers->email}}</td>
        <td>{{$suppliers->supplier_date}}</td>
    </tr>
@endforeach
  </table>
