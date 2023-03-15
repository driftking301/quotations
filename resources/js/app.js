// resources/js/app.js
import './bootstrap';
import $ from 'jquery';
window.jQuery = window.$ = $;

import 'select2/dist/css/select2.min.css';
import Select2 from 'select2';

import '../css/app.css';

$(document).ready(function () {
    $('.select2').select2({
        placeholder: "Select...",
        allowClear: true
    });
});
