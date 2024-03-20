function isEmailValid(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function checkFormValidity() {
  const form = document.querySelector("form");
  const button = form.querySelector(".button");
  const inputs = form.querySelectorAll(".fields");
  let isValid = true;

  inputs.forEach((input) => {
    if (input.value.trim() === "") {
      isValid = false;
    }
  });

  const emailField = form.querySelector("#email");
  if (!isEmailValid(emailField.value)) {
    isValid = false;
  }

  button.disabled = !isValid;
}

document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  form.addEventListener("input", checkFormValidity);
});
