// Funcionalidad para página de categorías de usuario
document.addEventListener("DOMContentLoaded", () => {
  initCategoryPage()
  initSearch()
  initCategoryFilter()
  addCategoryCardStyles()
})

function initCategoryPage() {
  // Botones de ver categoría
  const viewCategoryButtons = document.querySelectorAll(".view-category")

  viewCategoryButtons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const category = btn.getAttribute("data-category")
      viewCategoryProducts(category)
    })
  })

  // Animaciones de hover para las tarjetas
  const categoryCards = document.querySelectorAll(".category-card")

  categoryCards.forEach((card) => {
    card.addEventListener("mouseenter", () => {
      card.style.transform = "translateY(-10px) scale(1.02)"
    })

    card.addEventListener("mouseleave", () => {
      card.style.transform = "translateY(0) scale(1)"
    })
  })
}

function initSearch() {
  const searchInput = document.getElementById("searchInput")

  if (searchInput) {
    searchInput.addEventListener("input", debounce(searchCategories, 300))
  }
}

function initCategoryFilter() {
  const categoryFilter = document.getElementById("categoryFilterSelect")

  if (categoryFilter) {
    categoryFilter.addEventListener("change", filterPopularProducts)
  }
}

function searchCategories() {
  const searchTerm = document.getElementById("searchInput").value.toLowerCase()
  const categoryCards = document.querySelectorAll(".category-card")

  categoryCards.forEach((card) => {
    const categoryName = card.querySelector(".category-name").textContent.toLowerCase()
    const categoryDescription = card.querySelector(".category-description").textContent.toLowerCase()
    const categoryTags = Array.from(card.querySelectorAll(".tag"))
      .map((tag) => tag.textContent.toLowerCase())
      .join(" ")

    const matches =
      categoryName.includes(searchTerm) || categoryDescription.includes(searchTerm) || categoryTags.includes(searchTerm)

    const cardContainer = card.closest(".col-xl-3, .col-lg-4, .col-md-6")
    if (cardContainer) {
      cardContainer.style.display = matches ? "" : "none"
    }
  })

  // Mostrar mensaje si no hay resultados
  const visibleCards = Array.from(document.querySelectorAll(".category-card")).filter((card) => {
    const container = card.closest(".col-xl-3, .col-lg-4, .col-md-6")
    return container && container.style.display !== "none"
  })

  if (visibleCards.length === 0 && searchTerm) {
    showNoResultsMessage()
  } else {
    hideNoResultsMessage()
  }
}

function filterPopularProducts() {
  const selectedCategory = document.getElementById("categoryFilterSelect").value
  const productItems = document.querySelectorAll(".product-item")

  productItems.forEach((item) => {
    const productCategory = item.getAttribute("data-category")

    if (!selectedCategory || productCategory === selectedCategory) {
      item.style.display = ""
    } else {
      item.style.display = "none"
    }
  })

  // Animación de entrada para productos visibles
  const visibleProducts = Array.from(productItems).filter((item) => item.style.display !== "none")
  visibleProducts.forEach((item, index) => {
    item.style.animation = `fadeInUp 0.6s ease-out ${index * 0.1}s both`
  })
}

function viewCategoryProducts(category) {
  // Simular navegación a productos de la categoría
  showNotification(`Cargando productos de ${category}...`, "info")

  setTimeout(() => {
    // En una aplicación real, esto redirigiría a la página de productos con filtro
    window.location.href = `productos.php?categoria=${encodeURIComponent(category)}`
  }, 1000)
}

function showNoResultsMessage() {
  hideNoResultsMessage() // Asegurar que no hay duplicados

  const container = document.querySelector(".row.g-4.mb-4")
  const noResultsDiv = document.createElement("div")
  noResultsDiv.className = "col-12 text-center no-results-message"
  noResultsDiv.innerHTML = `
        <div class="alert alert-info">
            <i class="fas fa-search me-2"></i>
            No se encontraron categorías que coincidan con tu búsqueda.
        </div>
    `

  container.appendChild(noResultsDiv)
}

function hideNoResultsMessage() {
  const noResultsMessage = document.querySelector(".no-results-message")
  if (noResultsMessage) {
    noResultsMessage.remove()
  }
}

function addCategoryCardStyles() {
  // Agregar estilos CSS dinámicamente para las tarjetas de categoría
  const style = document.createElement("style")
  style.textContent = `
        .category-card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            background: white;
            position: relative;
        }
        
        .category-header {
            height: 150px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .category-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30%, -30%);
        }
        
        .category-icon {
            font-size: 3rem;
            color: white;
            z-index: 2;
            position: relative;
        }
        
        .category-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .category-card:hover .category-overlay {
            opacity: 1;
        }
        
        .category-body {
            padding: 1.5rem;
        }
        
        .category-name {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--dark-color);
        }
        
        .category-description {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        
        .category-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e3e6f0;
        }
        
        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        .category-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        
        .tag {
            background: var(--light-color);
            color: var(--dark-color);
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .popular-product-card {
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            background: white;
            height: 100%;
        }
        
        .popular-product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15);
        }
        
        .popular-product-card .product-image {
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--light-color);
            position: relative;
            overflow: hidden;
        }
        
        .popular-product-card .product-image img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 0.5rem;
        }
        
        .popular-product-card .product-badge {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
        }
        
        .popular-product-card .product-info {
            padding: 1rem;
        }
        
        .popular-product-card .product-name {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            height: 2.5rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        
        .popular-product-card .product-category {
            margin-bottom: 0.5rem;
        }
        
        .popular-product-card .product-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .popular-product-card .product-rating {
            font-size: 0.8rem;
            color: #6c757d;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 768px) {
            .category-header {
                height: 120px;
            }
            
            .category-icon {
                font-size: 2.5rem;
            }
            
            .category-body {
                padding: 1rem;
            }
            
            .category-stats {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    `

  document.head.appendChild(style)
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
