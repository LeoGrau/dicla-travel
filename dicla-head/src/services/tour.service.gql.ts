import { gql } from '@apollo/client'
import { apollo } from '@/server/graphql-common'

class TourService {
  async getTopTours() {
    const GET_TOURS = gql`
      query {
        tours {
          id
          title
          price_usd
          description
          ranking
          url_image
          city_name
        }
      }
    `
    const { data }: { data: any } = await apollo.query({
      query: GET_TOURS,
    })
    return data.tours
  }
}

export default new TourService()
