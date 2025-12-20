export interface BasePagedResponse<T> {
  items: T[],
  pagination: {
    page_index: number,
    page_size: number,
    total: number,
    total_pages: number
  }
}
