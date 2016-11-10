var _gb = (function() {
    var alertClass = 'gb-alert';
    var modalClass = 'gb-modal';

    // console.log('gb_util in', alertClass);
    return {

        showShadow: function() {
            $("." + modalClass).removeClass("hidden").addClass("visible");
        },

        hideShadow: function() {
            $("." + modalClass).removeClass("visible").addClass("hidden");
        },

        showMessageRegular: function() {
            this.showMessage('Отправлен запрос на обработку.', 'info');
        },

        showMessageSuccess: function(msg) {
            this.showMessage(msg, 'success', 2000);
        },

        showMessageSuccessAdd: function() {
            this.showMessage('Данные успешно добавлены', 'success', 2000);
        },

        showMessageSuccessUpdate: function() {
            this.showMessage('Данные успешно обновлены', 'success', 2000);
        },

        showMessageResultError: function() {
            this.showMessageError('<b>Ошибка при обработке результатов запроса.</b><br>Попробуйте позже.<br>При повторном появлении ошибки, пожалуйста, сообщите разработчику!');
        },

        showMessageRegularError: function() {
            this.showMessageError('<b>Ошибка при обработке запроса.</b><br>Попробуйте позже.<br>При повторном появлении ошибки, пожалуйста, сообщите разработчику!');
        },

        showMessageUnknownError: function() {
            this.showMessageError('<b>Неизвестная ошибка.</b><br>Перезагрузите страницу.<br>При повторном появлении ошибки, пожалуйста, сообщите разработчику!');
        },

        showMessageError: function(msg) {
            this.showMessage(msg, 'danger', 5000);
        },

        showMessageFail: function(err) {
            this.showMessageError('<b>' + err.statusText + ' (' + err.status + ')' + '</b><br>Перезагрузите страницу.<br>При повторном появлении ошибки, пожалуйста, сообщите разработчику!');
        },

        showMessage: function(msg, class_, hideAfter) {
            $('.' + alertClass)
                .removeClass('hidden alert-success alert-info alert-danger')
                .addClass('alert-' + class_)
                .html(msg)
                .fadeIn('slow');

            if ( +hideAfter > 0 ) {
                setTimeout(
                    this.hideMessage,
                    hideAfter
                );
            }
        },

        hideMessage: function() {
            $('.' + alertClass)
                .removeClass('alert-success alert-info alert-danger')
                .html('')
                .fadeOut('slow');
        },

        parseJSON: function(json) {
            try {
                result = JSON.parse(json);
            } catch (e) {
                _gb.showMessageResultError();
                result = false;
            }
            return result;
        },

        init: function() {
            $('<div class="' + alertClass + ' hidden" role="alert"></div>').appendTo('body');
            $('<div class="' + modalClass + ' hidden"></div>').appendTo('body');

        },
    }
})();

$(document).ready(function() { _gb.init.call(_gb)} );

// console.log('gb_util ext');