@extends('layout.app')
@section('styles') 
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}"> 
    
@endsection
@php
@endphp
@section('content_inner')
    <div class="outer_container">
        <div class="header_and_content">
            
            <div class="content">
                <div class="info">
                    <h3>Log in</h3>
                        
                        <form autocomplete="off" action="{{ route('login') }}" method="post">
                            @csrf
                            <ul>
                                <li>
                                    <label for="email">E-mail:</label><br>
                                    <input type="text" id="email" name="email" required>
                                </li>
                                    
                                <li>
                                    <label for="password">Password:</label><br>
                                    <input type="password" id="password" name="password" required>
                                </li>

                                <li style="display:flex;flex-direction: column;" >
                                    <button id="submit" class="btn_1" name="submit">
                                        <span>Submit</span></button>
                                </li>
                                    
                            </ul>
                        </form>
                        <div class="errors_wrapper">
                            <p class="errors" style="margin-left:30px;">
                                @if (session('status'))
                                    {{ session('status') }}
                                @endif
                            </p>
                        </div>
                </div>
            </div>
                
        </div>
    </div>
@endsection