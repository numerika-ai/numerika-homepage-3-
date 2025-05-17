/**
 * Contact Form script for Numerika theme
 */
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contact-form")
  if (!form) return

  const formMessage = document.getElementById("form-message")

  form.addEventListener("submit", (e) => {
    e.preventDefault()

    // Get form data
    const formData = new FormData(form)
    const submitButton = form.querySelector('button[type="submit"]')
    const originalButtonText = submitButton.textContent

    // Disable button and show loading state
    submitButton.disabled = true
    submitButton.textContent = "Wysyłanie..."

    // Simulate form submission (in a real theme, this would be an AJAX request to WordPress)
    setTimeout(() => {
      // Show success message
      formMessage.classList.remove("hidden", "bg-red-50", "text-red-800")
      formMessage.classList.add("bg-green-50", "text-green-800")
      formMessage.textContent = "Dziękujemy! Twoja wiadomość została wysłana. Skontaktujemy się z Tobą wkrótce."

      // Reset form
      form.reset()

      // Reset button
      submitButton.disabled = false
      submitButton.textContent = originalButtonText

      // Hide message after 5 seconds
      setTimeout(() => {
        formMessage.classList.add("hidden")
      }, 5000)
    }, 1000)
  })
})
