@php
    use App\Helpers\Enums\LoginFormType;
    /**
    * @var string $formType
    * */
    /*check login form type and pass form action accordingly*/
    $formAction = $formType === LoginFormType::USER->value ? route('user.auth.login') : route('admin.auth.login');
@endphp
@use(Illuminate\Support\Str)
<x-general.layout title="LaughLab - Login {{$formType}} ">
    <section class="form-section page-padding">
        <div class="form-wrapper">
            <h2 class="form-title">{{Str::ucfirst($formType)}} Login</h2>
            <x-response.error />
            <form method="POST" action="{{$formAction}}">
                @csrf
                @method('POST')
                <div class="input-wrapper">
                    <label for="identifier">Username or email</label>
                    <input type="text" id="identifier" name="identifier" placeholder="Username or email" required maxlength="150" value="{{old('identifier', '')}}">
                </div>
                <div class="input-wrapper">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <input type="submit" value="Login" class="submit-button">
            </form>
        </div>
    </section>
</x-general.layout>
