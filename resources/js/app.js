import { createApp, h } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";

createInertiaApp({
    resolve: (name) => {
        let pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        pages.default.layout == pages.default.layout;
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("Link", Link)
            .component("Head", Head)
            .mount(el);
    },
    progress: {
        color: "red",
        includeCSS: true,
    },
});
