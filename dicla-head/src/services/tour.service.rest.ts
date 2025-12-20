
import { httpCommon } from "@/server/rest-common"
import { type TourModel } from "@/types/models/tour.model.interface"
import { type BasePagedResponse } from "@/types/responses/base-paged.response.interface"
import { type AxiosResponse } from "axios"

export interface TourPageQuery {
  page_size?: number,
  page_index?: number
  ranking?: number
  min_prince?:number,
  from_date?: string,
  to_date?:string
  min_duration?:number
  max_duration?:number
  categories?:string
  cities?:string
}

class TourService {
  getToursPageQuery(query: TourPageQuery) : Promise<AxiosResponse<BasePagedResponse<TourModel>>> {
    return httpCommon.get('tours/query/page', {
      params: query
    })
  }

}

export default new TourService();
