{{--change password view--}}
<x-general.layout title="LaughLab - Change Password">
    <section class="form-section page-padding">
        <div class="form-wrapper">
            <h2 class="form-title">Update Your Password</h2>
            <x-response.error />
            <x-response.success />
            <form method="POST" action="{{route('user.password.update')}}">
                @csrf
                @method('PATCH')
                <div class="input-wrapper">
                    <label for="old_password">Old password: </label>
                    <input type="password" id="old_password" name="old_password" required>
                </div>
                <div class="input-wrapper">
                    <label for="new_password">New Password: </label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>
                <div class="input-wrapper">
                    <label for="new_password_confirmation">New Password Repeat:</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>
                <input type="submit" value="Update" class="submit-button">
            </form>
        </div>
    </section>
</x-general.layout>
