
<table>
    <tr>
    <th>Staff Name</th>
     <th>Leave Name</th>
    <th>Leave Days</th>
     <th>Available Leave Days</th>
    </tr>
    @foreach($leave as $leaves)
    <tr>
        <td>{{$leaves->leavetype?$leaves->leavetype?->staff_name:"-"}}</td>
                            <td>{{$leaves->leave_name}}</td>
                            <td>{{$leaves->leave_days}}</td>
                            <td>{{$leaves->leavetype?$leaves->leavetype?->leave_days:"-"}}</td>

    </tr>
@endforeach
  </table>
