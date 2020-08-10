import Vue from "vue";
import Axios from "axios";

import EntriesManager from "./components/entries/manager.vue";
import EntriesEdit from "./components/entries/edit.vue";
import EntriesCreate from "./components/entries/create.vue";

//config
Axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.addEventListener('load', function () {
    Vue.component("entries-manager", EntriesManager);
    Vue.component("entries-edit", EntriesEdit);
    Vue.component("entries-create", EntriesCreate);

    document.querySelectorAll(".app-vue").forEach( e => new Vue({el: e}) );

    if(document.querySelector(".pending-container")) {
        document.querySelector(".pending-container").classList.add("_hide");
    }
});
