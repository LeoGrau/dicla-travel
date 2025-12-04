import { HttpLink } from '@apollo/client'
import { ApolloClient, InMemoryCache } from '@apollo/client'

export const apollo = new ApolloClient({
  link: new HttpLink({
    uri: 'http://dicla-travel-wph.local/graphql',
  }),
  cache: new InMemoryCache(),
})
