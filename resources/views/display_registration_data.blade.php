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
            <td><img src="{{ URL::to('/') }}/Images/profile_pictures/{{ $r1['pic'] }}" height="100px"
                    width="150px" /></td>
            <td>{{ $r1['role'] }}</td>
            <td>{{ $r1['status'] }}</td>
            <td><a href="{{ URL::to('/') }}/edit_user/{{ $r1['email'] }}"><input type="button" value="Edit Data"></a>
            </td>
            <td><a href="{{ URL::to('/') }}/delete_user/{{ $r1['email'] }}"><input type="button"
                        value="Delete Data"></a></td>
            <td>
                @if ($r1['status'] == 'Active')
                    <a href="{{ URL::to('/') }}/Deactivate/{{ $r1['email'] }}"><input type="button"
                            value="Deactivate"></a>
                @elseif($r1['status'] == 'Inactive')
                    <a href="{{ URL::to('/') }}/Activate/{{ $r1['email'] }}"><input type="button"
                            value="Activate"></a>
                @else
                    <a href="{{ URL::to('/') }}/Reactivate/{{ $r1['email'] }}"><input type="button"
                            value="Reactivate"></a>
                @endif
            </td>
        </tr>
    @endforeach
</table>
http://127.0.0.1:8000/delete_user/vuday123@gmail.com
http://127.0.0.1:8000/delete_user/delete_user/vuday@gmail.com
