// Funcionalidad para control de movimientos
document.addEventListener("DOMContentLoaded", () => {
  initMovementManagement()
  initFilters()
  initModals()
  updateStatsAnimation()
})

function initMovementManagement() {
  // Botones de acción
  const viewButtons = document.querySelectorAll(".view-movement")
  const refreshBtn = document.getElementById("refreshMovements")
  const exportBtn = document.getElementById("exportMovements")
  const generateReportBtn = document.getElementById("generateReport")

  viewButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const movementId = btn.getAttribute("data-id")
      viewMovement(movementId)
    })
  })

  if (refreshBtn) {
    refreshBtn.addEventListener("click", refreshMovements)
  }

  if (exportBtn) {
    exportBtn.addEventListener("click", exportMovements)
  }

  if (generateReportBtn) {
    generateReportBtn.addEventListener("click", generateReport)
  }
}

function initFilters() {
  const searchInput = document.getElementById("searchMovements")
  const typeFilter = document.getElementById("typeFilter")
  const dateFilter = document.getElementById("dateFilter")

  if (searchInput) {
    searchInput.addEventListener("input", debounce(filterMovements, 300))
  }
  ;[typeFilter, dateFilter].forEach((filter) => {
    if (filter) {
      filter.addEventListener("change", filterMovements)
    }
  })
}

function initModals() {
  // Botones de guardar
  const saveEntradaBtn = document.getElementById("saveEntrada")
  const saveSalidaBtn = document.getElementById("saveSalida")
  const saveAjusteBtn = document.getElementById("saveAjuste")

  if (saveEntradaBtn) {
    saveEntradaBtn.addEventListener("click", () => saveMovement("entrada"))
  }

  if (saveSalidaBtn) {
    saveSalidaBtn.addEventListener("click", () => saveMovement("salida"))
  }

  if (saveAjusteBtn) {
    saveAjusteBtn.addEventListener("click", () => saveMovement("ajuste"))
  }

  // Actualizar stock disponible en salidas
  const salidaProducto = document.getElementById("salidaProducto")
  if (salidaProducto) {
    salidaProducto.addEventListener("change", updateAvailableStock)
  }

  // Validar cantidad en salidas
  const salidaCantidad = document.getElementById("salidaCantidad")
  if (salidaCantidad) {
    salidaCantidad.addEventListener("input", validateSalidaCantidad)
  }
}

function filterMovements() {
  const searchTerm = document.getElementById("searchMovements")?.value.toLowerCase() || ""
  const typeFilter = document.getElementById("typeFilter")?.value || ""
  const dateFilter = document.getElementById("dateFilter")?.value || ""

  const rows = document.querySelectorAll(".movement-row")
  let visibleCount = 0

  rows.forEach((row) => {
    const productName = row.cells[2].textContent.toLowerCase()
    const movementType = row.getAttribute("data-type")
    const movementDate = row.getAttribute("data-date")

    let visible = true

    // Filtro de búsqueda
    if (searchTerm && !productName.includes(searchTerm)) {
      visible = false
    }

    // Filtro de tipo
    if (typeFilter && movementType !== typeFilter) {
      visible = false
    }

    // Filtro de fecha
    if (dateFilter && !matchesDateFilter(movementDate, dateFilter)) {
      visible = false
    }

    row.style.display = visible ? "" : "none"
    if (visible) visibleCount++
  })

  updateMovementCount(visibleCount)
}

function matchesDateFilter(movementDate, filter) {
  const today = new Date()
  const moveDate = new Date(movementDate)

  switch (filter) {
    case "today":
      return moveDate.toDateString() === today.toDateString()
    case "week":
      const weekAgo = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000)
      return moveDate >= weekAgo
    case "month":
      const monthAgo = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate())
      return moveDate >= monthAgo
    default:
      return true
  }
}

function updateMovementCount(count = null) {
  const shownElement = document.getElementById("shownMovements")
  const totalElement = document.getElementById("totalMovements")

  if (count === null) {
    const visibleRows = document.querySelectorAll('.movement-row:not([style*="display: none"])')
    count = visibleRows.length
  }

  if (shownElement) shownElement.textContent = count
  if (totalElement) totalElement.textContent = document.querySelectorAll(".movement-row").length
}

function viewMovement(movementId) {
  const modalElement = document.getElementById("viewMovementModal")
  const modal = new bootstrap.Modal(modalElement)

  // Simular datos del movimiento
  const movementData = getMovementData(movementId)

  document.getElementById("viewMovementId").textContent = movementData.id
  document.getElementById("viewMovementType").innerHTML = movementData.type
  document.getElementById("viewMovementProduct").textContent = movementData.product
  document.getElementById("viewMovementQuantity").innerHTML = movementData.quantity
  document.getElementById("viewMovementUser").textContent = movementData.user
  document.getElementById("viewMovementDate").textContent = movementData.date
  document.getElementById("viewMovementReason").textContent = movementData.reason
  document.getElementById("viewMovementPrevStock").textContent = movementData.prevStock
  document.getElementById("viewMovementObservations").textContent = movementData.observations

  modal.show()
}

function saveMovement(type) {
  const formId = `${type}Form`
  const form = document.getElementById(formId)

  if (!form.checkValidity()) {
    form.reportValidity()
    return
  }

  const saveBtn = document.getElementById(`save${type.charAt(0).toUpperCase() + type.slice(1)}`)
  const originalText = saveBtn.innerHTML

  saveBtn.disabled = true
  saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Procesando...'

  // Simular guardado
  setTimeout(() => {
    const modal = bootstrap.Modal.getInstance(document.getElementById(`${type}Modal`))
    modal.hide()
    form.reset()

    saveBtn.disabled = false
    saveBtn.innerHTML = originalText

    const typeNames = {
      entrada: "Entrada",
      salida: "Salida",
      ajuste: "Ajuste",
    }

    showNotification(`${typeNames[type]} registrada correctamente`, "success")

    // Actualizar lista y estadísticas
    setTimeout(() => {
      refreshMovements()
      updateStatsAnimation()
    }, 500)
  }, 1500)
}

function updateAvailableStock() {
  const select = document.getElementById("salidaProducto")
  const stockSpan = document.getElementById("stockDisponible")

  if (select && stockSpan) {
    const selectedOption = select.options[select.selectedIndex]
    if (selectedOption.value) {
      // Extraer stock del texto de la opción
      const stockMatch = selectedOption.text.match(/Stock: (\d+)/)
      const stock = stockMatch ? stockMatch[1] : "0"
      stockSpan.textContent = stock
    } else {
      stockSpan.textContent = "0"
    }
  }
}

function validateSalidaCantidad() {
  const cantidadInput = document.getElementById("salidaCantidad")
  const stockSpan = document.getElementById("stockDisponible")

  if (cantidadInput && stockSpan) {
    const cantidad = Number.parseInt(cantidadInput.value) || 0
    const stockDisponible = Number.parseInt(stockSpan.textContent) || 0

    if (cantidad > stockDisponible) {
      cantidadInput.setCustomValidity(`La cantidad no puede ser mayor al stock disponible (${stockDisponible})`)
      cantidadInput.classList.add("is-invalid")
    } else {
      cantidadInput.setCustomValidity("")
      cantidadInput.classList.remove("is-invalid")
    }
  }
}

function refreshMovements() {
  const refreshBtn = document.getElementById("refreshMovements")
  const icon = refreshBtn.querySelector("i")

  icon.classList.add("fa-spin")

  setTimeout(() => {
    icon.classList.remove("fa-spin")
    showNotification("Lista de movimientos actualizada", "success")
    updateMovementCount()
  }, 1000)
}

function exportMovements() {
  showNotification("Exportando movimientos...", "info")

  setTimeout(() => {
    showNotification("Movimientos exportados correctamente", "success")
  }, 2000)
}

function generateReport() {
  showNotification("Generando reporte de movimientos...", "info")

  setTimeout(() => {
    showNotification("Reporte generado correctamente", "success")
  }, 3000)
}

function updateStatsAnimation() {
  const statsNumbers = document.querySelectorAll(".stats-number[data-target]")

  statsNumbers.forEach((number) => {
    const target = Number.parseInt(number.getAttribute("data-target"))
    animateNumber(number, target)
  })
}

function animateNumber(element, target) {
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

function getMovementData(movementId) {
  // Datos simulados
  const movements = {
    1: {
      id: "MOV-001",
      type: '<span class="badge bg-success"><i class="fas fa-arrow-down me-1"></i>Entrada</span>',
      product: "Laptop HP Pavilion 15",
      quantity: '<span class="badge bg-success">+50</span>',
      user: "Admin Usuario",
      date: "03/06/2025 10:30",
      reason: "Compra a proveedor",
      prevStock: "25",
      observations: "Compra realizada al proveedor TechSupply. Productos en perfectas condiciones.",
    },
    2: {
      id: "MOV-002",
      type: '<span class="badge bg-danger"><i class="fas fa-arrow-up me-1"></i>Salida</span>',
      product: 'Monitor Samsung 24"',
      quantity: '<span class="badge bg-danger">-5</span>',
      user: "Juan Pérez",
      date: "03/06/2025 09:15",
      reason: "Venta a cliente",
      prevStock: "20",
      observations: "Venta realizada a cliente corporativo. Factura #12345.",
    },
  }

  return movements[movementId] || movements["1"]
}

function debounce(func, wait) {
  let timeout
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout)
      func(...args)
    }
    clearTimeout(timeout)
    timeout = setTimeout(later, wait)
  }
}

function showNotification(message, type = "info") {
  const notification = document.createElement("div")
  notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`
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
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `

  document.body.appendChild(notification)

  setTimeout(() => {
    notification.classList.remove("show")
    setTimeout(() => notification.remove(), 150)
  }, 3000)
}
