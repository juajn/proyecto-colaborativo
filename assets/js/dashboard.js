
document.addEventListener("DOMContentLoaded", () => {
  // Inicializar componentes
  initSidebar()
  initDateTime()
  initStatsAnimation()
  initTooltips()

  // Sidebar funcionalidades
  function initSidebar() {
    const sidebar = document.getElementById("sidebar")
    const sidebarToggle = document.getElementById("sidebarToggle")
    const sidebarToggleBtn = document.getElementById("sidebarToggleBtn")

    // Toggle sidebar en pc
    if (sidebarToggleBtn) {
      sidebarToggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("collapsed")
        localStorage.setItem("sidebarCollapsed", sidebar.classList.contains("collapsed"))
      })
    }

    // Toggle sidebar en mobil
    if (sidebarToggle) {
      sidebarToggle.addEventListener("click", () => {
        sidebar.classList.remove("show")
      })
    }

    // Restaurar estado del sidebar
    const isCollapsed = localStorage.getItem("sidebarCollapsed") === "true"
    if (isCollapsed && window.innerWidth > 1200) {
      sidebar.classList.add("collapsed")
    }

    // Mostrar sidebar en mobile cuando se hace click en toggle
    if (window.innerWidth <= 768) {
      if (sidebarToggleBtn) {
        sidebarToggleBtn.addEventListener("click", () => {
          sidebar.classList.toggle("show")
        })
      }
    }
  }

  // Fecha y hora en tiempo real
  function initDateTime() {
    const dateElement = document.getElementById("currentDate")
    const timeElement = document.getElementById("currentTime")

    if (!dateElement || !timeElement) return

    function updateDateTime() {
      const now = new Date()

      const dateOptions = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
      }

      const timeOptions = {
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
      }

      dateElement.textContent = now.toLocaleDateString("es-ES", dateOptions)
      timeElement.textContent = now.toLocaleTimeString("es-ES", timeOptions)
    }

    updateDateTime()
    setInterval(updateDateTime, 1000)
  }

  // Animación de números en las estadísticas
  function initStatsAnimation() {
    const statsNumbers = document.querySelectorAll(".stats-number[data-target]")

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateNumber(entry.target)
          observer.unobserve(entry.target)
        }
      })
    })

    statsNumbers.forEach((number) => {
      observer.observe(number)
    })
  }

  function animateNumber(element) {
    const target = Number.parseInt(element.getAttribute("data-target"))
    const duration = 2000
    const start = 0
    const increment = target / (duration / 16)
    let current = start

    const timer = setInterval(() => {
      current += increment
      element.textContent = Math.floor(current)

      if (current >= target) {
        element.textContent = target
        clearInterval(timer)
      }
    }, 16)
  }

  // Inicializar tooltips
  function initTooltips() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl))
  }

  //  sidebar responsiv
  window.addEventListener("resize", () => {
    const sidebar = document.getElementById("sidebar")

    if (window.innerWidth <= 768) {
      sidebar.classList.remove("collapsed")
      sidebar.classList.remove("show")
    } else if (window.innerWidth > 1200) {
      const isCollapsed = localStorage.getItem("sidebarCollapsed") === "true"
      if (isCollapsed) {
        sidebar.classList.add("collapsed")
      }
    }
  })

  // Efectos hover para tarjetas
  const managementCards = document.querySelectorAll(".management-card")
  managementCards.forEach((card) => {
    card.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-5px) scale(1.02)"
    })

    card.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0) scale(1)"
    })
  })

  // Efectos botones de acción rápida
  const quickActionBtns = document.querySelectorAll(".quick-action-btn")
  quickActionBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      // Efecto ripple
      const ripple = document.createElement("span")
      const rect = this.getBoundingClientRect()
      const size = Math.max(rect.width, rect.height)
      const x = e.clientX - rect.left - size / 2
      const y = e.clientY - rect.top - size / 2

      ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            `

      this.style.position = "relative"
      this.style.overflow = "hidden"
      this.appendChild(ripple)

      setTimeout(() => {
        ripple.remove()
      }, 600)
    })
  })
})

//mostrar notificaciones del dashboard
function showDashboardNotification(title, message, type = "info") {
  const notification = document.createElement("div")
  notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`
  notification.style.cssText = `
        top: 90px;
        right: 20px;
        z-index: 9999;
        min-width: 350px;
        animation: slideInRight 0.3s ease-out;
        box-shadow: var(--shadow-medium);
    `

  notification.innerHTML = `
        <div class="d-flex align-items-start">
            <i class="fas fa-${type === "success" ? "check-circle" : type === "danger" ? "exclamation-circle" : type === "warning" ? "exclamation-triangle" : "info-circle"} me-3 mt-1"></i>
            <div>
                <strong>${title}</strong><br>
                <small>${message}</small>
            </div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    `

  document.body.appendChild(notification)

  // auto quitar después de 5 segundos
  setTimeout(() => {
    if (notification.parentElement) {
      notification.classList.remove("show")
      setTimeout(() => notification.remove(), 150)
    }
  }, 5000)
}

//animaciones adicionales
const additionalStyles = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`

// estilos adicionales
const styleSheet = document.createElement("style")
styleSheet.textContent = additionalStyles
document.head.appendChild(styleSheet)
