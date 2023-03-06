<link rel="stylesheet" href="css/log.css">
<!--Background image-->
<div class="bg_img"></div>
    <!--Content-->
    <div class="container">
        <div class="leftside">
            <img src="assets/left.png" alt="">
            <img class="APC" src="assets/APC_Logo.png" alt="">
            <img class="cLogo" src="assets/E-Cliniq_Logo.png" alt="">
        </div>
            
        <!--Rightside background-->
        <div class="rightside_BG"></div>
        <!--Enter credentials-->
        <div class="rightside_logSS">
            <h2>Log-In</h2>
            <form method="POST" action="{{ route('login') }}" class="login_form">
                @csrf
                <!--User's APC email-->
                <label for="email">{{__('Email')}}</label>
                <input id="email" class="text_area" type="email" name="email" :value="{{old('email')}}" required autofocus autocomplete="email" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <!--User's password-->
                <label for="password">{{__('Password')}}</label>
                <input id="password" class="text_area"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <button type="submit" id="submit_btn" class="btn btn-primary">
                {{ __('Log in') }}
                </button>
            </form>
        </div>
    </div>