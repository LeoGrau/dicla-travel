import type { CategoryModel } from "./categories.model.interface"

export interface TourModel {
  id: number,
  title: string,
  description: string,
  slug: string
  summary: string,
  duration_hours: string
  price_usd: number,
  price_pen: number,
  created_at: string,
  updated_at: string,
  url_image: string
  status: 'active' | 'inactive',
  ranking: number,
  categories: CategoryModel[],
  city: {id: number, name: string}
}
