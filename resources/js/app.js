
import './bootstrap';
import './alertas';
import './custom';
import { createApp } from 'vue';
import { Bar } from 'vue-chartjs'

import 'https://kit.fontawesome.com/c68c2b230c.js';
import 'https://code.jquery.com/jquery-3.7.0.js';
import 'https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js';
import 'https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js';

import 'https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js';
import 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js';
import pdfMake from "https://esm.sh/pdfmake";
import 'https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js';
import 'https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js';


pdfMake.fonts = {
    Roboto: {
      normal: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Regular.ttf',
      bold: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Medium.ttf',
      italics: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Italic.ttf',
      bolditalics: 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-MediumItalic.ttf'
    },
  }

import mitt from 'mitt';
const emitter = mitt();

const app = createApp({});

app.config.globalProperties.emitter = emitter;

// import NegocioComponent from './components/NegocioComponent.vue';
// app.component('negocio-component', NegocioComponent);

import UserTable from './components/UserTable.vue';
app.component('user-table', UserTable);

import GraficoComponent from './components/GraficoComponent.vue';
app.component('grafico-component', GraficoComponent);

import DispTable from './components/DispTable.vue';
app.component('disp-table', DispTable);

import DispComponent from './components/DispComponent.vue';
app.component('disp-component', DispComponent);

import EstadisticaComponent from './components/EstadisticaComponent.vue';
app.component('estadistica-component', EstadisticaComponent);

import menuLater from './components/menuLater.vue';
app.component('menu-later', menuLater);

import EmployeeTable from './components/EmployeeTable.vue';
app.component('employee-table', EmployeeTable);

// import ChatClientComponent from './components/ChatClientComponent.vue';
// app.component('chat-client', ChatClientComponent);

// import prueba from './components/prueba.vue';
// app.component('prueba-component', prueba);

app.mount('#app');


