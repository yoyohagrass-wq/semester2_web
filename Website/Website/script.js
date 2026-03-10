let goal = 100000;
let currentAmount = 36000;

function getValue(id) {
    const field = document.getElementById(id);
    return field ? field.value.trim() : "";
}

function isValidEmail(email) {
    return email.includes("@");
}

function isValidPhone(phone) {
    return /^\d{11,}$/.test(phone);
}

function showError(message) {
    alert(message);
    return false;
}

function validateInquireForm() {
    const name = getValue("inquireName");
    const email = getValue("inquireEmail");
    const phone = getValue("inquirePhone");
    const message = getValue("inquireMessage");

    if (!name || !email || !phone || !message) {
        return showError("Please fill in all fields.");
    }

    if (!isValidEmail(email)) {
        return showError("Please enter a valid email.");
    }

    if (!isValidPhone(phone)) {
        return showError("Please enter a valid phone number.");
    }

    alert("Thank you for your inquiry, " + name + "!");
    return true;
}

function validateFeedbackForm() {
    const name = getValue("name");
    const email = getValue("email");
    const topic = getValue("topic");
    const message = getValue("message");

    if (!name) {
        return showError("Please enter your full name.");
    }

    if (!email) {
        return showError("Please enter your email.");
    }

    if (!isValidEmail(email)) {
        return showError("Please enter a valid email.");
    }

    if (!topic) {
        return showError("Please select a feedback type.");
    }

    if (!message) {
        return showError("Please enter your feedback message.");
    }

    alert("Thank you for your feedback, " + name + "!");
    return true;
}

function validateNewsletterForm() {
    const firstName = getValue("newsletterFirstName");
    const lastName = getValue("newsletterLastName");
    const email = getValue("newsletterEmail");

    if (!firstName || !lastName || !email) {
        return showError("Please fill in all fields.");
    }

    if (!isValidEmail(email)) {
        return showError("Please enter a valid email.");
    }

    alert("Thank you for subscribing, " + firstName + "!");
    return true;
}

function validateVolunteerForm() {
    const name = getValue("name");
    const email = getValue("email");
    const phone = getValue("phone");

    if (!name) {
        return showError("Please enter your full name.");
    }

    if (!email) {
        return showError("Please enter your email.");
    }

    if (!isValidEmail(email)) {
        return showError("Please enter a valid email.");
    }

    if (!isValidPhone(phone)) {
        return showError("Please enter a valid phone number.");
    }

    alert("Form submitted successfully!");
    return true;
}

function updateProgress() {
    const progressBar = document.getElementById("progressBar");
    const progressText = document.getElementById("progressText");

    if (!progressBar || !progressText) {
        return;
    }

    let percent = (currentAmount / goal) * 100;
    if (percent > 100) {
        percent = 100;
    }

    progressBar.style.width = percent + "%";
    progressText.textContent = "EGP " + currentAmount + " raised out of " + goal + " (January goal)";
}

function validateDonateForm() {
    const name = getValue("name");
    const email = getValue("email");
    const amount = parseFloat(getValue("donation-amount"));

    if (!name) {
        return showError("Please enter your full name.");
    }

    if (!email) {
        return showError("Please enter your email.");
    }

    if (!isValidEmail(email)) {
        return showError("Please enter a valid email.");
    }

    if (isNaN(amount) || amount <= 0) {
        return showError("Please enter a valid donation amount.");
    }

    return true;
}

function setWelcomeMessage() {
    const welcomeMessage = document.getElementById("welcomeMessage");

    if (!welcomeMessage) {
        return;
    }

    const hour = new Date().getHours();
    let greeting = "Good evening";

    if (hour < 12) {
        greeting = "Good morning";
    } else if (hour < 18) {
        greeting = "Good afternoon";
    }

    welcomeMessage.textContent = greeting + ". Thank you for supporting families across Egypt.";
}

function setupFeedbackForm() {
    const form = document.getElementById("feedbackForm");

    if (!form) {
        return;
    }

    form.addEventListener("submit", function (event) {
        if (!validateFeedbackForm()) {
            event.preventDefault();
        }
    });
}

function setupVolunteerForm() {
    const form = document.getElementById("volunteerForm");

    if (!form) {
        return;
    }

    form.addEventListener("submit", function (event) {
        if (!validateVolunteerForm()) {
            event.preventDefault();
        }
    });
}

function setupDonateForm() {
    const form = document.getElementById("donateForm");
    const amountField = document.getElementById("donation-amount");

    if (!form || !amountField) {
        return;
    }

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        if (!validateDonateForm()) {
            return;
        }

        const amount = parseFloat(amountField.value);
        currentAmount += amount;
        updateProgress();

        alert("Thank you for donating EGP " + amount + "!");

        amountField.value = "";
        const nameField = document.getElementById("name");
        const emailField = document.getElementById("email");

        if (nameField) {
            nameField.value = "";
        }

        if (emailField) {
            emailField.value = "";
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    setWelcomeMessage();
    updateProgress();
    setupFeedbackForm();
    setupVolunteerForm();
    setupDonateForm();
});
