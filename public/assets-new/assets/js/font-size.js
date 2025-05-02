var fontSize = 100;

jQuery(document).ready(function () {
    if (_getCookie("fontSize") != null) {
        fontSize = parseInt(_getCookie("fontSize"));
    } else {
        fontSize = 100;
    }

    storeOriginalFontSizes();
    applyFontSize(fontSize);
});

function storeOriginalFontSizes() {
    jQuery("h1, h2, h3, h4, h5, h6, p, a, li, ul, span").each(function () {
        if (!jQuery(this).data("original-size")) {
            var originalSize = parseFloat(jQuery(this).css("font-size"));
            jQuery(this).data("original-size", originalSize);
        }
    });
}

function applyFontSize(sizePercent) {
    jQuery("h1, h2, h3, h4, h5, h6, p, a, li, ul, span").each(function () {
        var originalSize = jQuery(this).data("original-size");
        if (originalSize) {
            var newSize = (originalSize / 100) * sizePercent;
            jQuery(this).css("font-size", newSize + "px");
        }
    });
}

function set_font_size(fontType) {
    if (fontType === "increase") {
        if (fontSize < 130) {
            fontSize += 5;
        }
    } else if (fontType === "decrease") {
        if (fontSize > 70) {
            fontSize -= 5;
        }
    } else {
        fontSize = 100;
    }
    _setCookie("fontSize", fontSize);
    applyFontSize(fontSize);
}

// Cookie helpers (same as before)
function _getCookie(name) {
    var arg = name + "=";
    var alen = arg.length;
    var clen = document.cookie.length;
    var i = 0;
    while (i < clen) {
        var j = i + alen;
        if (document.cookie.substring(i, j) == arg) {
            return _getCookieVal(j);
        }
        i = document.cookie.indexOf(" ", i) + 1;
        if (i == 0)
            break;
    }
    return null;
}

function _deleteCookie(name, path, domain) {
    if (_getCookie(name)) {
        document.cookie = name + "=" +
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }
}

function _setCookie(name, value, expires, path, domain, secure) {
    var vurl = true;
    if (path != '' && path != undefined) {
        vurl = validUrl(path);
    }
    if (jQuery.type(name) == "string" && vurl) {
        document.cookie = name + "=" + escape(value) +
            ((expires) ? "; expires=" + expires.toGMTString() : "") +
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            ((secure) ? "; secure" : "");
    }
}

function _getCookieVal(offset) {
    var endstr = document.cookie.indexOf(";", offset);
    if (endstr == -1) { endstr = document.cookie.length; }
    return unescape(document.cookie.substring(offset, endstr));
}
