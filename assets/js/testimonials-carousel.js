/**
 * Testimonials Carousel script for Numerika theme
 */
document.addEventListener("DOMContentLoaded", () => {
  const carousel = document.querySelector(".testimonials-carousel")
  if (!carousel) return

  const slider = carousel.querySelector(".testimonials-slider")
  const slides = carousel.querySelectorAll(".testimonial-slide")
  const prevButton = carousel.querySelector(".testimonial-prev")
  const nextButton = carousel.querySelector(".testimonial-next")
  const dotsContainer = carousel.querySelector(".testimonial-dots")

  if (!slider || !slides.length || !prevButton || !nextButton || !dotsContainer) return

  let currentIndex = 0
  let autoplayInterval
  const autoplayDelay = 5000

  // Create dots
  slides.forEach((_, index) => {
    const dot = document.createElement("button")
    dot.classList.add("testimonial-dot")
    dot.setAttribute("aria-label", `Go to testimonial ${index + 1}`)
    dot.style.width = index === 0 ? "1.5rem" : "0.625rem"
    dot.style.height = "0.625rem"
    dot.style.borderRadius = "9999px"
    dot.style.backgroundColor = index === 0 ? "#36698d" : "#a9dae6"
    dot.style.transition = "all 0.3s"

    dot.addEventListener("click", () => {
      goToSlide(index)
      resetAutoplay()
    })

    dotsContainer.appendChild(dot)
  })

  // Update dots
  const updateDots = () => {
    const dots = dotsContainer.querySelectorAll(".testimonial-dot")
    dots.forEach((dot, index) => {
      if (index === currentIndex) {
        dot.style.width = "1.5rem"
        dot.style.backgroundColor = "#36698d"
      } else {
        dot.style.width = "0.625rem"
        dot.style.backgroundColor = "#a9dae6"
      }
    })
  }

  // Go to slide
  const goToSlide = (index) => {
    currentIndex = index
    slider.style.transform = `translateX(-${currentIndex * 100}%)`
    updateDots()
  }

  // Next slide
  const nextSlide = () => {
    currentIndex = (currentIndex + 1) % slides.length
    goToSlide(currentIndex)
  }

  // Previous slide
  const prevSlide = () => {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length
    goToSlide(currentIndex)
  }

  // Start autoplay
  const startAutoplay = () => {
    autoplayInterval = setInterval(nextSlide, autoplayDelay)
  }

  // Reset autoplay
  const resetAutoplay = () => {
    clearInterval(autoplayInterval)
    startAutoplay()
  }

  // Event listeners
  prevButton.addEventListener("click", () => {
    prevSlide()
    resetAutoplay()
  })

  nextButton.addEventListener("click", () => {
    nextSlide()
    resetAutoplay()
  })

  // Pause autoplay on hover
  carousel.addEventListener("mouseenter", () => {
    clearInterval(autoplayInterval)
  })

  carousel.addEventListener("mouseleave", () => {
    startAutoplay()
  })

  // Start autoplay
  startAutoplay()
})
