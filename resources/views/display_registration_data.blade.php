<table border="1">
    <tr>
        <th>Fullname</th>
        <th>Email</th>
        <th>Password</th>
        <th>Mobile</th>
        <th>Age</th>
        <th>Gender</th>
        <th>hobbies</th>
        <th>qualification</th>
        <th>address</th>
        <th>Picture</th>
        <th>role</th>
        <th>status</th>
        <th>edit</th>
        <th>delete</th>
        <th>activation</th>
    </tr>
    @foreach ($r as $r1)
        <tr>
            <td>{{ $r1['fullname'] }}</td>
            <td>{{ $r1['email'] }}</td>
            <td>{{ $r1['password'] }}</td>
            <td>{{ $r1['mobile'] }}</td>
            <td>{{ $r1['age'] }}</td>
            <td>{{ $r1['gender'] }}</td>
            <td>{{ $r1['hobbies'] }}</td>
            <td>{{ $r1['qualification'] }}</td>
            <td>{{ $r1['address'] }}</td>
            <td><img src="Images/profile_pictures/{{ $r1['pic'] }}" height="100px" width="150px" /></td>
            <td>{{ $r1['role'] }}</td>
            <td>{{ $r1['status'] }}</td>
            <td><a href="edit_user/{{ $r1['email'] }}"><input type="button" value="Edit Data"></a></td>
            <td><a href="delete_user/{{ $r1['email'] }}"><input type="button" value="Delete Data"></a></td>
            <td>
                @if ($r1['status'] == 'Active')
                    <a href="Deactivate/{{ $r1['email'] }}"><input type="button" value="Deactivate"></a>
                @else
                    <a href="Activate/{{ $r1['email'] }}"><input type="button" value="Activate"></a>
                @endif
            </td>
        </tr>
    @endforeach
</table>
