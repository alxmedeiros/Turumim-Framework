
(function() {
    tinymce.create('tinymce.plugins.TurumimFlickr', {
        init : function(ed, url) {
            ed.addButton('turumimflickr', {
                title : 'turumimflickr.youtube',
                image : url+'/img/flickr.png',
                onclick : function() {
                    console.log(url);
                    idPattern = /(?:(?:[^v]+)+v.)?([^&=]{11})(?=&|$)/;
                    var vidId = prompt("Galeria do Flickr", "Insira a ID da galeria");
                    var m = vidId;
                    if (m != null && m != 'undefined')
                        ed.execCommand('mceInsertContent', false, '[flickralbum]'+m+'[/flickralbum]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                longname : "Turumim Flickr Shortcode",
                author : 'Sérgio Vilar',
                authorurl : 'http://about.me/vilar',
                infourl : 'http://turumim.feelsen.com/',
                version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add('turumimflickr', tinymce.plugins.TurumimFlickr);
})();