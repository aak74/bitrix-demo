var app = (function() {
    var _selector = '.content-wrapper ';

    var showResult = function(html) {
        console.log('html', html)
        $result = $(_selector + '#result');
        $result.find('.modal-body').html(html);
        // $result.show();
        $('#result').modal();
    }

    var getResult = function(name) {
        _gb.showShadow();
        _gb.showMessage('Отправлен запрос на обработку.', 'info');

        $.get('/ajax/getResult.php', {name: name})
            .done(function(response) {

                if ( result = _gb.parseJSON(response) ) {
                    console.log('result', result.result);
                    switch(result.status) {
                        case 'error':
                            _gb.showMessageRegularError();
                            break;
                        case 'ok':
                            _gb.hideMessage();
                            showResult(result.html);
                            break;
                        default:
                            _gb.showMessageUnknownError();
                    }
                }
            })
            .fail(function(err) {
                // console.log(err);
                _gb.showMessageFail(err, 'danger', 5000);
            })
            .always(_gb.hideShadow)
    }

    var getSQL = function(name) {
        _gb.showShadow();
        _gb.showMessage('Отправлен запрос на обработку.', 'info');

        $.get('/ajax/getSQL.php', {name: name})
            .done(function(response) {

                if ( result = _gb.parseJSON(response) ) {
                    console.log('result', result.result);
                    switch(result.status) {
                        case 'error':
                            _gb.showMessageRegularError();
                            break;
                        case 'ok':
                            _gb.hideMessage();
                            showResult(result.html);
                            break;
                        default:
                            _gb.showMessageUnknownError();
                    }
                }
            })
            .fail(function(err) {
                // console.log(err);
                _gb.showMessageFail(err, 'danger', 5000);
            })
            .always(_gb.hideShadow)
    }

    this.setListeners = function(e) {
        // console.log('setListeners', e, this);
        $(_selector + 'a.show-result').on('click', function() {
            getResult(this.dataset.name);
        });
        $(_selector + 'a.show-sql').on('click', function() {
            getSQL(this.dataset.name);
        });
    };

    return {
        init: function(e) {
            console.log('init', e, this);
            setListeners.call(this);
        }
    }
})();

$(document).ready(function() { app.init.call(app)} );