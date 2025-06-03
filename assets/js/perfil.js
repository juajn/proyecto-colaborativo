
document.addEventListener("DOMContentLoaded", () => {
  initPasswordStrength()
  initTogglePassword()
  initProfileEdit()
  initTabsState()

  // Validacion fortaleza de contraseña
  function initPasswordStrength() {
    const passwordInput = document.getElementById("newPassword")
    if (!passwordInput) return

    passwordInput.addEventListener("input", function () {
      const password = this.value
      const strengthBar = document.querySelector(".strength-fill")
      const strengthText = document.querySelector(".strength-text")

      if (!strengthBar || !strengthText) return

      let strength = 0
      let feedback = ""

      // Criterios de fortaleza
      if (password.length >= 8) strength++
      if (/[a-z]/.test(password)) strength++
      if (/[A-Z]/.test(password)) strength++
      if (/[0-9]/.test(password)) strength++
      if (/[^A-Za-z0-9]/.test(password)) strength++

      // Actualizar visualización
      if (strength < 3) {
        strengthBar.style.width = "33%"
        strengthBar.style.backgroundColor = "var(--danger-color)"
        feedback = "Contraseña débil"
      } else if (strength < 5) {
        strengthBar.style.width = "66%"
        strengthBar.style.backgroundColor = "var(--warning-color)"
        feedback = "Contraseña media"
      } else {
        strengthBar.style.width = "100%"
        strengthBar.style.backgroundColor = "var(--success-color)"
        feedback = "Contraseña fuerte"
      }

      strengthText.textContent = feedback
    })
  }

  //ojito contrasena
  function initTogglePassword() {
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
  }

  // Edición de perfil
  function initProfileEdit() {
    const saveProfileBtn = document.getElementById("saveProfileBtn")
    if (!saveProfileBtn) return

    saveProfileBtn.addEventListener("click", function () {
      // Simular guardado
      const saveIcon = this.querySelector("i")
      const originalText = this.textContent

      this.disabled = true
      this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...'

      setTimeout(() => {
        // Cerrar modal
        const modalInstance = bootstrap.Modal.getInstance(document.getElementById("editProfileModal"))
        modalInstance.hide()

        // Mostrar notificación
        showNotification("Perfil actualizado correctamente", "success")

        // Restaurar botón
        this.disabled = false
        this.innerHTML = '<i class="fas fa-save me-2"></i>Guardar Cambios'
      }, 1500)
    })

    // Formulario de cambio de contraseña
    const passwordForm = document.getElementById("passwordChangeForm")
    if (passwordForm) {
      passwordForm.addEventListener("submit", function (e) {
        e.preventDefault()

        const currentPassword = document.getElementById("currentPassword").value
        const newPassword = document.getElementById("newPassword").value
        const confirmPassword = document.getElementById("confirmPassword").value

        
        if (!currentPassword || !newPassword || !confirmPassword) {
          showNotification("Por favor completa todos los campos", "warning")
          return
        }

        if (newPassword !== confirmPassword) {
          showNotification("Las contraseñas no coinciden", "danger")
          return
        }

        // Simular cambio de contraseña
        const submitBtn = this.querySelector("button[type='submit']")
        const originalText = submitBtn.innerHTML

        submitBtn.disabled = true
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Procesando...'

        setTimeout(() => {
          // Mostrar notificación
          showNotification("Contraseña actualizada correctamente", "success")

          // Restaurar formulario
          this.reset()
          submitBtn.disabled = false
          submitBtn.innerHTML = originalText

          // Resetear barra de fortaleza
          const strengthBar = document.querySelector(".strength-fill")
          const strengthText = document.querySelector(".strength-text")
          if (strengthBar && strengthText) {
            strengthBar.style.width = "0%"
            strengthText.textContent = "Fortaleza de la contraseña"
          }
        }, 1500)
      })
    }
  }

  // Mantener estado de las pestañas
  function initTabsState() {
    const profileTabs = document.getElementById("profileTabs")
    if (!profileTabs) return

    // Restaurar pestaña activa
    const activeTab = localStorage.getItem("activeProfileTab")
    if (activeTab) {
      const tab = document.querySelector(`#profileTabs button[data-bs-target="${activeTab}"]`)
      if (tab) {
        const tabInstance = new bootstrap.Tab(tab)
        tabInstance.show()
      }
    }

    // Guardar pestaña activa al cambiar
    profileTabs.addEventListener("shown.bs.tab", (e) => {
      const targetTab = e.target.getAttribute("data-bs-target")
      localStorage.setItem("activeProfileTab", targetTab)
    })
  }

  // Gestión de favoritos en perfil
  const favoriteDeleteBtns = document.querySelectorAll(".favorite-product-info + .btn")
  favoriteDeleteBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      const listItem = this.closest("li")

      // Animación de eliminación
      listItem.style.transition = "all 0.3s ease"
      listItem.style.opacity = "0"
      listItem.style.height = "0"

      setTimeout(() => {
        listItem.remove()
        showNotification("Producto eliminado de favoritos", "info")
      }, 300)
    })
  })

  // Cambio de foto de perfil simulado
  const avatarEditBtn = document.querySelector(".avatar-edit-btn")
  if (avatarEditBtn) {
    avatarEditBtn.addEventListener("click", () => {
      //En logica real abrir selector de archivos xd
      showNotification("Funcionalidad de cambio de foto en desarrollo", "info")
    })
  }

  // Guardar preferencias
  const preferencesTab = document.getElementById("preferences-tab")
  if (preferencesTab) {
    const savePreferencesBtn = preferencesTab.parentElement.querySelector(".btn-primary")
    if (savePreferencesBtn) {
      savePreferencesBtn.addEventListener("click", function () {
        // Simular guardado
        this.disabled = true
        const originalText = this.innerHTML
        this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...'

        setTimeout(() => {
          this.disabled = false
          this.innerHTML = originalText
          showNotification("Preferencias guardadas correctamente", "success")
        }, 1000)
      })
    }
  }

  // Cerrar sesión en otras ubicaciones
  const sessionCloseBtns = document.querySelectorAll(".btn-outline-danger")
  sessionCloseBtns.forEach((btn) => {
    if (btn.textContent.includes("Cerrar") && !btn.classList.contains("text-danger")) {
      btn.addEventListener("click", function () {
        const row = this.closest("tr")

        // Animación de eliminación
        row.style.transition = "all 0.3s ease"
        row.style.opacity = "0"

        setTimeout(() => {
          row.remove()
          showNotification("Sesión cerrada correctamente", "success")
        }, 300)
      })
    }
  })

  // Cargar más actividad
  const loadMoreBtn = document.querySelector(".btn-outline-primary")
  if (loadMoreBtn && loadMoreBtn.textContent.includes("Cargar Más")) {
    loadMoreBtn.addEventListener("click", function () {
      // Simular carga
      this.disabled = true
      this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Cargando...'

      setTimeout(() => {
        // Añadir nuevos elementos (simulado)
        const timeline = document.querySelector(".activity-timeline")
        if (timeline) {
          const newItems = [
            {
              icon: "eye",
              iconClass: "bg-info",
              title: "Producto Visto",
              details: 'Has visto el producto "Auriculares Bluetooth"',
              time: "12/05/2025, 10:15 AM",
            },
            {
              icon: "sign-in-alt",
              iconClass: "bg-primary",
              title: "Inicio de Sesión",
              details: "Has iniciado sesión desde Firefox en Windows",
              time: "10/05/2025, 18:30 PM",
            },
            {
              icon: "star",
              iconClass: "bg-warning",
              title: "Producto Añadido a Favoritos",
              details: 'Has añadido "Mouse Inalámbrico" a tus favoritos',
              time: "08/05/2025, 14:45 PM",
            },
          ]

          newItems.forEach((item) => {
            const itemElement = document.createElement("div")
            itemElement.className = "activity-item"
            itemElement.innerHTML = `
              <div class="activity-icon ${item.iconClass}">
                <i class="fas fa-${item.icon}"></i>
              </div>
              <div class="activity-content">
                <div class="activity-title">${item.title}</div>
                <div class="activity-details">${item.details}</div>
                <div class="activity-time">${item.time}</div>
              </div>
            `
            timeline.appendChild(itemElement)
          })
        }

        // Restaurar botón
        this.disabled = false
        this.innerHTML = '<i class="fas fa-sync-alt me-2"></i>Cargar Más'

       
        showNotification("Se han cargado más actividades", "success")
      }, 1500)
    })
  }

  function showNotification(message, type) {
  
    console.log(`Notification: ${message} (Type: ${type})`)
  }
})
