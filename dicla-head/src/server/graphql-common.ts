import { HttpLink } from '@apollo/client'
import { ApolloClient, InMemoryCache } from '@apollo/client'

export const apollo = new ApolloClient({
  link: new HttpLink({
    uri: 'http://192.168.1.58/graphql',
  }),
  cache: new InMemoryCache(),
})
