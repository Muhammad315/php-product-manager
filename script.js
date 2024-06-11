function validateForm() {
    var nameRegex = /^[A-Za-z\s]+$/;
    var emailRegex = /^\S+@\S+\.\S+$/;
    var passwordRegex = /^.{6,20}$/;
    var phoneRegex = /^\d{11}$/;

    var name = document.forms['myForm']['name'].value;
    var email = document.forms['myForm']['email'].value;
    var password = document.forms['myForm']['password'].value;
    var confirmPassword = document.forms['myForm']['confirmPassword'].value;
    var companyName = document.forms['myForm']['companyName'].value;
    var phone = document.forms['myForm']['phone'].value;
    var country = document.forms['myForm']['countries'].value;
    var companyType = document.querySelector('input[name="companyType"]:checked');
    var paymentMethods = document.querySelectorAll('input[name="paymentMethod[]"]:checked');

    var nameError = document.getElementById('name-error');
    var emailError = document.getElementById('email-error');
    var passwordError = document.getElementById('password-error');
    var confirmPasswordError = document.getElementById('confirmPassword-error');
    var companyNameError = document.getElementById('companyName-error');
    var phoneError = document.getElementById('phone-error');
    var countriesError = document.getElementById('countries-error');
    var companyTypeError = document.getElementById('companyType-error');
    var paymentMethodError = document.getElementById('paymentMethod-error');

    nameError.textContent = "";
    emailError.textContent = "";
    passwordError.textContent = "";
    confirmPasswordError.textContent = "";
    companyNameError.textContent = "";
    phoneError.textContent = "";
    countriesError.textContent = "";
    companyTypeError.textContent = "";
    paymentMethodError.textContent = "";

    let isValid = true;

    if (name === "" || !name.match(nameRegex)) {
        nameError.textContent = "Please enter a valid name.";
        isValid = false;
    }

    if (email === "" || !email.match(emailRegex)) {
        emailError.textContent = "Please enter a valid email address.";
        isValid = false;
    }

    if (password === "" || !password.match(passwordRegex)) {
        passwordError.textContent = "Password must be between 6 and 20 characters long.";
        isValid = false;
    }

    if (confirmPassword === "" || confirmPassword !== password) {
        confirmPasswordError.textContent = "Passwords do not match.";
        isValid = false;
    }

    if (companyName.trim() === "") {
        companyNameError.textContent = "Please enter your company name.";
        isValid = false;
    }

    if (phone === "" || !phone.match(phoneRegex)) {
        phoneError.textContent = "Please enter a valid phone number with 11 digits.";
        isValid = false;
    }

    if (country === "") {
        countriesError.textContent = "Please select a country.";
        isValid = false;
    }

    if (!companyType) {
        companyTypeError.textContent = "Please select a company type.";
        isValid = false;
    }

    if (paymentMethods.length === 0) {
        paymentMethodError.textContent = "Please select at least one payment method.";
        isValid = false;
    }

    if(isValid === true){
        alert("Registered Successfully!");
    }

    return isValid;
}