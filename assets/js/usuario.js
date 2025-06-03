
document.addEventListener("DOMContentLoaded", () => {

  initSidebar()
  initDateTime()
  initTooltips()
  initFilters()
  initViewToggle()
  initSorting()
  initSearch()
  initProductDetails()
  initFavorites()
  updateProductCount()

  //funcionalidad del sidebar
  function initSidebar() {
    const sidebar = document.getElementById("sidebar")
    const sidebarToggle = document.getElementById("sidebarToggle")
    const sidebarToggleBtn = document.getElementById("sidebarToggleBtn")

    // sidebar en pc
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

  // Inicializar tooltips
  function initTooltips() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl))
  }

  // Filtros de productos
  function initFilters() {
    const categoryFilter = document.getElementById("categoryFilter")
    const statusFilter = document.getElementById("statusFilter")
    const stockFilter = document.getElementById("stockFilter")
    const refreshBtn = document.getElementById("refreshBtn")

    if (!categoryFilter || !statusFilter || !stockFilter) return

    const applyFilters = () => {
      const categoryValue = categoryFilter.value
      const statusValue = statusFilter.value
      const stockValue = stockFilter.value

      // Filtrar filas de tabla
      const tableRows = document.querySelectorAll(".product-row")
      tableRows.forEach((row) => {
        const rowCategory = row.getAttribute("data-category")
        const rowStatus = row.getAttribute("data-status")
        const rowStockStatus = row.getAttribute("data-stock-status")

        let showRow = true

        if (categoryValue && rowCategory !== categoryValue) {
          showRow = false
        }

        if (statusValue && rowStatus !== statusValue) {
          showRow = false
        }

        if (stockValue && rowStockStatus !== stockValue) {
          showRow = false
        }

        row.style.display = showRow ? "" : "none"
      })

      // Filtrar tarjetas de cuadrícula
      const gridCards = document.querySelectorAll(".product-card-wrapper")
      gridCards.forEach((card) => {
        const cardCategory = card.getAttribute("data-category")
        const cardStatus = card.getAttribute("data-status")
        const cardStockStatus = card.getAttribute("data-stock-status")

        let showCard = true

        if (categoryValue && cardCategory !== categoryValue) {
          showCard = false
        }

        if (statusValue && cardStatus !== statusValue) {
          showCard = false
        }

        if (stockValue && cardStockStatus !== stockValue) {
          showCard = false
        }

        card.style.display = showCard ? "" : "none"
      })

      // mensaje si no hay productos
      const noProductsRow = document.getElementById("noProductsRow")
      const noProductsGrid = document.getElementById("noProductsGrid")

      if (noProductsRow) {
        const visibleRows = Array.from(tableRows).filter((row) => row.style.display !== "none")
        noProductsRow.style.display = visibleRows.length === 0 ? "" : "none"
      }

      if (noProductsGrid) {
        const visibleCards = Array.from(gridCards).filter((card) => card.style.display !== "none")
        noProductsGrid.style.display = visibleCards.length === 0 ? "" : "none"
      }

      updateProductCount()
    }

    categoryFilter.addEventListener("change", applyFilters)
    statusFilter.addEventListener("change", applyFilters)
    stockFilter.addEventListener("change", applyFilters)

    if (refreshBtn) {
      refreshBtn.addEventListener("click", () => {
        categoryFilter.value = ""
        statusFilter.value = ""
        stockFilter.value = ""

        const searchInput = document.getElementById("searchInput")
        if (searchInput) {
          searchInput.value = ""
        }

        applyFilters()

        // Efecto  rotacion icono de refresh
        const refreshIcon = refreshBtn.querySelector("i")
        refreshIcon.classList.add("fa-spin")
        setTimeout(() => {
          refreshIcon.classList.remove("fa-spin")
        }, 500)

        showNotification("Lista de productos actualizada", "success")
      })
    }
  }

  // Toggle entre vista de tabla y cuadrícula
  function initViewToggle() {
    const viewButtons = document.querySelectorAll(".view-btn")
    const tableView = document.getElementById("tableView")
    const gridView = document.getElementById("gridView")

    if (!viewButtons.length || !tableView || !gridView) return

    viewButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        const viewType = btn.getAttribute("data-view")

        viewButtons.forEach((b) => b.classList.remove("active"))
        btn.classList.add("active")

        // Mostrar vista correspondiente
        if (viewType === "table") {
          tableView.style.display = ""
          gridView.style.display = "none"
        } else {
          tableView.style.display = "none"
          gridView.style.display = ""
        }

        // Guardar preferencia
        localStorage.setItem("preferredView", viewType)
      })
    })

    // Restaurar preferencia de vista
    const preferredView = localStorage.getItem("preferredView")
    if (preferredView) {
      const preferredBtn = document.querySelector(`.view-btn[data-view="${preferredView}"]`)
      if (preferredBtn) {
        preferredBtn.click()
      }
    }
  }

  // Ordenamiento de tabla
  function initSorting() {
    const sortableHeaders = document.querySelectorAll(".sortable")

    if (!sortableHeaders.length) return

    sortableHeaders.forEach((header) => {
      header.addEventListener("click", () => {
        const sortBy = header.getAttribute("data-sort")
        const currentDirection = header.getAttribute("data-direction") || "asc"
        const newDirection = currentDirection === "asc" ? "desc" : "asc"

        // Resetear dirección en todos los headers
        sortableHeaders.forEach((h) => {
          h.setAttribute("data-direction", "")
          h.querySelector("i").className = "fas fa-sort ms-1"
        })

        // Actualizar dirección e icono del header actual
        header.setAttribute("data-direction", newDirection)
        header.querySelector("i").className = `fas fa-sort-${newDirection === "asc" ? "up" : "down"} ms-1`

        // Ordenar filas
        sortTable(sortBy, newDirection)
      })
    })

    function sortTable(sortBy, direction) {
      const table = document.getElementById("productsTable")
      if (!table) return

      const tbody = table.querySelector("tbody")
      const rows = Array.from(tbody.querySelectorAll("tr:not(#noProductsRow)"))

      // obtener el valor de la celda
      const getCellValue = (row, index) => {
        const cell = row.cells[index]
        return cell.textContent.trim()
      }

      // Determinar el índice de la columna
      let columnIndex
      switch (sortBy) {
        case "id":
          columnIndex = 0
          break
        case "nombre":
          columnIndex = 2
          break
        case "categoria":
          columnIndex = 3
          break
        case "stock":
          columnIndex = 5
          break
        case "precio":
          columnIndex = 6
          break
        case "estado":
          columnIndex = 7
          break
        default:
          columnIndex = 0
      }

      // Ordenar filas
      const sortedRows = rows.sort((a, b) => {
        const aValue = getCellValue(a, columnIndex)
        const bValue = getCellValue(b, columnIndex)

        // Convertir a número si es posible
        const aNum = Number.parseFloat(aValue.replace(/[^\d.-]/g, ""))
        const bNum = Number.parseFloat(bValue.replace(/[^\d.-]/g, ""))

        if (!isNaN(aNum) && !isNaN(bNum)) {
          return direction === "asc" ? aNum - bNum : bNum - aNum
        }

        return direction === "asc"
          ? aValue.localeCompare(bValue, "es", { sensitivity: "base" })
          : bValue.localeCompare(aValue, "es", { sensitivity: "base" })
      })

      // Reordenar el DOM
      sortedRows.forEach((row) => tbody.appendChild(row))

      showNotification(
        `Productos ordenados por ${sortBy} (${direction === "asc" ? "ascendente" : "descendente"})`,
        "info",
      )
    }
  }

  // Búsqueda de productos
  function initSearch() {
    const searchInput = document.getElementById("searchInput")

    if (!searchInput) return

    searchInput.addEventListener("input", () => {
      const searchTerm = searchInput.value.toLowerCase().trim()

      // Buscar en filas de tabla
      const tableRows = document.querySelectorAll(".product-row")
      tableRows.forEach((row) => {
        const productName = row.cells[2].textContent.toLowerCase()
        const productCategory = row.cells[3].textContent.toLowerCase()
        const productDescription = row.cells[4].getAttribute("title").toLowerCase()

        const matchesSearch =
          productName.includes(searchTerm) ||
          productCategory.includes(searchTerm) ||
          productDescription.includes(searchTerm)

        row.style.display = matchesSearch ? "" : "none"
      })

      // Buscar en tarjetas de cuadrícula
      const gridCards = document.querySelectorAll(".product-card-wrapper")
      gridCards.forEach((card) => {
        const productName = card.querySelector(".product-name").textContent.toLowerCase()
        const productCategory = card.querySelector(".product-category").textContent.toLowerCase()
        const productDescription = card.querySelector(".product-description").getAttribute("title").toLowerCase()

        const matchesSearch =
          productName.includes(searchTerm) ||
          productCategory.includes(searchTerm) ||
          productDescription.includes(searchTerm)

        card.style.display = matchesSearch ? "" : "none"
      })

      // Mostrar mensaje si no hay productos
      const noProductsRow = document.getElementById("noProductsRow")
      const noProductsGrid = document.getElementById("noProductsGrid")

      if (noProductsRow) {
        const visibleRows = Array.from(tableRows).filter((row) => row.style.display !== "none")
        noProductsRow.style.display = visibleRows.length === 0 ? "" : "none"
      }

      if (noProductsGrid) {
        const visibleCards = Array.from(gridCards).filter((card) => card.style.display !== "none")
        noProductsGrid.style.display = visibleCards.length === 0 ? "" : "none"
      }

      updateProductCount()
    })
  }

  //  detalles de producto
  function initProductDetails() {
    const detailButtons = document.querySelectorAll(".view-details-btn")
    const modal = document.getElementById("productDetailsModal")

    if (!detailButtons.length || !modal) return

    detailButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        const productId = btn.getAttribute("data-product-id")

      
        // simulacion de datos de ejemplp
        const productRow = btn.closest(".product-row")
        const productCard = btn.closest(".product-card-wrapper")

        let productData = {}

        if (productRow) {
          productData = {
            name: productRow.cells[2].textContent,
            image: productRow.cells[1].querySelector("img")?.src || "",
            category: productRow.cells[3].textContent,
            description: productRow.cells[4].getAttribute("title"),
            stock: productRow.cells[5].textContent,
            price: productRow.cells[6].textContent,
            status: productRow.cells[7].textContent,
            code: `PROD-${productId.padStart(5, "0")}`,
          }
        } else if (productCard) {
          productData = {
            name: productCard.querySelector(".product-name").textContent,
            image: productCard.querySelector(".product-image img")?.src || "",
            category: productCard.querySelector(".product-category").textContent,
            description: productCard.querySelector(".product-description").getAttribute("title"),
            stock: productCard.querySelector(".stock-value").textContent,
            price: productCard.querySelector(".product-price").textContent,
            status: productCard.getAttribute("data-status") === "1" ? "Activo" : "Inactivo",
            code: `PROD-${productId.padStart(5, "0")}`,
          }
        }

        // Actualizar modal con datos del producto
        modal.querySelector("#modalProductName").textContent = productData.name
        modal.querySelector("#modalProductCategory").textContent = productData.category
        modal.querySelector("#modalProductDescription").textContent = productData.description
        modal.querySelector("#modalProductStock").textContent = productData.stock
        modal.querySelector("#modalProductPrice").textContent = productData.price
        modal.querySelector("#modalProductStatus").textContent = productData.status
        modal.querySelector("#modalProductCode").textContent = productData.code

        const modalImage = modal.querySelector("#modalProductImage")
        if (productData.image) {
          modalImage.src = productData.image
          modalImage.style.display = ""
        } else {
          modalImage.style.display = "none"
        }

        // Actualizar botón de favoritos
        const favoriteBtn = modal.querySelector("#modalAddToFavorites")
        favoriteBtn.setAttribute("data-product-id", productId)

        // Registrar vista de producto simulada
        console.log(`Producto visto: ${productData.name} (ID: ${productId})`)
      })
    })
  }

  // Funcionalidad favoritos
  function initFavorites() {
    const favoriteButtons = document.querySelectorAll(".add-to-favorites")
    const modalFavoriteBtn = document.getElementById("modalAddToFavorites")

    if (!favoriteButtons.length) return

    // Cargar favoritos guardados
    let favorites = JSON.parse(localStorage.getItem("productFavorites")) || []

    // Actualizar estado inicial de los botones
    updateFavoriteButtons()

    // Añadir event listeners a botones de favoritos
    favoriteButtons.forEach((btn) => {
      btn.addEventListener("click", (e) => {
        e.preventDefault()
        e.stopPropagation()

        const productId = btn.getAttribute("data-product-id")
        toggleFavorite(productId, btn)
      })
    })

    // Botón de favoritos en modal
    if (modalFavoriteBtn) {
      modalFavoriteBtn.addEventListener("click", () => {
        const productId = modalFavoriteBtn.getAttribute("data-product-id")
        toggleFavorite(productId)

        const modalInstance = bootstrap.Modal.getInstance(document.getElementById("productDetailsModal"))
        modalInstance.hide()
      })
    }

    function toggleFavorite(productId, clickedBtn = null) {
      const isFavorite = favorites.includes(productId)

      if (isFavorite) {
        // Quitar de favoritos
        favorites = favorites.filter((id) => id !== productId)
        showNotification("Producto eliminado de favoritos", "info")
      } else {
        // Añadir a favoritos
        favorites.push(productId)
        showNotification("Producto añadido a favoritos", "success")
      }

      // Guardar en localStorage
      localStorage.setItem("productFavorites", JSON.stringify(favorites))

      // Actualizar botones
      updateFavoriteButtons()
    }

    function updateFavoriteButtons() {
      favoriteButtons.forEach((btn) => {
        const productId = btn.getAttribute("data-product-id")
        const isFavorite = favorites.includes(productId)

        const icon = btn.querySelector("i")
        if (icon) {
          if (isFavorite) {
            icon.className = "fas fa-star"
            btn.classList.add("text-warning")
          } else {
            icon.className = "far fa-star"
            btn.classList.remove("text-warning")
          }
        }
      })

      // Actualizar botón del modal si existe
      if (modalFavoriteBtn) {
        const productId = modalFavoriteBtn.getAttribute("data-product-id")
        const isFavorite = favorites.includes(productId)

        const icon = modalFavoriteBtn.querySelector("i")
        if (icon) {
          icon.className = isFavorite ? "fas fa-star me-1" : "far fa-star me-1"
        }

        modalFavoriteBtn.textContent = isFavorite ? "Quitar de Favoritos" : "Añadir a Favoritos"
        modalFavoriteBtn.className = isFavorite ? "btn btn-outline-warning" : "btn btn-primary"

        
        if (!modalFavoriteBtn.querySelector("i")) {
          const newIcon = document.createElement("i")
          newIcon.className = isFavorite ? "fas fa-star me-1" : "far fa-star me-1"
          modalFavoriteBtn.prepend(newIcon)
        }
      }
    }
  }

  // Actualizar contador de productos
  function updateProductCount() {
    const tableRows = document.querySelectorAll(".product-row")
    const gridCards = document.querySelectorAll(".product-card-wrapper")
    const shownProductsElement = document.getElementById("shownProducts")
    const totalProductsElement = document.getElementById("totalProducts")
    const shownProductsGridElement = document.getElementById("shownProductsGrid")
    const totalProductsGridElement = document.getElementById("totalProductsGrid")

    if (shownProductsElement && totalProductsElement) {
      const visibleRows = Array.from(tableRows).filter((row) => row.style.display !== "none").length
      const totalRows = tableRows.length

      shownProductsElement.textContent = visibleRows
      totalProductsElement.textContent = totalRows
    }

    if (shownProductsGridElement && totalProductsGridElement) {
      const visibleCards = Array.from(gridCards).filter((card) => card.style.display !== "none").length
      const totalCards = gridCards.length

      shownProductsGridElement.textContent = visibleCards
      totalProductsGridElement.textContent = totalCards
    }
  }

  // Exportar productos simulado
  const exportBtn = document.getElementById("exportBtn")
  if (exportBtn) {
    exportBtn.addEventListener("click", () => {
      showNotification("Exportando productos...", "info")

      // Simular tiempo de procesamiento
      setTimeout(() => {
        showNotification("Productos exportados correctamente", "success")
      }, 1500)
    })
  }
})

//  mostrar notificaciones
function showNotification(message, type = "info") {
  const notification = document.createElement("div")
  notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`
  notification.style.cssText = `
    top: 20px;
    right: 20px;
    z-index: 9999;
    min-width: 300px;
    box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.15);
    animation: slideInRight 0.3s ease-out;
  `

  notification.innerHTML = `
    <div class="d-flex align-items-center">
      <i class="fas fa-${type === "success" ? "check-circle" : type === "danger" ? "exclamation-circle" : type === "warning" ? "exclamation-triangle" : "info-circle"} me-2"></i>
      <div>${message}</div>
      <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  `

  document.body.appendChild(notification)

  // Auto remove after 3 seconds
  setTimeout(() => {
    notification.classList.remove("show")
    setTimeout(() => notification.remove(), 150)
  }, 3000)
}
