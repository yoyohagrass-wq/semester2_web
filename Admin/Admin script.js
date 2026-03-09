/*Login*/

function validateLoginForm() {
  let username = document.getElementById("username").value.trim();
  let password = document.getElementById("password").value.trim();

  if (username === "" || password === "") {
    alert("Please fill in all fields.");
    return false;
  }

  alert("Login successful!");
  window.location.href = "admin-dashboard.html";
  return false;
}

/*Services*/

let selectedService = null;

function selectService(item) {
  let services = document.querySelectorAll(".servicesList li");
  for (let li of services) {
    li.style.backgroundColor = "";
  }

  item.style.backgroundColor = "#dcdde1";
  selectedService = item;

  document.getElementById("editBtn").style.display = "inline-block";
  document.getElementById("deleteBtn").style.display = "inline-block";

  document.getElementById("serviceName").value = item.textContent;
}

function AddService() {
  let serviceName = document.getElementById("serviceName").value.trim();
  let serviceDesc = document.getElementById("serviceDesc").value.trim();

  if (serviceName === "" || serviceDesc === "") {
    alert("Please fill all the fields");
    return;
  }

  let services = document.querySelectorAll(".servicesList li");
  for (let i = 0; i < services.length; i++) {
    if (services[i].textContent.toLowerCase() === serviceName.toLowerCase()) {
      alert("This service already exists");
      return;
    }
  }

  // Add Service to the list
  let lists = document.querySelectorAll(".servicesList");
  let li = document.createElement("li");
  li.textContent = serviceName;
  li.onclick = function () {
    selectService(this);
  };

  lists[0].appendChild(li);

  document.getElementById("serviceName").value = "";
  document.getElementById("serviceDesc").value = "";

  alert("Service added successfully");
}

function EditService() {
  let newName = document.getElementById("serviceName").value.trim();

  if (newName === "") {
    alert("Service name cannot be empty");
    return;
  }

  // Duplicate check while editing
  let services = document.querySelectorAll(".servicesList li");
  for (let li of services) {
    if (
      li !== selectedService &&
      li.textContent.toLowerCase() === newName.toLowerCase()
    ) {
      alert("This service already exists");
      return;
    }
  }

  selectedService.textContent = newName;

  alert("Service updated successfully");
}

function DeleteService() {
  if (!confirm("Are you sure you want to delete this service?")) {
    return;
  }

  selectedService.remove();
  selectedService = null;

  document.getElementById("serviceName").value = "";
  document.getElementById("serviceDesc").value = "";

  document.getElementById("editBtn").style.display = "none";
  document.getElementById("deleteBtn").style.display = "none";

  alert("Service deleted successfully");
}

/*Volunteer*/

const volunteerRequests = [
  {
    name: "Ahmed Mahmoud",
    email: "ahmed@email.com",
    service: "Ramadan Food Boxes",
    date: "Oct 30, 2025",
    status: "Pending",
  },
  {
    name: "Fatma Ali",
    email: "fatma@email.com",
    service: "Maedet El Rahman",
    date: "Oct 29, 2025",
    status: "Pending",
  },
];

const volunteerTable = document.getElementById("volunteerTable");

if (volunteerTable) {
  volunteerRequests.forEach((v) => {
    const row = volunteerTable.insertRow();

    row.insertCell().textContent = v.name;
    row.insertCell().textContent = v.email;
    row.insertCell().textContent = v.service;
    row.insertCell().textContent = v.date;

    const statusCell = row.insertCell();
    statusCell.textContent = v.status;
    statusCell.className = "status pending";

    const actionCell = row.insertCell();
    actionCell.innerHTML = `
      <button class="button" onclick="approve(this)">Approve</button>
      <button class="button" onclick="reject(this)">Reject</button>
    `;
  });
}

function approve(btn) {
  const row = btn.closest("tr");
  const statusCell = row.querySelector(".status");

  statusCell.textContent = "Approved";
  statusCell.style.color = "green";

  btn.disabled = true;
  btn.nextElementSibling.disabled = true;
}

function reject(btn) {
  const row = btn.closest("tr");
  const statusCell = row.querySelector(".status");

  statusCell.textContent = "Rejected";
  statusCell.style.color = "red";

  btn.disabled = true;
  btn.previousElementSibling.disabled = true;
}

/*Feedback*/

const feedbackData = [
  {
    name: "Ahmed Hassan",
    service: "Ramadan Food Boxes",
    rating: "★★★★☆",
    comment: "Very organized and respectful team.",
    date: "Oct 30, 2025",
    status: "Pending",
  },
  {
    name: "Fatma Ali",
    service: "Maedet El Rahman",
    rating: "★★★☆☆",
    comment: "Good service, but distribution was late.",
    date: "Oct 28, 2025",
    status: "Pending",
  },
];

const feedbackTable = document.getElementById("feedbackTable");

if (feedbackTable) {
  feedbackData.forEach((f) => {
    const row = feedbackTable.insertRow();

    row.insertCell().textContent = f.name;
    row.insertCell().textContent = f.service;
    row.insertCell().textContent = f.rating;
    row.insertCell().textContent = f.comment;
    row.insertCell().textContent = f.date;

    const statusCell = row.insertCell();
    statusCell.textContent = f.status;
    statusCell.className = "status pending";

    const actionCell = row.insertCell();
    actionCell.innerHTML = `
      <button class="button" onclick="markReviewed(this)">
        Mark Reviewed
      </button>
    `;
  });
}

function markReviewed(btn) {
  const row = btn.closest("tr");
  const statusCell = row.querySelector(".status");

  statusCell.textContent = "Reviewed";
  statusCell.style.color = "green";

  btn.disabled = true;
}
