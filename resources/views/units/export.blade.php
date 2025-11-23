
<table>
    <tr>
      <th>Unit Name</th>
      <th>Symbol</th>
    </tr>
    @foreach($unit as $units)
    <tr>
      <td>{{$units->unit_name}}</td>
      <td>{{$units->symbol}}</td>
    </tr>
@endforeach
  </table>
