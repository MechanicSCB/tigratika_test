import {reactive, ref} from "vue";
import {router} from "@inertiajs/vue3";

export let locale = ref('ru');

export let locales = reactive({'ru': 'Русский', 'en': 'English', 'cn': '中国人', 'th': 'ภาษาไทย'});

export let setQueryArgsToFilterForm = (form) => {
    // request_all added to HandleInertiaRequests.php
    let fields = router.page.props.ziggy.request_all;

    for(let [field, val] of Object.entries(fields)){
        form[field] = val;
    }
};
