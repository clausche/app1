
window._ = require('lodash');


try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}
import SweetAlert from 'sweetalert2';


import select2 from 'select2';
import swal from 'sweetalert2'
window.select2 = select2;
window.axios = require('axios');
window.swal = swal;

// window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
