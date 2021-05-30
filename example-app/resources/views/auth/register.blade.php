@extends('layout.app')
@section('styles') <link rel="stylesheet" href="{{ asset('css/auth.css') }}"> @endsection
@section('content_inner')
    <div class="info">
        
        <h3>Log in</h3>
        <form autocomplete="off" action="{{ route('register') }}" method="post">
            @csrf
            <ul>
                <li>
                    <label for="email">E-mail:</label><br>
                    <input type="text" id="email" name="email" >
                    @error('email')
                        <div class="errors" id="email_errors">
                            {{ $message }}
                        </div>    
                    @enderror
                </li>
                    
                <li>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" >
                    <div class="pw_strength" id="pw_strength">
                        <span class="strength_text" id="strength_text">Password Strength: </span>
                        <span id="strength" class="strength"> </span>
                    </div>
                </li>

                <li>
                    <label for="password_confirm">Confirm Password:</label><br>
                    <input type="password" id="password_confirmation" name="password_confirmation" >
                    <div class="errors" id="pw_errors">
                        
                        @error('password_confirmation') {{ $message }} @enderror
                        @error('password') {{ $message }} @enderror
                    </div>
                    
                </li>
                    
                <li>
                    <label for="dob">Date of Birth:</label><br>
                    <input type="date" id="dob" name="dob" >
                </li>

                <li class="name_input">
                    <label>Name:</label><br>
                    <input type="text" id="f_name" placeholder="First" name="f_name" >
                    <input type="text" id="l_name" placeholder="Last" name="l_name" >
                </li>

                <li>
                    <label for="phone">Phone:</label><br>
                    <input type="tel" id="phone" name="phone" >
                    <div class="errors" id="phone_errors">
                        @error('phone') {{ $message }} @enderror
                    </div>
                    
                </li>

                <li style="display:flex; flex-direction: column;">
                    <button id="submit" name="submit">Submit</button>
                </li>
            </ul>
        </form>
            <div class="errors_wrapper">
                <p class="errors"></p>
            </div>
    </div>
{{-- 

    <script src="../JS/validation.js">
        
    </script>

    <script>
        
        var email_input = document.querySelector("#email");
        var pw_input = document.querySelector("#password");
        var pw_confirm_input = document.querySelector("#password_confirm");
        var phone_input = document.querySelector("#phone");
        var submit_btn = document.querySelector("#submit");
        email_input.addEventListener('keyup', () => valid_email(email_input.value));
        pw_input.addEventListener('keyup', () => valid_pw(pw_input.value));
        pw_confirm_input.addEventListener('keyup', () => {
            match = "";
            if (pw_input.value != pw_confirm_input.value) match = "Passwords do not match";
            document.querySelector("#pw_errors").innerHTML = match;
        });
        phone_input.addEventListener('keyup', () => valid_phone(phone_input.value));

    </script> --}}
@endsection