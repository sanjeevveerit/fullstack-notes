import './bootstrap';

import { createApp } from 'vue'  //start vue app
import App from './App.vue'   //import root component
import router from './router'

createApp(App)
  .use(router)      // enable page routing
  .mount('#app')     // mount the app to div with id app in index.html
