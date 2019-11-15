jQuery(document).ready(function ($) {
    console.log($('.components-panel__row').length);
    if ($('.components-panel__row').length) {
        $('.components-panel__row')[4].hide();
    }
    if ($('.components-panel__body').length) {
        $('.components-panel__body')[2].hide();
        $('.components-panel__body')[4].hide();
        $('.components-panel__body')[5].hide();
    }
});