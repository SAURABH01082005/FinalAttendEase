const loginForm = document.getElementById("login-form");

loginForm.addEventListener("submit", login);

function login(event) {
  event.preventDefault();
  const usernameInput = document.getElementById("username");
  const passwordInput = document.getElementById("password");
  const username = usernameInput.value;
  const password = passwordInput.value;

  // You would normally check the credentials against a database or some other authentication service
  // For this example, we'll use hardcoded values
  if (username === "admin" && password === "password") {
    window.location.href = "attendance.html";
  } else {
    alert("Invalid credentials. Please try again.");
    usernameInput.value = "";
    passwordInput.value = "";
  }
}
