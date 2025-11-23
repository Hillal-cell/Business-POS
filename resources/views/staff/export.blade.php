
<table>
    <tr>
      <th>Staff Name</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Date of Birth</th>
      <th>Gender</th>
      <th>Address</th>
    </tr>
    @foreach($staff as $staffs)
    <tr>
      <td>{{$staffs->staff_name}}</td>
      <td>{{$staffs->staff_contact}}</td>
      <td>{{$staffs->staff_email}}</td>
      <td>{{$staffs->staff_dob}}</td>
      <td>{{$staffs->gender}}</td>
      <td>{{$staffs->staff_address}}</td>
    </tr>
@endforeach
  </table>
