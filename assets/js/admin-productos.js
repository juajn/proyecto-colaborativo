// Funcionalidad para gestión de productos
document.addEventListener("DOMContentLoaded", () => {
  initProductManagement()
  initFilters()
  initViewToggle()
  initSorting()
  initBulkActions()
  initModals()
  updateStatsAnimation()
})

function initProductManagement() {
  // Botones de acción
  const viewButtons = document.querySelectorAll(".view-product")
  const editButtons = document.querySelectorAll(".edit-product")
  const deleteButtons = document.querySelectorAll(".delete-product")

  viewButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const productId = btn.getAttribute("data-id")
      viewProduct(productId)
    })
  })

  editButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const productId = btn.getAttribute("data-id")
      editProduct(productId)
    })
  })

  deleteButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const productId = btn.getAttribute("data-id")
      deleteProduct(productId)
    })
  })

  // Botón de actualizar
  const refreshBtn = document.getElementById("refreshBtn")
  if (refreshBtn) {
    refreshBtn.addEventListener("click", refreshProducts)
  }

  // Botones de exportar
  document.getElementById("exportExcel")?.addEventListener("click", () => exportProducts("excel"))
  document.getElementById("exportPDF")?.addEventListener("click", () => exportProducts("pdf"))
  document.getElementById("exportCSV")?.addEventListener("click", () => exportProducts("csv"))
}

function initFilters() {
  const searchInput = document.getElementById("searchInput")
  const categoryFilter = document.getElementById("categoryFilter")
  const statusFilter = document.getElementById("statusFilter")
  const stockFilter = document.getElementById("stockFilter")

  if (searchInput) {
    searchInput.addEventListener("input", debounce(filterProducts, 300))
  }
  ;[categoryFilter, statusFilter, stockFilter].forEach((filter) => {
    if (filter) {
      filter.addEventListener("change", filterProducts)
    }
  })
}

function initViewToggle() {
  const viewButtons = document.querySelectorAll(".view-btn")
  const tableView = document.getElementById("tableView")
  const gridView = document.getElementById("gridView")

  viewButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const viewType = btn.getAttribute("data-view")

      // Actualizar botones
      viewButtons.forEach((b) => b.classList.remove("active"))
      btn.classList.add("active")

      // Cambiar vista
      if (viewType === "table") {
        tableView.style.display = ""
        gridView.style.display = "none"
      } else {
        tableView.style.display = "none"
        gridView.style.display = ""
      }

      localStorage.setItem("productView", viewType)
    })
  })

  // Restaurar vista guardada
  const savedView = localStorage.getItem("productView")
  if (savedView) {
    const btn = document.querySelector(`[data-view="${savedView}"]`)
    if (btn) btn.click()
  }
}

function initSorting() {
  const sortableHeaders = document.querySelectorAll(".sortable")

  sortableHeaders.forEach((header) => {
    header.addEventListener("click", () => {
      const sortBy = header.getAttribute("data-sort")
      const currentDirection = header.getAttribute("data-direction") || "asc"
      const newDirection = currentDirection === "asc" ? "desc" : "asc"

      // Resetear otros headers
      sortableHeaders.forEach((h) => {
        h.setAttribute("data-direction", "")
        h.querySelector("i").className = "fas fa-sort ms-1"
      })

      // Actualizar header actual
      header.setAttribute("data-direction", newDirection)
      header.querySelector("i").className = `fas fa-sort-${newDirection === "asc" ? "up" : "down"} ms-1`

      sortProducts(sortBy, newDirection)
    })
  })
}

function initBulkActions() {
  const selectAll = document.getElementById("selectAll")
  const rowCheckboxes = document.querySelectorAll(".row-checkbox")
  const bulkDeleteBtn = document.getElementById("bulkDeleteBtn")

  if (selectAll) {
    selectAll.addEventListener("change", () => {
      rowCheckboxes.forEach((checkbox) => {
        checkbox.checked = selectAll.checked
      })
      updateBulkActions()
    })
  }

  rowCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", updateBulkActions)
  })

  if (bulkDeleteBtn) {
    bulkDeleteBtn.addEventListener("click", bulkDeleteProducts)
  }
}

function initModals() {
  const saveProductBtn = document.getElementById("saveProductBtn")
  const addProductForm = document.getElementById("addProductForm")

  if (saveProductBtn) {
    saveProductBtn.addEventListener("click", saveProduct)
  }

  if (addProductForm) {
    addProductForm.addEventListener("submit", (e) => {
      e.preventDefault()
      saveProduct()
    })
  }
}

function filterProducts() {
  const searchTerm = document.getElementById("searchInput")?.value.toLowerCase() || ""
  const categoryFilter = document.getElementById("categoryFilter")?.value || ""
  const statusFilter = document.getElementById("statusFilter")?.value || ""
  const stockFilter = document.getElementById("stockFilter")?.value || ""

  const rows = document.querySelectorAll(".product-row")
  let visibleCount = 0

  rows.forEach((row) => {
    const name = row.cells[3].textContent.toLowerCase()
    const category = row.getAttribute("data-category")
    const status = row.getAttribute("data-status")
    const stockStatus = row.getAttribute("data-stock-status")

    let visible = true

    if (searchTerm && !name.includes(searchTerm)) visible = false
    if (categoryFilter && category !== categoryFilter) visible = false
    if (statusFilter && status !== statusFilter) visible = false
    if (stockFilter && stockStatus !== stockFilter) visible = false

    row.style.display = visible ? "" : "none"
    if (visible) visibleCount++
  })

  updateProductCount(visibleCount)
}

function sortProducts(sortBy, direction) {
  const tbody = document.querySelector("#productsTable tbody")
  const rows = Array.from(tbody.querySelectorAll(".product-row"))

  const columnMap = {
    id: 1,
    nombre: 3,
    categoria: 4,
    precio: 5,
    stock: 6,
    estado: 7,
    fecha: 8,
  }

  const columnIndex = columnMap[sortBy]

  rows.sort((a, b) => {
    let aValue = a.cells[columnIndex].textContent.trim()
    let bValue = b.cells[columnIndex].textContent.trim()

    // Convertir números
    if (sortBy === "precio" || sortBy === "stock" || sortBy === "id") {
      aValue = Number.parseFloat(aValue.replace(/[^\d.-]/g, "")) || 0
      bValue = Number.parseFloat(bValue.replace(/[^\d.-]/g, "")) || 0
    }

    if (direction === "asc") {
      return aValue > bValue ? 1 : -1
    } else {
      return aValue < bValue ? 1 : -1
    }
  })

  rows.forEach((row) => tbody.appendChild(row))
  showNotification(`Productos ordenados por ${sortBy}`, "info")
}

function updateBulkActions() {
  const checkedBoxes = document.querySelectorAll(".row-checkbox:checked")
  const bulkDeleteBtn = document.getElementById("bulkDeleteBtn")

  if (bulkDeleteBtn) {
    bulkDeleteBtn.style.display = checkedBoxes.length > 0 ? "" : "none"
  }
}

function updateProductCount(count = null) {
  const shownElement = document.getElementById("shownProducts")
  const totalElement = document.getElementById("totalProducts")

  if (count === null) {
    const visibleRows = document.querySelectorAll('.product-row:not([style*="display: none"])')
    count = visibleRows.length
  }

  if (shownElement) shownElement.textContent = count
  if (totalElement) totalElement.textContent = document.querySelectorAll(".product-row").length
}

function viewProduct(productId) {
  // Simular carga de datos del producto
  const modalElement = document.getElementById("viewProductModal")
  const modal = new bootstrap.Modal(modalElement)

  // Aquí normalmente harías una petición AJAX
  const productData = getProductData(productId)

  document.getElementById("viewProductName").textContent = productData.name
  document.getElementById("viewProductSKU").textContent = productData.sku
  document.getElementById("viewProductCategory").textContent = productData.category
  document.getElementById("viewProductPrice").textContent = productData.price
  document.getElementById("viewProductStock").textContent = productData.stock
  document.getElementById("viewProductMinStock").textContent = productData.minStock
  document.getElementById("viewProductStatus").textContent = productData.status
  document.getElementById("viewProductDate").textContent = productData.date
  document.getElementById("viewProductDescription").textContent = productData.description

  modal.show()
}

function editProduct(productId) {
  showNotification("Función de edición en desarrollo", "info")
}

function deleteProduct(productId) {
  if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
    // Simular eliminación
    const row = document.querySelector(`[data-id="${productId}"]`).closest("tr")
    row.style.transition = "all 0.3s ease"
    row.style.opacity = "0"

    setTimeout(() => {
      row.remove()
      updateProductCount()
      showNotification("Producto eliminado correctamente", "success")
    }, 300)
  }
}

function bulkDeleteProducts() {
  const checkedBoxes = document.querySelectorAll(".row-checkbox:checked")

  if (confirm(`¿Estás seguro de que deseas eliminar ${checkedBoxes.length} productos?`)) {
    checkedBoxes.forEach((checkbox) => {
      const row = checkbox.closest("tr")
      row.style.transition = "all 0.3s ease"
      row.style.opacity = "0"

      setTimeout(() => {
        row.remove()
      }, 300)
    })

    setTimeout(() => {
      updateProductCount()
      updateBulkActions()
      showNotification(`${checkedBoxes.length} productos eliminados`, "success")
    }, 300)
  }
}

function saveProduct() {
  const form = document.getElementById("addProductForm")
  const formData = new FormData(form)

  // Validar formulario
  if (!form.checkValidity()) {
    form.reportValidity()
    return
  }

  const saveBtn = document.getElementById("saveProductBtn")
  saveBtn.disabled = true
  saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...'

  // Simular guardado
  setTimeout(() => {
    const modalElement = document.getElementById("addProductModal")
    const modalInstance = bootstrap.Modal.getInstance(modalElement)
    modalInstance.hide()
    form.reset()

    saveBtn.disabled = false
    saveBtn.innerHTML = '<i class="fas fa-save me-2"></i>Guardar Producto'

    showNotification("Producto guardado correctamente", "success")

    // Aquí normalmente recargarías la lista
    setTimeout(refreshProducts, 500)
  }, 1500)
}

function refreshProducts() {
  const refreshBtn = document.getElementById("refreshBtn")
  const icon = refreshBtn.querySelector("i")

  icon.classList.add("fa-spin")

  setTimeout(() => {
    icon.classList.remove("fa-spin")
    showNotification("Lista de productos actualizada", "success")
    updateStatsAnimation()
  }, 1000)
}

function exportProducts(format) {
  showNotification(`Exportando productos en formato ${format.toUpperCase()}...`, "info")

  setTimeout(() => {
    showNotification(`Productos exportados correctamente en ${format.toUpperCase()}`, "success")
  }, 2000)
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

function getProductData(productId) {
  // Datos simulados - en producción vendrían de la API
  const products = {
    1: {
      name: "Laptop HP Pavilion 15",
      sku: "LAP-HP-001",
      category: "Electrónica",
      price: "$1,299.99",
      stock: "25",
      minStock: "5",
      status: "Activo",
      date: "15/05/2025",
      description: "Laptop de alto rendimiento con procesador Intel Core i7, 16GB RAM y SSD de 512GB.",
    },
    2: {
      name: "Cafetera Automática Deluxe",
      sku: "CAF-DEL-002",
      category: "Hogar",
      price: "$299.99",
      stock: "5",
      minStock: "3",
      status: "Activo",
      date: "12/05/2025",
      description: "Cafetera automática con molinillo integrado y sistema de espuma de leche.",
    },
  }

  return products[productId] || products["1"]
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
