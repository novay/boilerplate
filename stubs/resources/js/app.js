// CSS
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";

// JS
import "./bootstrap";
import "preline";
import "./dark";

// Library
import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

// Components
import { Icon } from '@iconify/vue';
// ...

const el = document.getElementById("app");

createApp({render: renderSpladeApp({ el })})
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": true, 
        "view_transitions": true
    })
    .component('Icon', Icon)
    .mount(el);