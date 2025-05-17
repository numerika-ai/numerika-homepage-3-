import Image from "next/image"
import Link from "next/link"
import { ChevronRight, ArrowRight } from "lucide-react"

import { Button } from "@/components/ui/button"
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs"
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card"
import TestimonialsCarousel from "@/components/testimonials-carousel"
import PortfolioGallery from "@/components/portfolio-gallery"
import ContactForm from "@/components/contact-form"
import DataAnimation from "@/components/data-animation"

export default function Home() {
  return (
    <div className="flex min-h-screen flex-col">
      {/* Header */}
      <header className="sticky top-0 z-50 w-full border-b bg-white">
        <div className="container flex h-16 items-center justify-between">
          <div className="flex items-center gap-2">
            <Image src="/logo.svg" alt="Numerika Logo" width={40} height={40} className="h-10 w-auto" />
            <span className="text-xl font-bold text-[#36698d]">NUMERIKA</span>
          </div>
          <nav className="hidden md:flex items-center gap-6">
            <Link href="/" className="text-sm font-medium text-blue-900 hover:text-[#36698d]">
              Strona główna
            </Link>
            <Link href="#oferta" className="text-sm font-medium text-gray-600 hover:text-[#36698d]">
              Oferta
            </Link>
            <Link href="#szkolenia" className="text-sm font-medium text-gray-600 hover:text-[#36698d]">
              Szkolenia
            </Link>
            <Link href="#o-nas" className="text-sm font-medium text-gray-600 hover:text-[#36698d]">
              O nas
            </Link>
            <Link href="#blog" className="text-sm font-medium text-gray-600 hover:text-[#36698d]">
              Blog
            </Link>
            <Link href="#kontakt" className="text-sm font-medium text-gray-600 hover:text-[#36698d]">
              Kontakt
            </Link>
          </nav>
          <Button variant="outline" size="sm" className="md:hidden">
            Menu
          </Button>
        </div>
      </header>

      <main className="flex-1">
        {/* Hero Section */}
        <section className="relative overflow-hidden bg-gradient-to-r from-[#36698d] to-[#62bfc6] py-20 text-white">
          <div className="container relative z-10 flex flex-col items-center text-center">
            <h1 className="max-w-4xl text-4xl font-bold tracking-tight sm:text-5xl md:text-6xl">
              Zrozumiałe dane, lepsze decyzje, większa efektywność
            </h1>
            <p className="mt-6 max-w-2xl text-lg text-[#a9dae6]">
              Profesjonalne szkolenia z Excela, Power BI, storytellingu danych i AI dla firm i osób indywidualnych
            </p>
            <Button size="lg" className="mt-10 bg-white text-[#36698d] hover:bg-[#a9dae6]">
              Odkryj nasze szkolenia
              <ChevronRight className="ml-2 h-4 w-4" />
            </Button>

            <div className="mt-16 w-full max-w-3xl">
              <DataAnimation />
            </div>
          </div>

          <div className="absolute inset-0 bg-[url('/grid-pattern.png')] bg-center opacity-20"></div>
        </section>

        {/* Skills Development Section */}
        <section className="py-20">
          <div className="container">
            <h2 className="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
              Rozwijaj kompetencje analityczne przyszłości
            </h2>
            <div className="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
              {[
                {
                  title: "Excel od podstaw do mistrzostwa",
                  description: "Opanuj najważniejsze funkcje, formuły i narzędzia analityczne w Excelu",
                  icon: "/icons/excel.png",
                },
                {
                  title: "Power BI w praktyce",
                  description: "Twórz interaktywne dashboardy i wizualizacje danych w Power BI",
                  icon: "/icons/powerbi.png",
                },
                {
                  title: "Storytelling danych",
                  description: "Przekształć liczby w przekonujące historie, które inspirują do działania",
                  icon: "/icons/storytelling.png",
                },
                {
                  title: "AI w analityce danych",
                  description: "Wykorzystaj sztuczną inteligencję do automatyzacji i optymalizacji analiz",
                  icon: "/icons/ai.png",
                },
              ].map((item, index) => (
                <Card
                  key={index}
                  className="border-2 border-gray-100 transition-all hover:border-[#a9dae6] hover:shadow-md"
                >
                  <CardHeader className="flex flex-row items-center gap-4 pb-2">
                    <div className="flex h-12 w-12 items-center justify-center rounded-full bg-[#a9dae6]">
                      <Image src={item.icon || "/placeholder.svg"} alt={item.title} width={24} height={24} />
                    </div>
                    <CardTitle className="text-lg">{item.title}</CardTitle>
                  </CardHeader>
                  <CardContent>
                    <p className="text-gray-600">{item.description}</p>
                  </CardContent>
                </Card>
              ))}
            </div>
          </div>
        </section>

        {/* Why Choose Us Section */}
        <section className="bg-gray-50 py-20">
          <div className="container">
            <h2 className="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
              Dlaczego warto szkolić się z Numeriką?
            </h2>
            <div className="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
              {[
                {
                  title: "Praktyczne rozwiązania",
                  description: "Skupiamy się na realnych wyzwaniach, z którymi spotykasz się w codziennej pracy",
                  icon: "/icons/practical.png",
                },
                {
                  title: "Zrozumiały język",
                  description: "Tłumaczymy skomplikowane zagadnienia bez technicznego żargonu",
                  icon: "/icons/language.png",
                },
                {
                  title: "Doświadczeni praktycy",
                  description: "Nasi trenerzy to eksperci z wieloletnim doświadczeniem w branży",
                  icon: "/icons/experts.png",
                },
                {
                  title: "Wsparcie po szkoleniu",
                  description: "Zapewniamy pomoc i konsultacje również po zakończeniu szkolenia",
                  icon: "/icons/support.png",
                },
              ].map((item, index) => (
                <div
                  key={index}
                  className="flex flex-col items-center rounded-lg bg-white p-6 text-center shadow-sm transition-all hover:shadow-md"
                >
                  <div className="flex h-16 w-16 items-center justify-center rounded-full bg-[#a9dae6]">
                    <Image src={item.icon || "/placeholder.svg"} alt={item.title} width={32} height={32} />
                  </div>
                  <h3 className="mt-4 text-xl font-semibold text-gray-900">{item.title}</h3>
                  <p className="mt-2 text-gray-600">{item.description}</p>
                </div>
              ))}
            </div>
          </div>
        </section>

        {/* Training Offerings Section */}
        <section id="szkolenia" className="py-20">
          <div className="container">
            <h2 className="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
              Nasza oferta szkoleniowa
            </h2>

            <Tabs defaultValue="companies" className="mt-12">
              <div className="flex justify-center">
                <TabsList className="grid w-full max-w-md grid-cols-2">
                  <TabsTrigger value="companies">Dla firm</TabsTrigger>
                  <TabsTrigger value="individuals">Dla osób indywidualnych</TabsTrigger>
                </TabsList>
              </div>

              <TabsContent value="companies" className="mt-8">
                <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                  {[
                    {
                      title: "Excel dla biznesu",
                      description: "Szkolenia dostosowane do potrzeb zespołów analitycznych i finansowych",
                      levels: ["Podstawowy", "Średniozaawansowany", "Zaawansowany"],
                      icon: "/icons/excel.png",
                    },
                    {
                      title: "Power BI dla organizacji",
                      description: "Tworzenie dashboardów i raportów na potrzeby całej firmy",
                      levels: ["Podstawowy", "Zaawansowany"],
                      icon: "/icons/powerbi.png",
                    },
                    {
                      title: "Storytelling danych w biznesie",
                      description: "Efektywna komunikacja danych w prezentacjach i raportach",
                      levels: ["Warsztat praktyczny"],
                      icon: "/icons/storytelling.png",
                    },
                    {
                      title: "AI w procesach biznesowych",
                      description: "Wykorzystanie AI do optymalizacji procesów analitycznych",
                      levels: ["Wprowadzenie", "Implementacja"],
                      icon: "/icons/ai.png",
                    },
                  ].map((item, index) => (
                    <Card key={index} className="border-[#a9dae6]">
                      <CardHeader>
                        <div className="flex items-center gap-3">
                          <Image src={item.icon || "/placeholder.svg"} alt={item.title} width={24} height={24} />
                          <CardTitle>{item.title}</CardTitle>
                        </div>
                        <CardDescription className="mt-2">{item.description}</CardDescription>
                      </CardHeader>
                      <CardContent>
                        <p className="text-sm font-medium text-gray-700">Dostępne poziomy:</p>
                        <ul className="mt-2 space-y-1">
                          {item.levels.map((level, i) => (
                            <li key={i} className="flex items-center text-sm text-gray-600">
                              <div className="mr-2 h-1.5 w-1.5 rounded-full bg-[#36698d]"></div>
                              {level}
                            </li>
                          ))}
                        </ul>
                      </CardContent>
                    </Card>
                  ))}
                </div>
              </TabsContent>

              <TabsContent value="individuals" className="mt-8">
                <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                  {[
                    {
                      title: "Excel od podstaw",
                      description: "Indywidualne szkolenia dopasowane do Twoich potrzeb zawodowych",
                      levels: ["Podstawowy", "Średniozaawansowany", "Zaawansowany"],
                      icon: "/icons/excel.png",
                    },
                    {
                      title: "Power BI dla analityków",
                      description: "Nauka tworzenia profesjonalnych wizualizacji i raportów",
                      levels: ["Podstawowy", "Zaawansowany"],
                      icon: "/icons/powerbi.png",
                    },
                    {
                      title: "Storytelling z danymi",
                      description: "Jak przekształcić dane w przekonujące historie",
                      levels: ["Warsztat praktyczny"],
                      icon: "/icons/storytelling.png",
                    },
                    {
                      title: "AI dla analityków",
                      description: "Wykorzystanie AI w codziennej pracy z danymi",
                      levels: ["Wprowadzenie", "Praktyczne zastosowania"],
                      icon: "/icons/ai.png",
                    },
                  ].map((item, index) => (
                    <Card key={index} className="border-[#a9dae6]">
                      <CardHeader>
                        <div className="flex items-center gap-3">
                          <Image src={item.icon || "/placeholder.svg"} alt={item.title} width={24} height={24} />
                          <CardTitle>{item.title}</CardTitle>
                        </div>
                        <CardDescription className="mt-2">{item.description}</CardDescription>
                      </CardHeader>
                      <CardContent>
                        <p className="text-sm font-medium text-gray-700">Dostępne poziomy:</p>
                        <ul className="mt-2 space-y-1">
                          {item.levels.map((level, i) => (
                            <li key={i} className="flex items-center text-sm text-gray-600">
                              <div className="mr-2 h-1.5 w-1.5 rounded-full bg-[#36698d]"></div>
                              {level}
                            </li>
                          ))}
                        </ul>
                      </CardContent>
                    </Card>
                  ))}
                </div>
              </TabsContent>
            </Tabs>

            <div className="mt-12 flex justify-center">
              <Button size="lg" className="bg-[#36698d] hover:bg-[#1e8092]">
                Sprawdź harmonogram szkoleń
                <ArrowRight className="ml-2 h-4 w-4" />
              </Button>
            </div>
          </div>
        </section>

        {/* Portfolio Section */}
        <section className="bg-gray-50 py-20">
          <div className="container">
            <h2 className="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
              Przykłady naszych realizacji
            </h2>
            <p className="mx-auto mt-4 max-w-2xl text-center text-gray-600">
              Zobacz przykładowe dashboardy i wizualizacje danych, które nasi kursanci tworzą podczas szkoleń
            </p>

            <div className="mt-12">
              <PortfolioGallery />
            </div>
          </div>
        </section>

        {/* Testimonials Section */}
        <section className="py-20">
          <div className="container">
            <h2 className="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
              Co mówią o nas uczestnicy szkoleń
            </h2>

            <div className="mt-12">
              <TestimonialsCarousel />
            </div>
          </div>
        </section>

        {/* Contact Section */}
        <section id="kontakt" className="bg-[#36698d] py-20 text-white">
          <div className="container">
            <div className="grid grid-cols-1 gap-12 lg:grid-cols-2">
              <div>
                <h2 className="text-3xl font-bold tracking-tight sm:text-4xl">Skontaktuj się z nami</h2>
                <p className="mt-4 text-[#a9dae6]">
                  Masz pytania dotyczące naszych szkoleń? Chcesz dowiedzieć się więcej o ofercie dla firm? Wypełnij
                  formularz, a nasz zespół skontaktuje się z Tobą najszybciej jak to możliwe.
                </p>

                <div className="mt-8 space-y-6">
                  <div className="flex items-center gap-3">
                    <div className="flex h-10 w-10 items-center justify-center rounded-full bg-[#36698d]">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth={1.5}
                        stroke="currentColor"
                        className="h-5 w-5"
                      >
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                        />
                      </svg>
                    </div>
                    <div>
                      <p className="font-medium">Email</p>
                      <p className="text-[#a9dae6]">kontakt@numerika.pl</p>
                    </div>
                  </div>

                  <div className="flex items-center gap-3">
                    <div className="flex h-10 w-10 items-center justify-center rounded-full bg-[#36698d]">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth={1.5}
                        stroke="currentColor"
                        className="h-5 w-5"
                      >
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"
                        />
                      </svg>
                    </div>
                    <div>
                      <p className="font-medium">Telefon</p>
                      <p className="text-[#a9dae6]">+48 123 456 789</p>
                    </div>
                  </div>

                  <div className="flex items-center gap-3">
                    <div className="flex h-10 w-10 items-center justify-center rounded-full bg-[#36698d]">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        strokeWidth={1.5}
                        stroke="currentColor"
                        className="h-5 w-5"
                      >
                        <path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path
                          strokeLinecap="round"
                          strokeLinejoin="round"
                          d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                        />
                      </svg>
                    </div>
                    <div>
                      <p className="font-medium">Adres</p>
                      <p className="text-[#a9dae6]">ul. Analityczna 42, 00-000 Warszawa</p>
                    </div>
                  </div>
                </div>
              </div>

              <div className="rounded-lg bg-white p-8 shadow-lg">
                <ContactForm />
              </div>
            </div>
          </div>
        </section>
      </main>

      {/* Footer */}
      <footer className="border-t bg-gray-50 py-12">
        <div className="container">
          <div className="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
            <div>
              <div className="flex items-center gap-2">
                <Image src="/logo.svg" alt="Numerika Logo" width={32} height={32} className="h-8 w-auto" />
                <span className="text-lg font-bold text-[#36698d]">NUMERIKA</span>
              </div>
              <p className="mt-4 text-sm text-gray-600">
                Profesjonalne szkolenia z Excela, Power BI, storytellingu danych i AI dla firm i osób indywidualnych.
              </p>

              <div className="mt-6 flex space-x-4">
                <a href="#" className="text-gray-500 hover:text-[#36698d]">
                  <span className="sr-only">Facebook</span>
                  <svg className="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                      fillRule="evenodd"
                      d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                      clipRule="evenodd"
                    />
                  </svg>
                </a>
                <a href="#" className="text-gray-500 hover:text-[#36698d]">
                  <span className="sr-only">LinkedIn</span>
                  <svg className="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                  </svg>
                </a>
                <a href="#" className="text-gray-500 hover:text-[#36698d]">
                  <span className="sr-only">Twitter</span>
                  <svg className="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                  </svg>
                </a>
                <a href="#" className="text-gray-500 hover:text-[#36698d]">
                  <span className="sr-only">YouTube</span>
                  <svg className="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                      fillRule="evenodd"
                      d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z"
                      clipRule="evenodd"
                    />
                  </svg>
                </a>
              </div>
            </div>

            <div>
              <h3 className="text-sm font-semibold uppercase tracking-wider text-gray-900">Nawigacja</h3>
              <ul className="mt-4 space-y-2">
                <li>
                  <Link href="/" className="text-sm text-gray-600 hover:text-[#36698d]">
                    Strona główna
                  </Link>
                </li>
                <li>
                  <Link href="#oferta" className="text-sm text-gray-600 hover:text-[#36698d]">
                    Oferta
                  </Link>
                </li>
                <li>
                  <Link href="#szkolenia" className="text-sm text-gray-600 hover:text-[#36698d]">
                    Szkolenia
                  </Link>
                </li>
                <li>
                  <Link href="#o-nas" className="text-sm text-gray-600 hover:text-[#36698d]">
                    O nas
                  </Link>
                </li>
                <li>
                  <Link href="#blog" className="text-sm text-gray-600 hover:text-[#36698d]">
                    Blog
                  </Link>
                </li>
                <li>
                  <Link href="#kontakt" className="text-sm text-gray-600 hover:text-[#36698d]">
                    Kontakt
                  </Link>
                </li>
              </ul>
            </div>

            <div>
              <h3 className="text-sm font-semibold uppercase tracking-wider text-gray-900">Szkolenia</h3>
              <ul className="mt-4 space-y-2">
                <li>
                  <Link href="#" className="text-sm text-gray-600 hover:text-[#36698d]">
                    Excel
                  </Link>
                </li>
                <li>
                  <Link href="#" className="text-sm text-gray-600 hover:text-[#36698d]">
                    Power BI
                  </Link>
                </li>
                <li>
                  <Link href="#" className="text-sm text-gray-600 hover:text-[#36698d]">
                    Storytelling danych
                  </Link>
                </li>
                <li>
                  <Link href="#" className="text-sm text-gray-600 hover:text-[#36698d]">
                    AI w analityce
                  </Link>
                </li>
                <li>
                  <Link href="#" className="text-sm text-gray-600 hover:text-[#36698d]">
                    Harmonogram szkoleń
                  </Link>
                </li>
              </ul>
            </div>

            <div>
              <h3 className="text-sm font-semibold uppercase tracking-wider text-gray-900">Newsletter</h3>
              <p className="mt-4 text-sm text-gray-600">
                Zapisz się, aby otrzymywać najnowsze informacje o szkoleniach i materiały edukacyjne.
              </p>
              <form className="mt-4">
                <div className="flex max-w-md flex-col gap-2 sm:flex-row">
                  <input
                    type="email"
                    placeholder="Twój adres email"
                    className="rounded-md border border-gray-300 px-4 py-2 text-sm focus:border-[#36698d] focus:outline-none focus:ring-1 focus:ring-[#36698d]"
                    required
                  />
                  <Button type="submit" className="bg-[#36698d] hover:bg-[#1e8092]">
                    Zapisz się
                  </Button>
                </div>
              </form>

              <div className="mt-6 text-xs text-gray-500">
                <p>&copy; {new Date().getFullYear()} NUMERIKA. Wszelkie prawa zastrzeżone.</p>
                <div className="mt-2 flex space-x-4">
                  <Link href="#" className="hover:text-[#36698d]">
                    Polityka prywatności
                  </Link>
                  <Link href="#" className="hover:text-[#36698d]">
                    Warunki korzystania
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  )
}
