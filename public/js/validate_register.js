/*validate register form*/
document.addEventListener("DOMContentLoaded", () => {

    const registerForm = document.querySelector("form");
    registerForm.addEventListener("submit", e => {
        e.preventDefault();

        //get password fields for validation
        const password = registerForm.querySelector("#password");
        const repeatPassword = registerForm.querySelector("#password_confirmation");

        /*check if they're the same*/
        if (password.value !== repeatPassword.value) {
            alert("Passwords do not match!");
            return;
        }

        registerForm.submit();
    });

});
