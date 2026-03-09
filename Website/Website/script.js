// Inquire Form validation 
function validateInquireForm() {
    try {
        let name = document.getElementById("inquireName").value.trim();
        let email = document.getElementById("inquireEmail").value.trim();
        let phone = document.getElementById("inquirePhone").value.trim();
        let message = document.getElementById("inquireMessage").value.trim();

        if (!name || !email || !phone || !message) {
            throw new Error("Please fill in all fields.");
        }

        if (!email.includes("@")) {
            throw new Error("Please enter a valid email.");
        }

        if (isNaN(phone)) {
            throw new Error("Phone number must contain only digits.");
        }

        if (phone.length < 11) {
            throw new Error("Please enter a valid phone number.");
        }

        alert("Thank you for your inquiry, " + name + "!");
        return true;

    } catch (error) {
        alert(error.message);
        return false;
    }
}




// Feedback form validation
function validateFeedbackForm() {
    try {
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let phone = document.getElementById("phone").value.trim();
        let topic = document.getElementById("topic").value.trim();
        let message = document.getElementById("message").value.trim();

        if (name === "") {
            throw new Error("Please enter your full name.");
        }

        if (email === "") {
            throw new Error("Please enter your email.");
        }

        if (!email.includes("@")) {
            throw new Error("Email must contain @.");
        }

        if (topic === "") {
            throw new Error("Please select a feedback type.");
        }

        if (message === "") {
            throw new Error("Please enter your feedback message.");
        }

        alert("Thank you for your feedback, " + name + "!");
        return true;

    } catch (error) {
        alert(error.message);
        return false;
    }
}






// Newsletter form validation
function validateNewsletterForm() {
    try {
        let firstName = document.getElementById("newsletterFirstName").value.trim();
        let lastName = document.getElementById("newsletterLastName").value.trim();
        let email = document.getElementById("newsletterEmail").value.trim();

        if (firstName === "" || lastName === "" || email === "") {
            throw new Error("Please fill in all fields.");
        }

        if (!email.includes("@")) {
            throw new Error("Please enter a valid email.");
        }

        alert("Thank you for subscribing, " + firstName + "!");
        return true;

    } catch (error) {
        alert(error.message);
        return false;
    }
}



// Volunteer form validation
function validateVolunteerForm() {
    try {
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let phone = document.getElementById("phone").value.trim();

        if (name === "") {
            throw new Error("Please enter your full name.");
        }

        if (email === "") {
            throw new Error("Please enter your email.");
        }

        if (!email.includes("@")) {
            throw new Error("Email must contain @.");
        }

        if (isNaN(phone)) {
            throw new Error("Phone number must contain only digits.");
        }

        if (phone.length < 11) {
            throw new Error("Please enter a valid phone number.");
        }

        alert("Form submitted successfully!");
        return true;

    } catch (error) {
        alert(error.message);
        return false;
    }
}



//-----------------------------Donate Form and Progress bar-----------------------------
let goal = 100000;
let currentAmount = 36000;

function updateProgress() {
    let percent = (currentAmount / goal) * 100;
    if (percent > 100) percent = 100;
    document.getElementById("progressBar").style.width = percent + "%";
    document.getElementById("progressText").innerText =
        `EGP ${currentAmount} raised out of ${goal} (January goal)`;
}

// Donate Form validation
function validateDonateForm() {
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let amount = document.getElementById("donation-amount").value.trim();
    
    if (name === "") {
        alert("Please enter your full name.");
        return false;
    }
    if (email === "") {
        alert("Please enter your email.");
        return false;
    }
    if (!email.includes("@")) {
        alert("Email must contain @.");
        return false;
    }
    let typedAmount = parseFloat(amount);
    if (amount === "" || isNaN(typedAmount) || typedAmount <= 0) {
        alert("Please enter a valid donation amount (positive number).");
        return false;
    }

    return true;
}

// Update progress bar after successful donation
window.onload = function() {
    updateProgress();

    const donationInput = document.getElementById("donation-amount");
    const donateForm = document.getElementById("donateForm");

    donateForm.addEventListener("submit", function(e) {
        e.preventDefault();

        if (validateDonateForm()) {
            let typedAmount = parseFloat(donationInput.value);
            currentAmount += typedAmount;
            updateProgress();
            alert(`Thank you for donating EGP ${typedAmount}!`);

            donationInput.value = "";
            document.getElementById("name").value = "";
            document.getElementById("email").value = "";
        }
    });
};
