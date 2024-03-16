// CSS
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import 'tippy.js/dist/tippy.css';

// JS
import "./bootstrap";
import "preline";

// Library
import { createApp, defineAsyncComponent } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";
import VueTippy from 'vue-tippy';

// Components
import { Icon } from '@iconify/vue';
// ...

const el = document.getElementById("app");

createApp({render: renderSpladeApp({ el })})
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": {
            delay: 250,
            color: "#000000",
            css: true,
            spinner: true,
        }, 
        "view_transitions": true
    })
    .use(VueTippy, {
        directive: 'tippy',
        component: 'tippy',
        componentSingleton: 'tippy-singleton',
        defaultProps: {
            placement: 'top',
            allowHTML: true,
        },
    })
    .component('Icon', Icon)
    .component('Clock', defineAsyncComponent(() => import("./Components/Clock.vue"))) 
    .mount(el);