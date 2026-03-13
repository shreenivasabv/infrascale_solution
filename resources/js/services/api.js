import axios from "axios"

const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL
})

export const getCompany = () => api.get("/company")

export const getTeam = () => api.get("/team")

export const getServices = (category) =>
  api.get(`/services/${category}`)

export const getServiceDetail = (slug) =>
  api.get(`/service/${slug}`)