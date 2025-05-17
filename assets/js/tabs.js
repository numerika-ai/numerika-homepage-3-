/**
 * Tabs script for Numerika theme
 */
document.addEventListener("DOMContentLoaded", () => {
  const tabTriggers = document.querySelectorAll(".tab-trigger")
  if (!tabTriggers.length) return

  tabTriggers.forEach((trigger) => {
    trigger.addEventListener("click", () => {
      // Get tab ID
      const tabId = trigger.getAttribute("data-tab")

      // Update active trigger
      tabTriggers.forEach((t) => {
        t.classList.remove("active")
        t.style.backgroundColor = ""
        t.style.color = ""
      })

      trigger.classList.add("active")
      trigger.style.backgroundColor = "#36698d"
      trigger.style.color = "white"

      // Show active tab content
      const tabContents = document.querySelectorAll(".tab-content")
      tabContents.forEach((content) => {
        content.classList.add("hidden")
      })

      const activeContent = document.getElementById(`tab-content-${tabId}`)
      if (activeContent) {
        activeContent.classList.remove("hidden")
      }
    })
  })

  // Initialize first tab
  const firstTrigger = tabTriggers[0]
  if (firstTrigger) {
    firstTrigger.style.backgroundColor = "#36698d"
    firstTrigger.style.color = "white"
  }
})
