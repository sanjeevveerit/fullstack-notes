// central helper file to load base url and token in headers
//  so that it won't to call headers in every page
// similar to config/config.php in ci

import axios from 'axios';

const apiClient = axios.create({
    //baseURL: 'http://127.0.0.1:8000/api',
      baseURL: import.meta.env.VITE_API_BASE_URL,
        withCredentials: true,
        headers: {
            Accept: 'application/json',
        },
});

// Add a request interceptor to include the token in headers
//Intercepter is equal to middleware in  laravel but in frontend
apiClient.interceptors.request.use(config => {
    const token = localStorage.getItem('token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
})

export default apiClient;
