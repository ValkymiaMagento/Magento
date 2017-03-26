// ==============================================
// Valkymmia
// ==============================================

jQuery(document).ready(function () {

    // POPUP LOCALES
    jQuery('.google-maps').magnificPopup({
        type: 'iframe',

        iframe: {
            patterns: {
                dailymotion: {

                    index: 'dailymotion.com',

                    id: function(url) {
                        var m = url.match(/^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/);
                        if (m !== null) {
                            if(m[4] !== undefined) {

                                return m[4];
                            }
                            return m[2];
                        }
                        return null;
                    },

                    src: 'http://www.dailymotion.com/embed/video/%id%'
                }
            }
        }
    });

});