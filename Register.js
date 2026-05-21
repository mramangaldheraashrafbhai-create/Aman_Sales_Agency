document.getElementById("registerBtn").addEventListener("click", function () {
  const username = document.getElementById("username").value.trim();
  const firstName = document.getElementById("firstName").value.trim();
  const lastName = document.getElementById("lastName").value.trim();
  const password = document.getElementById("password").value.trim();
  const confirmPassword = document.getElementById("confirmPassword").value.trim();
  const messageBox = document.getElementById("messageBox");

  // Reset message
  messageBox.textContent = "";
  messageBox.className = "message";

  // Check empty fields
  if (!username || !firstName || !lastName || !password || !confirmPassword) {
    showMessage("⚠️ Please fill all the fields!", "error");
    return;
  }

  // Check password match
  if (password !== confirmPassword) {
    showMessage("❌ Password and Confirm Password do not match!", "error");
    return;
  }

  // ✅ Success
  showMessage("✅ Registration Successful! Redirecting...", "success");

  // 2 seconds પછી index.html પર જવું
  setTimeout(() => {
    window.location.href = "index.html";
  }, 2000);
});

document.getElementById("loginBtn").addEventListener("click", function () {
  window.location.href = "Create Account.html";
});

// 🔁 Function to show message and auto-hide after 5 sec
function showMessage(message, type) {
  const box = document.getElementById("messageBox");
  box.textContent = message;
  box.className = "message " + type;
  box.style.opacity = "1";

  setTimeout(() => {
    box.style.opacity = "0";
  }, 5000);
}
