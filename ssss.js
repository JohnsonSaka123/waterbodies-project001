document.getElementById('imageUpload').addEventListener('change', function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        document.getElementById('imagePreview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
});

const images = document.querySelectorAll('.slideshow img');
let currentIndex = 0;

const signUpButton = document.getElementById('signUpButton');
const signInButton = document.getElementById('signInButton');
const signInForm = document.getElementById('signIn');
const signUpForm = document.getElementById('signUp');
const signUpSubmitButton = document.getElementById('signUpSubmitButton'); // Assuming you have a submit button for sign up

signUpButton.addEventListener('click', function() {
    signInForm.style.display = "none";
    signUpForm.style.display = "block";
});

signInButton.addEventListener('click', function() {
    signInForm.style.display = "block";
    signUpForm.style.display = "none";
});

function validatePassword() {
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("cPassword").value;
    let passwordError = document.getElementById("password-error");
    let confirmError = document.getElementById("confirm-error");

    // Password length validation
    if (password.length < 6) {
        passwordError.textContent = "Password must be at least 6 characters long.";
        signUpSubmitButton.disabled = true; // Disable the sign-up button
    } else {
        passwordError.textContent = "";
    }

    // Confirm password check
    if (confirmPassword !== "") {
        if (password === confirmPassword) {
            confirmError.textContent = "Passwords match ✅";
            confirmError.classList.remove("error");
            confirmError.classList.add("success");
            signUpSubmitButton.disabled = false; // Enable the sign-up button
        } else {
            confirmError.textContent = "Passwords do not match ❌";
            confirmError.classList.remove("success");
            confirmError.classList.add("error");
            signUpSubmitButton.disabled = true; // Disable the sign-up button
        }
    } else {
        confirmError.textContent = "";
        signUpSubmitButton.disabled = true; // Disable the sign-up button if confirm password is empty
    }
}

// Add event listeners to password and confirm password fields
document.getElementById("password").addEventListener("input", validatePassword);
document.getElementById("cPassword").addEventListener("input", validatePassword);

// Initially disable the sign-up button
signUpSubmitButton.disabled = true;