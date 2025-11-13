import axios from "axios";

window.axios = axios;
window.axios.defaults.baseURL = window.location.origin; // pakai protokol halaman
window.axios.defaults.withCredentials = true; // kalau pakai session cookies
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
