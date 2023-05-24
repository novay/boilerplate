// CSS
import "../css/app.css";
import "primevue/resources/themes/lara-light-indigo/theme.css";
import "primevue/resources/primevue.min.css";
import "@protonemedia/laravel-splade/dist/style.css";

// JS
import "./bootstrap";
import "preline";
import "./dark";

// Library
import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";
import PrimeVue from 'primevue/config';

// Components
import { Icon } from '@iconify/vue';
import Button from "primevue/button"
// ...

const el = document.getElementById("app");

createApp({render: renderSpladeApp({ el })})
    .use(PrimeVue, { ripple: true })
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": true
    })
    .component('Icon', Icon)
    .component('Button', Button)
    .mount(el);