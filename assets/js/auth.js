
document.addEventListener("DOMContentLoaded", () => {
  // ojo de contraseña
  const toggleButtons = document.querySelectorAll(".toggle-password")

  toggleButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const input = this.parentElement.querySelector('input[type="password"], input[type="text"]')
      const icon = this.querySelector("i")

      if (input.type === "password") {
        input.type = "text"
        icon.classList.remove("fa-eye")
        icon.classList.add("fa-eye-slash")
      } else {
        input.type = "password"
        icon.classList.remove("fa-eye-slash")
        icon.classList.add("fa-eye")
      }
    })
  })

  // Animación de carga en botones
  const authForms = document.querySelectorAll(".auth-form")

  authForms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      const submitBtn = this.querySelector(".btn-auth")
      if (submitBtn) {
        submitBtn.classList.add("loading")
        submitBtn.disabled = true

        // tiempo carga
        setTimeout(() => {
          if (!this.checkValidity()) {
            submitBtn.classList.remove("loading")
            submitBtn.disabled = false
          }
        }, 500)
      }
    })
  })

  // focus en inputs 
  const inputs = document.querySelectorAll(".form-control")

  inputs.forEach((input) => {
    input.addEventListener("focus", function () {
      this.parentElement.classList.add("focused")
    })

    input.addEventListener("blur", function () {
      this.parentElement.classList.remove("focused")
    })
  })

  // Animación de entrada para alertas
  const alerts = document.querySelectorAll(".alert-custom")
  alerts.forEach((alert, index) => {
    alert.style.animationDelay = `${index * 0.1}s`
  })
})

//  mostrar notificaciones
function showNotification(message, type = "info") {
  const notification = document.createElement("div")
  notification.className = `alert alert-${type} alert-custom position-fixed`
  notification.style.cssText = `
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        animation: slideInRight 0.3s ease-out;
    `
  notification.innerHTML = `
        <i class="fas fa-${type === "success" ? "check-circle" : type === "danger" ? "exclamation-circle" : "info-circle"} me-2"></i>
        ${message}
        <button type="button" class="btn-close" onclick="this.parentElement.remove()"></button>
    `

  document.body.appendChild(notification)

  // Auto quitar después de 5 segundos
  setTimeout(() => {
    if (notification.parentElement) {
      notification.style.animation = "slideOutRight 0.3s ease-out"
      setTimeout(() => notification.remove(), 300)
    }
  }, 5000)
}

// Validación en tiempo real
function setupRealTimeValidation() {
  const emailInputs = document.querySelectorAll('input[type="email"]')
  const passwordInputs = document.querySelectorAll('input[type="password"]')

  emailInputs.forEach((input) => {
    input.addEventListener("input", function () {
      const isValid = this.checkValidity()
      const feedback = this.parentElement.parentElement.querySelector(".form-feedback")

      if (feedback) {
        if (isValid && this.value.length > 0) {
          feedback.textContent = "Correo válido"
          feedback.className = "form-feedback valid"
        } else if (this.value.length > 0) {
          feedback.textContent = "Por favor ingresa un correo válido"
          feedback.className = "form-feedback invalid"
        } else {
          feedback.textContent = ""
          feedback.className = "form-feedback"
        }
      }
    })
  })
}
