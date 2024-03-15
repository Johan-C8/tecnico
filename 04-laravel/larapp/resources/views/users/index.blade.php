@extends('Layouts.app')
@section('tittle'. 'Users Page - PetsApp')

@section('content')
<header class="nav level-0">
    <a href="">
        <img src="{{ asset('images/ico-back.svg')}}" alt="Back">
    </a>
    <img src="{{ asset('images/logo.svg')}}" alt="Logo">
    <a href="" class="mburger">
        <img src="{{ asset('images/mburger.svg')}}" alt="Menu Burger">
    </a>
</header>
<section class="module">
    <h1>Module User</h1>
    <a class="add" href="{{ url('users/add') }}">
        <img src="{{ asset('images/ico-add.svg')}}" width="30px" alt="Add">
        Add User
    </a>
    <table>
        <tbody>
        @foreach ($users as $user )
            
        
            <tr>
                <td>
                    <img src={{ asset('images/'.$user->photo) }}" alt="User">
                </td>
                <td>
                    <span>{{ $user->fullname}}</span>
                    <span>{{ $user->role}}</span>
                </td>
                <td>
                    <a href="{{ url('users/'.$user->id)}}" class="show">
                        <img src="{{ asset('images/ico-show.svg') }}" alt="Show">
                    </a>
                    <a href="{{ url('users/edit/' . $user->id) }}" class="Edit">
                        <img src="{{ asset('images/ico-edit.svg')}}" alt="Edit">
                    </a>
                    <a href="javascript:;" class="delete" data-id="{{ $user->id }}">
                        <img src="{{ asset('images/ico-delete.svg') }}" alt="Delete">
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">{{ $users->links()}}</td>
            </tr>
        </tfoot>
    </table>
</section>
@endsection