import { createApp } from 'vue';
import SearchComponent from './components/Search.vue';

const app = createApp({});
app.component('search-component', SearchComponent);
app.mount('#app');
