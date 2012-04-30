
(function() {
    tinymce.create('tinymce.plugins.TurumimFacebook', {
        init : function(ed, url) {
            ed.addButton('turumimlike', {
                title : 'turumimlike.youtube',
                image : url+'/img/facebook.png',
                onclick : function() {
                    console.log(url);
                    idPattern = /(?:(?:[^v]+)+v.)?([^&=]{11})(?=&|$)/;
                    var vidId = prompt("Facebook Likebox", "Insira a url da página");
                    var m = vidId;
                    if (m != null && m != 'undefined')
                        ed.execCommand('mceInsertContent', false, '[likebox]'+m+'[/likebox]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                longname : "Turumim Facebook Shortcode",
                author : 'Sérgio Vilar',
                authorurl : 'http://about.me/vilar',
                infourl : 'http://turumim.feelsen.com/',
                version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add('turumimlike', tinymce.plugins.TurumimFacebook);
})();