{{--register form for user--}}
<x-general.layout title="LaughLab - Register">
    <section class="form-section page-padding">
        <div class="form-wrapper">
            <h2 class="form-title">New User Account Register</h2>
            <p>
                <span class="form-response error-response">*</span>
                - required field
            </p>
            <x-response.error />
            <x-response.success />
            <form method="POST" action="{{route('user.auth.register')}}">
                @csrf
                @method('POST')
                <div class="input-wrapper">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" required maxlength="150" value="{{old('username', '')}}">
                </div>
                <div class="input-wrapper">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="example@example.com" required maxlength="150" value="{{old('email', '')}}">
                </div>
                <div class="input-wrapper">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" placeholder="2005-01-01" required value="{{old('date_of_birth', '')}}">
                </div>
                <div class="input-wrapper">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required minlength="8">
                </div>
                <div class="input-wrapper">
                    <label for="password_confirmation">Repeat password</label>
                    <input type="password"  name="password_confirmation" id="password_confirmation" placeholder="Repeat password" required minlength="8"/>
                </div>
                <input type="submit" value="Register" class="submit-button">
            </form>
        </div>
    </section>
    <script src="{{url("js/validate_register.js")}}"></script>
</x-general.layout>
