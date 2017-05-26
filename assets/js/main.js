/*******************************************************************************

    Title :  
    Date  :  January 2013
    Author:  Suitmedia (http://www.suitmedia.com)

********************************************************************************/

var Site = {

    init: function() {
        Site.fastClick();
        Site.enableActiveStateMobile();
    },

    fastClick: function() {
        FastClick.attach(document.body);
    },

    enableActiveStateMobile: function(){
        document.addEventListener('touchstart', function(){}, true);
    }

};


$(function() {
    Site.init();
});
