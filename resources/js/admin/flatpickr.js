const flatpickr = require("flatpickr");
const Turkish = require("flatpickr/dist/l10n/tr.js").default.tr;

$(function () {

    $('.flatpickr').each(function (index, element) {

        var clickOpens = true;

        if (typeof $(element).data('readonly') != typeof undefined && $(element).data('readonly') === true) {
            clickOpens = false;
        }

        flatpickr(element, {
            locale: Turkish,
            dateFormat: "Y-m-d",
            altInput: true,
            altFormat: "d.m.Y",
            clickOpens: clickOpens,
        });
        
    });

});