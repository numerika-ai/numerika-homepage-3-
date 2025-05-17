/**
 * Portfolio Gallery script for Numerika theme
 */
document.addEventListener("DOMContentLoaded", () => {
  const gallery = document.querySelector(".portfolio-gallery")
  if (!gallery) return

  const filters = gallery.querySelectorAll(".portfolio-filter")
  const items = gallery.querySelectorAll(".portfolio-item")
  const modal = document.getElementById("portfolio-modal")
  const modalImage = document.getElementById("modal-image")
  const modalTitle = document.getElementById("modal-title")
  const modalCategory = document.getElementById("modal-category")
  const modalClose = document.getElementById("modal-close")

  // Filter items
  filters.forEach((filter) => {
    filter.addEventListener("click", () => {
      // Update active filter
      filters.forEach((f) => f.classList.remove("active"))
      filter.classList.add("active")

      const category = filter.getAttribute("data-filter")

      // Show/hide items based on category
      items.forEach((item) => {
        const itemCategory = item.getAttribute("data-category")
        if (category === "all" || category === itemCategory) {
          item.style.display = "block"
        } else {
          item.style.display = "none"
        }
      })
    })
  })

  // Open modal on item click
  items.forEach((item) => {
    item.addEventListener("click", () => {
      const image = item.querySelector("img").src
      const title = item.querySelector("h3").textContent
      const category = item.querySelector("p").textContent

      modalImage.src = image
      modalImage.alt = title
      modalTitle.textContent = title
      modalCategory.textContent = category

      modal.classList.remove("hidden")
      modal.classList.add("flex")
      document.body.style.overflow = "hidden"
    })
  })

  // Close modal
  if (modalClose) {
    modalClose.addEventListener("click", () => {
      modal.classList.add("hidden")
      modal.classList.remove("flex")
      document.body.style.overflow = "auto"
    })
  }

  // Close modal on outside click
  if (modal) {
    modal.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.classList.add("hidden")
        modal.classList.remove("flex")
        document.body.style.overflow = "auto"
      }
    })
  }
})
