var KTBootstrapSwitch = {
    init: function() {
        $("[data-switch=true]").bootstrapSwitch();
    }
};
jQuery(document).ready(function() {
    KTBootstrapSwitch.init();
});
