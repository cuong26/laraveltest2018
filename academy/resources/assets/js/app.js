
import router from './routes/index';

import Vue from 'vue';
import App from './components/App';



const app = new Vue({
el: '#app',
router,
render: h => h(App)
});


