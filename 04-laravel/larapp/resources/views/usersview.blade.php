<table>
    <thead>
        <tr>
            <th>id</th>
            <th>fullname</th>
            <th>gender</th>
            <th>email</th>
            <th>birth</th>
            
        </tr>
    </thead>
    <tbody>
@foreach ($users as $user)
    
        <tr>
            <td>{{ $user ->id}} </td>
            <td>{{ $user ->fullname}} </td> 
            <td>{{ $user ->gender}} </td>
            <td>{{ $user ->email}} </td>
            <td>{{ Carbon\Carbon::parse($user ->birthdate)->diffforhumans() }}</td>
            <td>{{ $user ->created_at->diffforhumans() }}</td>
            
        </tr>


@endforeach
    </tbody>
</table>