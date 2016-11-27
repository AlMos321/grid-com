(function(){
    var userOnLoadCallback = window.jivo_onLoadCallback;
    var ourOnLoadCallback = function() {
        jivo_api.setCustomData([
            {
                content : 'Roistat: '+roistatGetCookie('roistat_visit')
            }
        ]);

        if (jivo_config.chat_mode === 'offline') {
            console.log('operator is offline');
            var iframeJivoSiteIntegration = function() {
                var iframeWindowElement = document.getElementById('jivo_container').contentDocument;
                var offlineForm         = iframeWindowElement.getElementById('offline-form');

                if (offlineForm) {
                    var fieldElements = [],
                        fieldAttr     = [],
                        fieldValue    = [],
                        fieldError    = false,
                        fields = [
                            'name',
                            'email',
                            'phone',
                            'message'
                        ];
                    for (var i=0; fields.length > i; i++) {
                        fieldElements[fields[i]] = iframeWindowElement.getElementById(fields[i]);
                        if (fieldElements[fields[i]]) {
                            fieldAttr[fields[i]] = fieldElements[fields[i]].getAttribute('placeholder');
                            fieldValue[fields[i]] = fieldElements[fields[i]].value;
                            if (fields[i]==='message') {
                                fieldAttr[fields[i]] = 'message*';
                                console.log('Field of message is required');
                            }
                            if (fieldValue[fields[i]].length === 0 && (fieldAttr[fields[i]].indexOf('*') + 1)) {
                                fieldError = true;
                                console.log('Required field "'+fields[i]+'" - empty');
                            }
                        } else {
                            fieldError = true;
                            console.log('Fields not found');
                        }
                    }
                    if (fieldError === false) {
                        window.parent.roistatGoal.reach({leadName: "JivoSite Lead", name: fieldValue['name'], phone: fieldValue['phone'], email: fieldValue['email'], text: fieldValue['message']});
                    }
                }
            };

            var keyCodeRoistatSender = function(e) {
                e = e || event;
                if (e.keyCode === 13) {
                    iframeJivoSiteIntegration();
                }
            };

            var setIntervalElem = setInterval(function() {
                var iframeElement = document.getElementById('jivo_container');
                if (iframeElement) {
                    var iframeWindowElement = iframeElement.contentDocument;
                    var submitButton = iframeWindowElement.getElementById('submit');
                    if (submitButton) {
                        submitButton.onclick = (function(){ iframeJivoSiteIntegration(); });
                    }
                    iframeWindowElement.onkeyup = keyCodeRoistatSender;
                    clearInterval(setIntervalElem);
                }
            }, 3000);
        } else {
            console.log('Operator is online');
        }
    };

    var userOnIntroduction = window.jivo_onIntroduction;
    var ourOnIntroduction = function() {
        var contactInfo = jivo_api.getContactInfo();
        var clientName = contactInfo.name;
        if (clientName === undefined) {
            clientName = contactInfo.client_name;
        }
        window.roistatGoal.reach({leadName: "JivoSite Lead", name: clientName, phone: contactInfo.phone, email: contactInfo.email, text: ''});
    };

    window.jivo_onLoadCallback = function() {
        if (userOnLoadCallback) {
            userOnLoadCallback();
        }
        ourOnLoadCallback();
    };

    window.jivo_onIntroduction = function () {
        if (userOnIntroduction) {
            userOnIntroduction();
        }
        ourOnIntroduction();
    };
})();