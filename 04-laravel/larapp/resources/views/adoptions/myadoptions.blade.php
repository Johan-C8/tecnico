@extends('layouts.app')
@section('title', 'Adoption Page - PetsApp')

@section('content')
<header class="nav level-2">
    <a href="{{ route('dashboard') }}">
        <img src="{{ asset('images/ico-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/logo.svg') }}" alt="Logo">
    <a href="javascript:;" class="mburger">
        <img src="{{ asset('images/mburger.svg') }}" alt="Menu Burger">
    </a>
</header>
<section class="module">
    <h1>Module Adoptions</h1>
    <a class="add" href="{{ url('adoptions/create' )}}"></a>
    <img src="{{ asset('images/ico-add.svg') }}" width="30px">
    Add Adoptions
    <table>
        <tbody class='adoptions'>
        @forelse ($adps as $adp)
            <tr>
                <td>
                    <img src="{{ asset('images/'.$adp->user->photo) }}" alt="User">
                    <img src="{{ asset('images/'.$adp->pet->photo) }}" alt="User">
                </td>
                <td>
                    <span>{{ $adp->user->fullname }}</span>
                    <span>{{ $adp->pet->name }}</span>
                    <span>{{ $adp->created_at->diffforhumans() }}</span>
                </td>
            </tr>
            @empty

            <p class="no-adoptions">
                Adoptions no yet... <br>
                please adop  🐾
            </p>
            

            @endforelse
        </tbody>
        
    </table>
</section>
@endsection