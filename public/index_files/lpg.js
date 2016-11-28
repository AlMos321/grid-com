/**
 * LPG object main utils
 */


if ( !LPG ) {
	if ( !window.LPG ) {
		var LPG = {};
	} else {
		var LPG = window.LPG;
	}
}


LPG.namespace = function (ns_string) {
	var parts = ns_string.split('.'),
		parent = this;
// отбросить начальный префикс – имя глобального объекта
	if (parts[0] === 'LPG') {
		parts = parts.slice(1);
	}
	for (var i = 0, l = parts.length; i < l; i += 1) {
// создать свойство, если оно отсутствует
		if (typeof parent[parts[i]] === 'undefined') {
			parent[parts[i]] = {
				parent: parent
			};
		}
		parent = parent[parts[i]];
		parent.rootObj = this;
	}
	return parent;
};

if ( typeof LPG.form !== 'function' ) {
	LPG.form = function (action, params, callback, additionalArgs) {
		var request = {'request': JSON.stringify(params)},
			$ = window.$ || window.jq_144,
			jqxhr = $.post('/app/'+action+'/', request, function(response) {
				var data = response.response.data,
					errors = response.response.errors,
					critical = response.critical;
				if (callback) callback(data, errors, critical);
			}, 'json');
		
		if ( additionalArgs && additionalArgs.failCallback ) {
			jqxhr.fail(additionalArgs.failCallback);
		}
		if ( additionalArgs && additionalArgs.alwaysCallback ) {
			jqxhr.always(additionalArgs.alwaysCallback);
		}
	};
}


LPG.namespace('LPG.utils');

LPG.utils.objClone = function ( obj ) {
	var clone = {};
	for ( var k in obj ) {
		if ( !obj.hasOwnProperty(k) ) { continue; }
		clone[k] = obj[k];
	}
	return clone;
};

LPG.utils.urlData = (function () {
	var urlData = {};
	if (window.location.search) {
		var paramsStr = decodeURIComponent( window.location.search.substring(1).replace(/\+/g, ' ') ),
			params = paramsStr.split('&');

		for (var i = 0, l = params.length; i < l; i += 1) {
			urlData[params[i].split('=')[0]] = params[i].split('=')[1];
		}
	}

	return {
		getValue: function ( param ) {
			var value;
			if ( urlData[param] !== undefined ) {
				value = urlData[param];
			} else {
				value = '';
			}
			return value;
		},
		getNames: function () {
			return Object.keys( urlData );
		}
	};
}());