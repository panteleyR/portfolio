export default function ({ app, $axios }, inject) {
  $axios.interceptors.request.use((config) => {
    if (process.server) {
      config.baseURL = 'http://web/api'
    } else {
      config.baseURL = '/api'
    }

    return config
  })
}
