// Copyright © 2012: Bizible.com

function _bizl(u) {
    setTimeout(function () {
        var s = document.createElement('script'); 
        var f = document.getElementsByTagName('script')[0];
        s.type = 'text/javascript';
        s.async = true; 
        s.src = document.location.protocol + u; 
        f.parentNode.insertBefore(s, f);
    }, 1);
}

_bizl('//a.bizible.com/_biz-a.js');
