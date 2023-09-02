import axios from "axios";

const api = axios.create({ baseURL: "https://api.krisfit9.com" });

export { api }
