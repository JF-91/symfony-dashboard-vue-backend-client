import './bootstrap.js';
import './styles/app.scss';
import { registerVueControllerComponents } from '@symfony/ux-vue';
import { createApp } from 'vue';
import DashboardApp from "./views/DashboardApp.vue";
import router from './router/index.js';
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives,
  })

registerVueControllerComponents(require.context('./vue/controllers', true, /\.vue$/));

createApp(DashboardApp)
    .use(router)
    .use(vuetify)
    .mount('#app');
