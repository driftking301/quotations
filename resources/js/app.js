import './bootstrap';
import $ from 'jquery';
window.jQuery = window.$ = $;

import "../../node_modules/select2/dist/css/select2.css";
import select2 from 'select2';
select2();


import '../css/app.css';

$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Select...",
        allowClear: true,
    });

});

$(document).ready(function() {
    $(function () {
        // $('[data-toggle="tooltip"]').tooltip();
    });
});

window.$(document).ready(function() {
    $('#quotation-details-form input, #quotation-details-form select').change(quotation_update_price);
});
