"use client"

import { useState } from "react"
import Image from "next/image"
import { Dialog, DialogContent } from "@/components/ui/dialog"
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs"

const portfolioItems = [
  {
    id: 1,
    title: "Dashboard sprzedażowy",
    category: "excel",
    image: "/excel-sales-dashboard.png",
  },
  {
    id: 2,
    title: "Analiza finansowa",
    category: "excel",
    image: "/excel-financial-analysis-dashboard.png",
  },
  {
    id: 3,
    title: "Dashboard HR",
    category: "powerbi",
    image: "/power-bi-hr-dashboard.png",
  },
  {
    id: 4,
    title: "Analiza marketingowa",
    category: "powerbi",
    image: "/placeholder.svg?height=600&width=800&query=power bi marketing analytics dashboard",
  },
  {
    id: 5,
    title: "Prezentacja wyników finansowych",
    category: "storytelling",
    image: "/placeholder.svg?height=600&width=800&query=data storytelling financial results",
  },
  {
    id: 6,
    title: "Wizualizacja trendów rynkowych",
    category: "storytelling",
    image: "/placeholder.svg?height=600&width=800&query=market trends data visualization",
  },
  {
    id: 7,
    title: "Predykcja sprzedaży z AI",
    category: "ai",
    image: "/placeholder.svg?height=600&width=800&query=ai sales prediction dashboard",
  },
  {
    id: 8,
    title: "Automatyczna segmentacja klientów",
    category: "ai",
    image: "/placeholder.svg?height=600&width=800&query=ai customer segmentation dashboard",
  },
]

export default function PortfolioGallery() {
  const [selectedItem, setSelectedItem] = useState<(typeof portfolioItems)[0] | null>(null)
  const [activeTab, setActiveTab] = useState("all")

  const filteredItems =
    activeTab === "all" ? portfolioItems : portfolioItems.filter((item) => item.category === activeTab)

  return (
    <>
      <Tabs defaultValue="all" className="w-full" onValueChange={setActiveTab}>
        <div className="flex justify-center">
          <TabsList className="grid w-full max-w-md grid-cols-5">
            <TabsTrigger value="all">Wszystkie</TabsTrigger>
            <TabsTrigger value="excel">Excel</TabsTrigger>
            <TabsTrigger value="powerbi">Power BI</TabsTrigger>
            <TabsTrigger value="storytelling">Storytelling</TabsTrigger>
            <TabsTrigger value="ai">AI</TabsTrigger>
          </TabsList>
        </div>

        <TabsContent value={activeTab} className="mt-8">
          <div className="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            {filteredItems.map((item) => (
              <div
                key={item.id}
                className="group cursor-pointer overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm transition-all hover:shadow-md"
                onClick={() => setSelectedItem(item)}
              >
                <div className="relative h-48 w-full overflow-hidden">
                  <Image
                    src={item.image || "/placeholder.svg"}
                    alt={item.title}
                    fill
                    className="object-cover transition-transform duration-300 group-hover:scale-105"
                  />
                </div>
                <div className="p-4">
                  <h3 className="font-medium text-gray-900">{item.title}</h3>
                  <p className="text-sm text-gray-500 capitalize">
                    {item.category === "powerbi"
                      ? "Power BI"
                      : item.category === "ai"
                        ? "AI"
                        : item.category === "storytelling"
                          ? "Storytelling danych"
                          : "Excel"}
                  </p>
                </div>
              </div>
            ))}
          </div>
        </TabsContent>
      </Tabs>

      <Dialog open={!!selectedItem} onOpenChange={(open) => !open && setSelectedItem(null)}>
        <DialogContent className="max-w-3xl">
          {selectedItem && (
            <div>
              <div className="relative h-[60vh] w-full overflow-hidden rounded-lg">
                <Image
                  src={selectedItem.image || "/placeholder.svg"}
                  alt={selectedItem.title}
                  fill
                  className="object-contain"
                />
              </div>
              <div className="mt-4">
                <h2 className="text-xl font-semibold text-gray-900">{selectedItem.title}</h2>
                <p className="text-gray-500 capitalize">
                  {selectedItem.category === "powerbi"
                    ? "Power BI"
                    : selectedItem.category === "ai"
                      ? "AI"
                      : selectedItem.category === "storytelling"
                        ? "Storytelling danych"
                        : "Excel"}
                </p>
              </div>
            </div>
          )}
        </DialogContent>
      </Dialog>
    </>
  )
}
