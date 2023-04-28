$.extend(true, $.fn.dataTable.defaults, {
    serverSide: true,
    processing: false,
    searchDelay: 500,
    columnDefs: [
        {
           targets: '_all',
           defaultContent: '-'
        }
    ],
    language: {
        decimal: ",",
        emptyTable: "Tabloda herhangi bir veri mevcut değil",
        info:
            "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
        infoEmpty: "Kayıt yok",
        infoFiltered: "(_MAX_ kayıt içerisinden bulunan)",
        infoPostFix: "",
        thousands: ".",
        lengthMenu: "Sayfada _MENU_ kayıt göster",
        loadingRecords: "Yükleniyor...",
        processing: "İşleniyor...",
        search: "Ara:",
        zeroRecords: "Eşleşen kayıt bulunamadı",
        paginate: {
            first: "İlk",
            last: "Son",
            next: '<i class="la la-angle-right"></i>',
            previous: '<i class="la la-angle-left"></i>'
        },
        aria: {
            sortAscending: ": artan sütun sıralamasını aktifleştir",
            sortDescending: ": azalan sütun sıralamasını aktifleştir"
        }
    }
});

$.fn.dataTable.render.code = function() {
    return function(data, type, row) {
        if (data != '') {
            return `<code>${data}</code`;
        }

        return '';
    };
};

$.fn.dataTable.render.object = function() {
    return function(data, type, row) {
        var colors = [
            'danger', 'primary', 'success', 'warning', 'dark'
        ];

        var html = '<ul class="list-unstyled mb-0">';

        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                const element = data[key];

                html += `<li>${element.name}</li>`
            }
        }

        return html + '</ul>';
    };
};

$.fn.dataTable.render.phone = function() {
    return function(data, type, row, meta) {

        var str = String(data).replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2 $3');

        return `<span class="text-nowrap">${str}</span>`;
    };
};

$.fn.dataTable.render.iban = function() {
    return function(data, type, row, meta) {

        var str = String(data).replace(/(\w{4})(\d{4})(\d{4})(\d{4})(\d{4})(\d{4})(\d{2})/, '$1 $2 $3 $4 $5 $6 $7');

        return `<span class="text-nowrap">${str}</span>`;
    };
};

$.fn.dataTable.render.boolean = function() {
    return function(data, type, row) {
        var color = 'text-danger';

        if (parseInt(data) == 1) {
            color = 'text-success';
        }

        return `<i class="fa fa-circle ${color}"></i>`;
    };
};

$.fn.dataTable.render.dateTime = function() {
    return function(data, type, row) {
        if (moment(data).isValid()) {
            return moment(data).format("L LT");
        }

        return '';
    };
};

$.fn.dataTable.render.date = function() {
    return function(data, type, row) {
        if (moment(data).isValid()) {
            return moment(data).format("L");
        }

        return '';
    };
};

$.fn.dataTable.render.time = function() {
    return function(data, type, row) {
        if (moment(data).isValid()) {
            return moment(data).format("LT");
        }

        return '';
    };
};

$.fn.dataTable.render.action = function(data, type, row, url, args, custom) {
    if(!url.startsWith("/") && !url.startsWith("http")){
        url = '/' + url;
    }
    if (custom === undefined) {
        custom = [];
    }

    if (args === undefined) {
        args = {};
    }

    if (args.view === undefined) {
        args.view = false;
    }

    if (args.edit === undefined) {
        args.edit = true;
    }

    if (args.delete === undefined) {
        args.delete = true;
    }

    if (args.custom === undefined) {
        args.custom = false;
    }

    var html = `<div class="dropdown">
                    <a
                        href="javascript:;"
                        class="btn btn-sm btn-clean btn-icon btn-icon-md"
                        data-toggle="dropdown">
                        <i class="flaticon-more-1"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="kt-nav">`;
                        if (args.view) {
                            html += `
                            <li class="kt-nav__item">
                                <a href="${url}/${data}" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-expand"></i>
                                    <span class="kt-nav__link-text">Göster</span>
                                </a>
                            </li>`;
                        }
                        if (args.edit) {
                            html += `
                            <li class="kt-nav__item">
                                <a href="${url}/${data}/edit" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-contract"></i>
                                    <span class="kt-nav__link-text">Düzenle</span>
                                </a>
                            </li>`;
                        }
                        if (args.delete) {
                            html += `
                            <li class="kt-nav__item">
                                <a href="#" class="delete-confirm kt-nav__link" data-url="${url}/${data}">
                                    <i class="kt-nav__link-icon flaticon2-trash"></i>
                                    <span class="kt-nav__link-text">Sil</span>
                                </a>
                            </li>`;
                        }

                        if (args.custom && args.custom.length > 0) {

                            for (let index = 0; index < args.custom.length; index++) {
                                const element = args.custom[index];

                                html += `
                                <li class="kt-nav__item">
                                    <a href="${element.url}" class="kt-nav__link">
                                        <i class="kt-nav__link-icon ${element.icon}"></i>
                                        <span class="kt-nav__link-text">${element.text}</span>
                                    </a>
                                </li>`;
                            }
                        }

    html += `</ul></div></div>`;

    return html;
};

$.fn.dataTable.render.money = function(thousands, decimal, precision, prefix, postfix) {

    if (thousands === undefined) {
        thousands = ".";
    }
    if (decimal === undefined) {
        decimal = ",";
    }
    if (precision === undefined) {
        precision = 2;
    }
    if (prefix === undefined) {
        prefix = "";
    }

    return {
        display: function(d, type, row) {
            if (typeof d !== "number" && typeof d !== "string") {
                return d;
            }

            var negative = d < 0 ? "-" : "";
            var flo = parseFloat(d);

            // If NaN then there isn't much formatting that we can do - just
            // return immediately, escaping any HTML (this was supposed to
            // be a number after all)
            if (isNaN(flo)) {
                return __htmlEscapeEntities(d);
            }

            flo = flo.toFixed(precision);
            d = Math.abs(flo);

            var intPart = parseInt(d, 10);
            var floatPart = precision
                ? decimal + (d - intPart).toFixed(precision).substring(2)
                : "";


            if (typeof row.site !== 'undefined') {
                var currency = row.site.currency;
            } else {
                var currency = row.currency;
            }

            postfix = " "+currency;


            return (
                negative +
                (prefix || "") +
                intPart.toString().replace(/\B(?=(\d{3})+(?!\d))/g, thousands) +
                floatPart +
                (postfix || "")
            );
        }
    };
};
