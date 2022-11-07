import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons';
import { createApp } from "vue";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

library.add(fab, far, fas);

const el = document.getElementById("app");

createApp({
        render: renderSpladeApp({ el })
    })
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": {
            delay: 250,
            color: "#4B5563",
            css: true,
            spinner: true,
        }
    })
    .component('font-awesome-icon', FontAwesomeIcon)
    .mount(el);