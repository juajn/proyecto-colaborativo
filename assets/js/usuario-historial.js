import { Chart } from "@/components/ui/chart"
// Funcionalidad para página de historial de usuario
document.addEventListener("DOMContentLoaded", () => {
  initHistoryPage()
  initFilters()
  initChart()
  updateActivityNumbers()
})

function initHistoryPage() {
  // Botón de cargar más
  const loadMoreBtn = document.getElementById("loadMoreHistory")
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", loadMoreHistory)
  }

  // Botón de exportar
  const exportBtn = document.getElementById("exportHistory")
  if (exportBtn) {
    exportBtn.addEventListener("click", exportHistory)
  }

  // Animaciones de entrada para elementos del timeline
  animateTimelineItems()
}

function initFilters() {
  const searchInput = document.getElementById("searchHistory")
  const typeFilter = document.getElementById("activityTypeFilter")
  const periodFilter = document.getElementById("periodFilter")

  if (searchInput) {
    searchInput.addEventListener("input", debounce(filterHistory, 300))
  }
  ;[typeFilter, periodFilter].forEach((filter) => {
    if (filter) {
      filter.addEventListener("change", filterHistory)
    }
  })
}

function filterHistory() {
  const searchTerm = document.getElementById("searchHistory")?.value.toLowerCase() || ""
  const typeFilter = document.getElementById("activityTypeFilter")?.value || ""
  const periodFilter = document.getElementById("periodFilter")?.value || ""

  const timelineItems = document.querySelectorAll(".timeline-item")
  let visibleCount = 0

  timelineItems.forEach((item) => {
    const title = item.querySelector(".timeline-title").textContent.toLowerCase()
    const body = item.querySelector(".timeline-body").textContent.toLowerCase()
    const itemType = item.getAttribute("data-type")
    const itemDate = item.getAttribute("data-date")

    let visible = true

    // Filtro de búsqueda
    if (searchTerm && !title.includes(searchTerm) && !body.includes(searchTerm)) {
      visible = false
    }

    // Filtro de tipo
    if (typeFilter && itemType !== typeFilter) {
      visible = false
    }

    // Filtro de período
    if (periodFilter && !matchesPeriodFilter(itemDate, periodFilter)) {
      visible = false
    }

    item.style.display = visible ? "" : "none"
    if (visible) visibleCount++
  })

  // Mostrar mensaje si no hay resultados
  if (visibleCount === 0) {
    showNoResultsMessage()
  } else {
    hideNoResultsMessage()
  }
}

function matchesPeriodFilter(itemDate, filter) {
  const today = new Date()
  const itemDateObj = new Date(itemDate)

  switch (filter) {
    case "today":
      return itemDateObj.toDateString() === today.toDateString()
    case "week":
      const weekAgo = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000)
      return itemDateObj >= weekAgo
    case "month":
      const monthAgo = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate())
      return itemDateObj >= monthAgo
    default:
      return true
  }
}

function loadMoreHistory() {
  const loadMoreBtn = document.getElementById("loadMoreHistory")
  const timeline = document.getElementById("activityTimeline")

  // Simular carga
  loadMoreBtn.disabled = true
  loadMoreBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Cargando...'

  setTimeout(() => {
    // Agregar más elementos al timeline
    const newItems = generateMoreTimelineItems()
    newItems.forEach((item) => {
      timeline.appendChild(item)
    })

    loadMoreBtn.disabled = false
    loadMoreBtn.innerHTML = '<i class="fas fa-plus me-2"></i>Cargar Más Actividades'

    // Animar nuevos elementos
    animateTimelineItems()

    showNotification("Se cargaron más actividades", "success")
  }, 1500)
}

function generateMoreTimelineItems() {
  const items = []
  const activities = [
    {
      type: "view",
      icon: "fas fa-eye",
      color: "bg-primary",
      title: "Producto Visualizado",
      body: "Has visto el producto <strong>Teclado Mecánico RGB</strong>",
      meta: '<span class="badge bg-light text-dark">Electrónica</span><span class="text-muted">• Duración: 3 min 15 seg</span>',
      time: "Hace 3 horas",
    },
    {
      type: "category",
      icon: "fas fa-tags",
      color: "bg-warning",
      title: "Categoría Explorada",
      body: "Has explorado la categoría <strong>Deportes</strong>",
      meta: '<span class="badge bg-danger">18 productos</span><span class="text-muted">• Tiempo en categoría: 7 min</span>',
      time: "Hace 4 horas",
    },
    {
      type: "search",
      icon: "fas fa-search",
      color: "bg-success",
      title: "Búsqueda Realizada",
      body: 'Búsqueda: <strong>"mouse inalámbrico"</strong>',
      meta: '<span class="text-muted">• 6 resultados encontrados</span>',
      time: "Hace 5 horas",
    },
  ]

  activities.forEach((activity) => {
    const item = document.createElement("div")
    item.className = "timeline-item"
    item.setAttribute("data-type", activity.type)
    item.setAttribute("data-date", "2025-06-02")
    item.style.opacity = "0"
    item.style.transform = "translateY(20px)"

    item.innerHTML = `
            <div class="timeline-icon ${activity.color}">
                <i class="${activity.icon}"></i>
            </div>
            <div class="timeline-content">
                <div class="timeline-header">
                    <h6 class="timeline-title">${activity.title}</h6>
                    <span class="timeline-time">${activity.time}</span>
                </div>
                <div class="timeline-body">
                    <p>${activity.body}</p>
                    <div class="timeline-meta">
                        ${activity.meta}
                    </div>
                </div>
            </div>
        `

    items.push(item)
  })

  return items
}

function animateTimelineItems() {
  const items = document.querySelectorAll(".timeline-item")

  items.forEach((item, index) => {
    if (item.style.opacity === "0" || !item.style.opacity) {
      setTimeout(() => {
        item.style.transition = "all 0.6s ease-out"
        item.style.opacity = "1"
        item.style.transform = "translateY(0)"
      }, index * 100)
    }
  })
}

function exportHistory() {
  showNotification("Exportando historial de actividades...", "info")

  setTimeout(() => {
    showNotification("Historial exportado correctamente", "success")
  }, 2000)
}

function initChart() {
  const ctx = document.getElementById("activityChart")
  if (!ctx) return

  new Chart(ctx, {
    type: "line",
    data: {
      labels: ["Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"],
      datasets: [
        {
          label: "Actividades",
          data: [12, 19, 15, 25, 22, 18, 24],
          borderColor: "rgb(75, 192, 192)",
          backgroundColor: "rgba(75, 192, 192, 0.1)",
          tension: 0.4,
          fill: true,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: "rgba(0, 0, 0, 0.1)",
          },
        },
        x: {
          grid: {
            display: false,
          },
        },
      },
    },
  })
}

function updateActivityNumbers() {
  const activityNumbers = document.querySelectorAll(".activity-number[data-target]")

  activityNumbers.forEach((number) => {
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

function showNoResultsMessage() {
  hideNoResultsMessage()

  const timeline = document.getElementById("activityTimeline")
  const noResultsDiv = document.createElement("div")
  noResultsDiv.className = "text-center py-5 no-results-message"
  noResultsDiv.innerHTML = `
        <div class="alert alert-info">
            <i class="fas fa-search me-2"></i>
            No se encontraron actividades que coincidan con los filtros aplicados.
        </div>
    `

  timeline.appendChild(noResultsDiv)
}

function hideNoResultsMessage() {
  const noResultsMessage = document.querySelector(".no-results-message")
  if (noResultsMessage) {
    noResultsMessage.remove()
  }
}

function addHistoryStyles() {
  const style = document.createElement("style")
  style.textContent = `
        .activity-summary-card {
            border-radius: 1rem;
            padding: 1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .activity-summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.15);
        }
        
        .activity-summary-card::before {
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
        
        .activity-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .activity-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .activity-label {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 0.5rem;
        }
        
        .activity-trend {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .activity-timeline {
            position: relative;
            padding-left: 2rem;
        }
        
        .activity-timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 15px;
            width: 2px;
            background: #e3e6f0;
        }
        
        .timeline-item {
            position: relative;
            padding-bottom: 2rem;
            transition: all 0.6s ease-out;
        }
        
        .timeline-icon {
            position: absolute;
            left: -2rem;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.9rem;
            z-index: 1;
        }
        
        .timeline-content {
            background: white;
            padding: 1.25rem;
            border-radius: 0.75rem;
            box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.1);
            border-left: 3px solid var(--primary-color);
        }
        
        .timeline-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
        }
        
        .timeline-title {
            font-weight: 600;
            margin: 0;
            color: var(--dark-color);
        }
        
        .timeline-time {
            font-size: 0.8rem;
            color: #6c757d;
        }
        
        .timeline-body p {
            margin-bottom: 0.5rem;
            color: #495057;
        }
        
        .timeline-meta {
            font-size: 0.85rem;
        }
        
        .category-stat-item {
            padding: 1rem 0;
            border-bottom: 1px solid #e3e6f0;
        }
        
        .category-stat-item:last-child {
            border-bottom: none;
        }
        
        .category-stat-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.75rem;
        }
        
        .category-stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
        }
        
        .category-stat-details h6 {
            margin-bottom: 0.25rem;
            font-weight: 600;
        }
        
        .category-stat-progress {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .category-stat-progress .progress {
            flex: 1;
            height: 6px;
        }
        
        .progress-text {
            font-size: 0.85rem;
            font-weight: 600;
            color: #6c757d;
            min-width: 35px;
        }
        
        .recent-search-item {
            padding: 0.75rem 0;
            border-bottom: 1px solid #e3e6f0;
        }
        
        .recent-search-item:last-child {
            border-bottom: none;
        }
        
        .search-term {
            display: flex;
            align-items: center;
            margin-bottom: 0.25rem;
            font-weight: 500;
        }
        
        .search-meta {
            margin-left: 1.5rem;
        }
        
        .activity-chart {
            height: 200px;
        }
        
        .filters-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            align-items: end;
        }
        
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            min-width: 150px;
        }
        
        .filter-label {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--dark-color);
        }
        
        @media (max-width: 768px) {
            .activity-number {
                font-size: 2rem;
            }
            
            .timeline-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .filters-container {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-group {
                min-width: auto;
            }
        }
    `

  document.head.appendChild(style)
}

// Agregar estilos al cargar la página
addHistoryStyles()

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
