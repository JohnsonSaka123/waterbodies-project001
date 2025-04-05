document.getElementById('imageUpload').addEventListener('change', function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        document.getElementById('imagePreview').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
});

const images = document.querySelectorAll('.slideshow img');
let currentIndex = 0;

const signUpButton=document.getElementById('signUpButton')
const signInButton=document.getElementById('signInButton')
const signInForm=document.getElementById('signIn')
const signUpForm=document.getElementById('signUp')

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click',function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})

function validatePassword() {
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("cPassword").value;
    let passwordError = document.getElementById("password-error");
    let confirmError = document.getElementById("confirm-error");

    // Password length validation
    if (password.length < 6) {
        passwordError.textContent = "Password must be at least 6 characters long.";
    } else {
        passwordError.textContent = "";
    }

    // Confirm password check
    if (confirmPassword !== "") {
        if (password === confirmPassword) {
            confirmError.textContent = "Passwords match ✅";
            confirmError.classList.remove("error");
            confirmError.classList.add("success");
        } else {
            confirmError.textContent = "Passwords do not match ❌";
            confirmError.classList.remove("success");
            confirmError.classList.add("error");
        }
    } else {
        confirmError.textContent = "";
    }
}