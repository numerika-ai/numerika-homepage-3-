"use client"

import type React from "react"

import { useState } from "react"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Textarea } from "@/components/ui/textarea"
import { Label } from "@/components/ui/label"

export default function ContactForm() {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    subject: "",
    message: "",
  })

  const [isSubmitting, setIsSubmitting] = useState(false)
  const [isSubmitted, setIsSubmitted] = useState(false)

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>) => {
    const { name, value } = e.target
    setFormData((prev) => ({ ...prev, [name]: value }))
  }

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault()
    setIsSubmitting(true)

    // Simulate form submission
    await new Promise((resolve) => setTimeout(resolve, 1000))

    setIsSubmitting(false)
    setIsSubmitted(true)
    setFormData({ name: "", email: "", subject: "", message: "" })

    // Reset success message after 5 seconds
    setTimeout(() => {
      setIsSubmitted(false)
    }, 5000)
  }

  return (
    <form onSubmit={handleSubmit} className="space-y-6">
      <div className="space-y-2">
        <Label htmlFor="name" className="text-gray-700">
          Imię i nazwisko
        </Label>
        <Input
          id="name"
          name="name"
          value={formData.name}
          onChange={handleChange}
          placeholder="Jan Kowalski"
          required
          className="w-full"
        />
      </div>

      <div className="space-y-2">
        <Label htmlFor="email" className="text-gray-700">
          Email
        </Label>
        <Input
          id="email"
          name="email"
          type="email"
          value={formData.email}
          onChange={handleChange}
          placeholder="jan.kowalski@example.com"
          required
          className="w-full"
        />
      </div>

      <div className="space-y-2">
        <Label htmlFor="subject" className="text-gray-700">
          Temat
        </Label>
        <Input
          id="subject"
          name="subject"
          value={formData.subject}
          onChange={handleChange}
          placeholder="Zapytanie o szkolenie"
          required
          className="w-full"
        />
      </div>

      <div className="space-y-2">
        <Label htmlFor="message" className="text-gray-700">
          Wiadomość
        </Label>
        <Textarea
          id="message"
          name="message"
          value={formData.message}
          onChange={handleChange}
          placeholder="Twoja wiadomość..."
          required
          className="min-h-[120px] w-full"
        />
      </div>

      <Button type="submit" className="w-full bg-[#36698d] hover:bg-[#1e8092]" disabled={isSubmitting}>
        {isSubmitting ? "Wysyłanie..." : "Wyślij wiadomość"}
      </Button>

      {isSubmitted && (
        <div className="rounded-md bg-green-50 p-4 text-center text-green-800">
          Dziękujemy! Twoja wiadomość została wysłana. Skontaktujemy się z Tobą wkrótce.
        </div>
      )}
    </form>
  )
}
