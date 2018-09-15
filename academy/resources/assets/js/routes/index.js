import Vue from 'vue'
import Router from 'vue-router'
import VueAxios from 'vue-axios';//gọi thư viện axios
import axios from 'axios';
import VueResource from 'vue-resource';
import VeeValidate from 'vee-validate';
import BootstrapVue from 'bootstrap-vue';
import VueAlert from '@vuejs-pt/vue-alert'

Vue.use(BootstrapVue);
Vue.use(VueAxios,axios);
Vue.use(VeeValidate);


// component con
import Home from '../components/Home';
import Contact from '../components/Contact';
import Tintuc from '../components/Blog';
import Khoahoc from '../components/Couseslist';
import Coursessg from '../components/views/CategoryView';
import Team from '../components/Team';
import Blogsingle from '../components/Blogsingle';
import Goctv from '../components/Goctv';
import Listgtv from '../components/Listgtv';
import Listtintuc from '../components/Listtintuc';
import Listkhoahoc from '../components/Listkhoahoc';
import Check from '../components/check';
import Sidebar_t from '../components/Sidebartintuc';
import Sidebar_c from '../components/Sidebarc';
// import Slide from '../components/slide';
//page view
import lien_he from '../components/page/Lien_he';
import khoa_hoc from '../components/page/Khoa_hoc';
import goc_tu_van from '../components/page/Goc_tu_van';
import tin_tuc from '../components/page/Tin-tuc';
import khoa_hoc_chi_tiet from'../components/page/khoa_hoc_chi_tiet';
import Giao_vien from '../components/page/Giao_vien';
import danh_sach_tin_tuc from '../components/page/danh_sach_tin_tuc';
import danh_sach_khoa_hoc from '../components/page/danh_sach_khoa_hoc';
import danh_sach_goc_tu_van from '../components/page/danh_sach_goc_tu_van';
import tin_chi_tiet from '../components/page/tin_chi_tiet';
import trang_chu from '../components/page/trang_chu';


Vue.component('Sidebarn', Sidebar_t);
Vue.component('Sidebarc',Sidebar_c);
Vue.component('Contact',Contact);
Vue.component('Khoa-hoc',Khoahoc);
Vue.component('goc-tu-van',Goctv);
Vue.component('tin-tuc',Tintuc);
Vue.component('khoa-hoc-chi-tiet',Coursessg);
Vue.component('danh-sach-giao-vien',Team);
Vue.component('List-tin-tuc',Listtintuc);
Vue.component('List-khoa-hoc',Listkhoahoc);
Vue.component('List-gtv',Listgtv);
Vue.component('tin-chi-tiet',Blogsingle);
Vue.component('home',Home);






//page chinh du an 




Vue.use(Router)

export default new Router({
    routes: [
		{ path: '/lien-he', name: 'lien-he', component: lien_he },
		{ path: '/khoa-hoc', name: 'Khoa_hoc', component: khoa_hoc },
		{ path: '/khoa-hoc-chi-tiet/:khoahocId', name: 'Category', component: khoa_hoc_chi_tiet },
		{ path: '/', name: 'Home', component: trang_chu },
		{ path: '/danh-sach-giao-vien', name: 'Team', component: Giao_vien },
		{ path: '/tin-chi-tiet/:tintucId', name: 'Blogsingle', component: tin_chi_tiet },
		{ path: '/goc-tu-van', name: 'goc_tu_van', component: goc_tu_van },
		{ path: '/goc-tu-van/:ListgtvId', name: 'Listgtv', component: danh_sach_goc_tu_van },
		{ path: '/tin-tuc', name: 'Tintuc', component: tin_tuc },
		{ path: '/tin-tuc/page=:tintucId', name: 'pageTintuc', component: tin_tuc },
		{ path: '/tin-tuc/:ListtintucId', name: 'Listtintuc', component: danh_sach_tin_tuc  },
		{ path: '/khoa-hoc/:Listkhoahoc', name: 'Listkhoahoc', component: danh_sach_khoa_hoc  },
    ],
    mode: 'history'  //xoa duong dan # trong lrv
})