{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<style>
    div.menu {
        background-color: #192757;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2rem;
        position: absolute;
        top: -2000px;

        left: 0;
        z-index: 9999;
        justify-content: center;
        min-height: 100vh;
        width: 100%;

        a:is(:link, :visited) {
            border: 1px solid #fff;
            border-radius: 50px;
            color: #fff;
            font-size: 2rem;
            padding: 10px 20px;
            text-decoration: none;
        }
    }
    div.menu.open {
        animation: openMenu 0.5s ease-in 1 forwards;
    }
    
    div.menu.close {
        animation: closeMenu 0.5s ease-in 1 forwards;
    }


    @keyframes openMenu{
        0%{
            top: -1000px;
            opacity: 0;
        }100%{
            top: 0;
            opacity: 1;
        }
    }

    
    @keyframes closeMenu{
        0%{
            top: 0;
            opacity: 1;
        }100%{
            top: -1000px;
            opacity: 0;
        }
    }
    a.closem {
            position: absolute;
            top: 44px;
            right: 0px;
        }

        nav {
            color: #fff9;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;

            img {
                border: 2px solid #fff;
                border-radius: 60%;
                object-fit: cover;
                height: 200px;
                width: 200px;
            }

            h4, h5 {
                margin: 0;
            }

            a.closes {
                border: 2px solid #fff;
                
            }
            .closes{
                color: white;
                border: 1px solid white;
                background-color: #42112c;
                border-radius: 50px;
                height: 42px;
                width: 127px;
                cursor: pointer;
            }
            .closes:hover{
                transform: scale(1.2);
                transition: 1s;
            }

        }
    
    div.menu.open {
        top: 0;
        opacity: 1;
    }

    


</style>
@extends('layouts.app')

@section('title', 'Dashboard Page - PetsApp')

@section('content')

<div class="menu">
    <a href="javascript:;" class="closem">
        <img src="{{ asset('images/mburger-close.svg') }}" alt="">X
    </a>
    <nav>
        <img src="{{ asset('images') . '/' . Auth::user()->photo }}" alt="Photo">
        <h4>{{ Auth::user()->fullname }}</h4>
        <h5>{{ Auth::user()->role }}</h5>
        <form action="{{ route('logout') }}" method="post">
            <button class="closes">Log Out</button>
            @csrf
        </form>
    </nav>
</div>


<header class="nav level-0">
    <a href="">
        <img src="{{ asset('images/ico-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/logo.svg') }}" alt="Logo">
    <a href="javascript:;" class="mburger">
        <img src="{{ asset('images/mburger.svg') }}" alt="Menu Burger">
    </a>
</header>


<section class="dashboard">
    <h1>Dashboard</h1>
    <menu>
        <ul>
            <li>
                <a href="{{ url('users') }}">
                    <img src="{{ asset('images/ico-users.svg') }}" alt="Users">
                    <span>Module User</span>    
                </a>
            </li>
            <li>
                <a href="{{ url('pets') }}">
                    <img src="{{ asset('images/ico-pets.svg') }}" alt="Pets">
                    <span>Module Pets</span>
                </a>
            </li>
            <li>
                <a href="{{ url('adoptions') }}">
                    <img src="{{ asset('images/ico-adoptions.svg') }}" alt="Adoptions">
                    <span>Module Adoptions</span>
                </a>
            </li>
        </ul>
    </menu>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('body').on('click', '.mburger',  function () {
            $('.menu').addClass('open')
        })
        $('body').on('click', '.closem',  function () {
            $('.menu').removeClass('open')
        })
    })
</script>
@endsection