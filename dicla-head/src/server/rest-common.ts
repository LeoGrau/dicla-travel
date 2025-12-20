import axios from "axios";

export const httpCommon = axios.create({
  baseURL: 'http://192.168.1.58/wp-json/',
  timeout: 10000,
  headers: {
    'Content-Type': 'application/json'
  }
})
