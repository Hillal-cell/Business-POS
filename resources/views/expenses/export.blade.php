
<table>
    <tr>
    <th>Expense Name</th>
     <th>Expense Amount</th>
    <th>Description</th>
     <th>Date</th>
    </tr>
    @foreach($expense as $expenses)
    <tr>
      <td>{{$expenses->expense_name}}</td>
      <td>{{$expenses->expense_amount}}</td>
      <td>{{$expenses->expense_date}}</td>
      <td>{{$expenses->expense_description}}</td>
     
    </tr>
@endforeach
  </table>
