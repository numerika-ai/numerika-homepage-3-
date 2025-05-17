"use client"

import { useState, useEffect } from "react"
import Image from "next/image"
import { ChevronLeft, ChevronRight } from "lucide-react"
import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"

const testimonials = [
  {
    id: 1,
    content:
      "Szkolenie z Power BI zmieniło sposób, w jaki analizujemy dane w naszej firmie. Trener w przystępny sposób wyjaśnił nawet najbardziej skomplikowane zagadnienia.",
    author: "Anna Nowak",
    position: "Dyrektor finansowy, XYZ Corp",
    image: "/professional-woman-portrait.png",
  },
  {
    id: 2,
    content:
      "Dzięki szkoleniu z Excela zaawansowanego zaoszczędzam kilka godzin tygodniowo na automatyzacji raportów. Polecam każdemu analitykowi!",
    author: "Piotr Kowalski",
    position: "Analityk danych, ABC Solutions",
    image: "/professional-man-portrait.png",
  },
  {
    id: 3,
    content:
      "Warsztaty ze storytellingu danych pomogły mi przekształcić suche liczby w przekonujące prezentacje. Moje raporty wreszcie trafiają do odbiorców!",
    author: "Magdalena Wiśniewska",
    position: "Specjalista ds. marketingu, StartUp Inc.",
    image: "/young-professional-woman.png",
  },
  {
    id: 4,
    content:
      "Szkolenie z AI w analityce danych otworzyło mi oczy na nowe możliwości. Teraz wykorzystuję sztuczną inteligencję do automatyzacji procesów w mojej firmie.",
    author: "Tomasz Jankowski",
    position: "CEO, Tech Solutions",
    image: "/confident-businessman.png",
  },
  {
    id: 5,
    content:
      "Profesjonalne podejście, praktyczna wiedza i świetna atmosfera. Szkolenie z Power BI przerosło moje oczekiwania!",
    author: "Karolina Lewandowska",
    position: "Business Intelligence Analyst",
    image: "/young-professional-woman.png",
  },
]

export default function TestimonialsCarousel() {
  const [activeIndex, setActiveIndex] = useState(0)
  const [autoplay, setAutoplay] = useState(true)

  const nextSlide = () => {
    setActiveIndex((current) => (current + 1) % testimonials.length)
  }

  const prevSlide = () => {
    setActiveIndex((current) => (current - 1 + testimonials.length) % testimonials.length)
  }

  useEffect(() => {
    if (!autoplay) return

    const interval = setInterval(() => {
      nextSlide()
    }, 5000)

    return () => clearInterval(interval)
  }, [autoplay, activeIndex])

  return (
    <div className="relative mx-auto max-w-4xl px-4">
      <div className="overflow-hidden">
        <div
          className="flex transition-transform duration-500 ease-in-out"
          style={{ transform: `translateX(-${activeIndex * 100}%)` }}
        >
          {testimonials.map((testimonial) => (
            <div key={testimonial.id} className="min-w-full px-4">
              <Card className="border-none shadow-lg">
                <CardContent className="p-8">
                  <div className="flex flex-col items-center text-center">
                    <div className="relative mb-6 h-20 w-20 overflow-hidden rounded-full border-4 border-blue-100">
                      <Image
                        src={testimonial.image || "/placeholder.svg"}
                        alt={testimonial.author}
                        fill
                        className="object-cover"
                      />
                    </div>

                    <blockquote className="mb-6 text-lg text-gray-700">"{testimonial.content}"</blockquote>

                    <div>
                      <p className="font-semibold text-gray-900">{testimonial.author}</p>
                      <p className="text-sm text-gray-600">{testimonial.position}</p>
                    </div>
                  </div>
                </CardContent>
              </Card>
            </div>
          ))}
        </div>
      </div>

      <div className="mt-8 flex justify-center gap-2">
        <Button
          variant="outline"
          size="icon"
          onClick={prevSlide}
          className="rounded-full border-[#a9dae6] hover:bg-[#a9dae6]/20 hover:text-[#36698d]"
          onMouseEnter={() => setAutoplay(false)}
          onMouseLeave={() => setAutoplay(true)}
        >
          <ChevronLeft className="h-5 w-5" />
          <span className="sr-only">Poprzedni</span>
        </Button>

        <div className="flex items-center gap-2">
          {testimonials.map((_, index) => (
            <button
              key={index}
              onClick={() => setActiveIndex(index)}
              className={`h-2.5 w-2.5 rounded-full transition-all ${
                index === activeIndex ? "bg-[#36698d] w-6" : "bg-[#a9dae6]"
              }`}
              aria-label={`Przejdź do opinii ${index + 1}`}
              onMouseEnter={() => setAutoplay(false)}
              onMouseLeave={() => setAutoplay(true)}
            />
          ))}
        </div>

        <Button
          variant="outline"
          size="icon"
          onClick={nextSlide}
          className="rounded-full border-[#a9dae6] hover:bg-[#a9dae6]/20 hover:text-[#36698d]"
          onMouseEnter={() => setAutoplay(false)}
          onMouseLeave={() => setAutoplay(true)}
        >
          <ChevronRight className="h-5 w-5" />
          <span className="sr-only">Następny</span>
        </Button>
      </div>
    </div>
  )
}
