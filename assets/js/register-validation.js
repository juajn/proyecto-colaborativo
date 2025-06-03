
document.addEventListener("DOMContentLoaded", () => {
  const registerForm = document.getElementById("registerForm")
  const passwordInput = document.getElementById("password")
  const confirmPasswordInput = document.getElementById("confirm-password")
  const nameInput = document.getElementById("nombre")

  // verificar la  fortaleza de contraseña
  if (passwordInput) {
    passwordInput.addEventListener("input", function () {
      checkPasswordStrength(this.value)
      validatePasswordMatch()
    })
  }

  // Validación de confirmación de contraseña
  if (confirmPasswordInput) {
    confirmPasswordInput.addEventListener("input", validatePasswordMatch)
  }

  // Validación de nombre
  if (nameInput) {
    nameInput.addEventListener("input", function () {
      validateName(this.value)
    })
  }

  function checkPasswordStrength(password) {
    const strengthBar = document.querySelector(".strength-fill")
    const strengthText = document.querySelector(".strength-text")
    const strengthContainer = document.querySelector(".password-strength")

    if (!strengthBar || !strengthText || !strengthContainer) return

    let strength = 0
    let feedback = ""

    if (password.length >= 8) strength++
    if (/[a-z]/.test(password)) strength++
    if (/[A-Z]/.test(password)) strength++
    if (/[0-9]/.test(password)) strength++
    if (/[^A-Za-z0-9]/.test(password)) strength++

    strengthContainer.className = "password-strength"

    if (strength < 3) {
      strengthContainer.classList.add("strength-weak")
      feedback = "Contraseña débil"
    } else if (strength < 5) {
      strengthContainer.classList.add("strength-medium")
      feedback = "Contraseña media"
    } else {
      strengthContainer.classList.add("strength-strong")
      feedback = "Contraseña fuerte"
    }

    strengthText.textContent = feedback
  }

  function validatePasswordMatch() {
    const password = passwordInput?.value || ""
    const confirmPassword = confirmPasswordInput?.value || ""
    const feedback = confirmPasswordInput?.parentElement.parentElement.querySelector(".form-feedback")

    if (!feedback || !confirmPassword) return

    if (password === confirmPassword) {
      feedback.textContent = "Las contraseñas coinciden"
      feedback.className = "form-feedback valid"
    } else {
      feedback.textContent = "Las contraseñas no coinciden"
      feedback.className = "form-feedback invalid"
    }
  }

  function validateName(name) {
    const feedback = nameInput?.parentElement.parentElement.querySelector(".form-feedback")
    if (!feedback) return

    if (name.length < 2) {
      feedback.textContent = "El nombre debe tener al menos 2 caracteres"
      feedback.className = "form-feedback invalid"
    } else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(name)) {
      feedback.textContent = "El nombre solo puede contener letras y espacios"
      feedback.className = "form-feedback invalid"
    } else {
      feedback.textContent = "Nombre válido"
      feedback.className = "form-feedback valid"
    }
  }
})
