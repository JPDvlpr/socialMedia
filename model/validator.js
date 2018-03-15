"use strict";
var firstNames = document.getElementById("firstName");
var lastNames = document.getElementById("lastName");
var emails = document.getElementById("email");
var passwords = document.getElementById("password");
var repeatpasswords = document.getElementById("repeatpassword");
var navemails = document.getElementById("navemail");
var ages = document.getElementById("age");
var phonenumbers = document.getElementById("phonenumber");
var biograpys = document.getElementById("biography");



firstNames.onkeypress = validate_firstname;
lastNames.onkeypress = validate_lastname;
emails.onkeypress = validate_email;
repeatpasswords.onkeypress = validate_repeatpassword;
navemails.onkeypress = validate_navemail;
ages.onkeypress = validate_age;
phonenumbers.onkeypress = validatephonenumber;
biograpys.onkeypress = validate_biography;

function validate_firstname() {
    var firstName = firstNames.value;
    if (validName(firstName)) {
        firstNames.style.borderColor = "green";
    } else {
        firstNames.style.borderColor = "red";
    }
}

function validate_lastname() {
    var lastName = lastNames.value;
    if (validName(lastName)) {
        lastNames.style.borderColor = "green";
    } else {
        lastNames.style.borderColor = "red";
    }
}

function validName(name) {
    var exp = /^[a-zA-Z ]*$/;
    var regex = new RegExp(exp);
    return name.search(regex) == 0;
}

function validate_email() {
    var email = emails.value;
    var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
    if (regex.test(email)) {
        emails.style.borderColor = "green";
    } else {
        emails.style.borderColor = "red";
    }
}

function validate_navemail() {
    var navemail = navemails.value;
    var regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
    if (regex.test(navemail)) {
        navemails.style.borderColor = "green";
    } else {
        navemails.style.borderColor = "red";
    }
}

function validate_repeatpassword() {
    var password = passwords.value;
    var repeatpassword = repeatpasswords.value;
    if (password == repeatpassword) {
        repeatpasswords.style.borderColor = "green";
    } else {
        repeatpasswords.style.borderColor = "red";
    }
}
function validatephonenumber() {
    var phonenumber = phonenumbers.value;
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if ((phoneno.test(phonenumber))) {
        phonenumbers.style.borderColor = "green";
    } else {
        phonenumbers.style.borderColor = "red";
    }
}

function validate_biography() {
    var biography = biograpys.value;
    if (biography.length>=10 ) {
        biograpys.style.borderColor = "green";
    } else {
        biograpys.style.borderColor = "red";
    }
}

function validate_age() {
    var age = ages.value;
    if (age >= 18) {
        ages.style.borderColor = "green";
    } else {
        ages.style.borderColor = "red";
    }
}
