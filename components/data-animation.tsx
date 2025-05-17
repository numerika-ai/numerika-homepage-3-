"use client"

import { useEffect, useRef } from "react"

export default function DataAnimation() {
  const canvasRef = useRef<HTMLCanvasElement>(null)

  useEffect(() => {
    const canvas = canvasRef.current
    if (!canvas) return

    const ctx = canvas.getContext("2d")
    if (!ctx) return

    // Set canvas dimensions
    const setCanvasDimensions = () => {
      const container = canvas.parentElement
      if (!container) return

      canvas.width = container.clientWidth
      canvas.height = 240
    }

    setCanvasDimensions()
    window.addEventListener("resize", setCanvasDimensions)

    // Animation variables
    let animationFrameId: number
    const dataPoints: { x: number; y: number; size: number; color: string; speed: number }[] = []
    const charts: { x: number; y: number; width: number; height: number; color: string }[] = []

    // Create initial data points
    const createDataPoints = () => {
      const width = canvas.width
      const height = canvas.height

      // Clear existing data points
      dataPoints.length = 0
      charts.length = 0

      // Create data points (representing raw data)
      for (let i = 0; i < 30; i++) {
        dataPoints.push({
          x: Math.random() * width,
          y: Math.random() * height,
          size: Math.random() * 4 + 2,
          color: `rgba(${Math.floor(Math.random() * 100)}, ${Math.floor(Math.random() * 100)}, ${Math.floor(Math.random() * 255)}, 0.7)`,
          speed: Math.random() * 0.5 + 0.2,
        })
      }

      // Create charts (representing visualizations)
      const chartWidth = width / 4
      const chartHeight = height / 2
      const chartY = height / 2 - chartHeight / 2

      // Bar chart
      charts.push({
        x: width * 0.75 - chartWidth / 2,
        y: chartY,
        width: chartWidth,
        height: chartHeight,
        color: "rgba(59, 130, 246, 0.7)", // Blue
      })

      // Pie chart
      charts.push({
        x: width * 0.85,
        y: chartY + chartHeight / 2,
        width: chartHeight / 2,
        height: chartHeight / 2,
        color: "rgba(6, 182, 212, 0.7)", // Cyan
      })
    }

    createDataPoints()
    window.addEventListener("resize", createDataPoints)

    // Animation function
    const animate = () => {
      ctx.clearRect(0, 0, canvas.width, canvas.height)

      // Draw connecting lines
      ctx.beginPath()
      ctx.strokeStyle = "rgba(203, 213, 225, 0.3)"
      ctx.lineWidth = 0.5

      for (let i = 0; i < dataPoints.length; i++) {
        const point = dataPoints[i]

        // Connect to nearby points
        for (let j = i + 1; j < dataPoints.length; j++) {
          const otherPoint = dataPoints[j]
          const distance = Math.sqrt(Math.pow(point.x - otherPoint.x, 2) + Math.pow(point.y - otherPoint.y, 2))

          if (distance < 80) {
            ctx.moveTo(point.x, point.y)
            ctx.lineTo(otherPoint.x, otherPoint.y)
          }
        }

        // Connect to charts
        for (const chart of charts) {
          const chartCenterX = chart.x + chart.width / 2
          const chartCenterY = chart.y + chart.height / 2

          const distance = Math.sqrt(Math.pow(point.x - chartCenterX, 2) + Math.pow(point.y - chartCenterY, 2))

          if (distance < 150 && Math.random() > 0.95) {
            ctx.moveTo(point.x, point.y)
            ctx.lineTo(chartCenterX, chartCenterY)
          }
        }
      }

      ctx.stroke()

      // Draw data points
      for (const point of dataPoints) {
        ctx.beginPath()
        ctx.fillStyle = point.color
        ctx.arc(point.x, point.y, point.size, 0, Math.PI * 2)
        ctx.fill()

        // Move points
        point.x += Math.random() * point.speed * 2 - point.speed
        point.y += Math.random() * point.speed * 2 - point.speed

        // Keep points within canvas
        if (point.x < 0) point.x = canvas.width
        if (point.x > canvas.width) point.x = 0
        if (point.y < 0) point.y = canvas.height
        if (point.y > canvas.height) point.y = 0
      }

      // Draw charts
      // Bar chart
      const barChart = charts[0]
      ctx.fillStyle = barChart.color

      const barCount = 5
      const barWidth = barChart.width / (barCount * 2)

      for (let i = 0; i < barCount; i++) {
        const barHeight = ((Math.sin(Date.now() / 1000 + i) + 1) * barChart.height) / 2
        ctx.fillRect(barChart.x + i * barWidth * 2, barChart.y + barChart.height - barHeight, barWidth, barHeight)
      }

      // Pie chart
      const pieChart = charts[1]
      const centerX = pieChart.x
      const centerY = pieChart.y
      const radius = pieChart.width

      // Draw pie segments
      const segments = 3
      for (let i = 0; i < segments; i++) {
        const startAngle = (i / segments) * Math.PI * 2
        const endAngle = ((i + 1) / segments) * Math.PI * 2

        ctx.beginPath()
        ctx.moveTo(centerX, centerY)
        ctx.arc(centerX, centerY, radius, startAngle, endAngle)
        ctx.closePath()

        // Different colors for segments
        const hue = (180 + i * 30) % 360
        ctx.fillStyle = `hsla(${hue}, 70%, 60%, 0.7)`
        ctx.fill()
      }

      animationFrameId = requestAnimationFrame(animate)
    }

    animate()

    return () => {
      window.removeEventListener("resize", setCanvasDimensions)
      window.removeEventListener("resize", createDataPoints)
      cancelAnimationFrame(animationFrameId)
    }
  }, [])

  return (
    <canvas ref={canvasRef} className="w-full rounded-lg" aria-label="Animacja transformacji danych w wizualizacje" />
  )
}
