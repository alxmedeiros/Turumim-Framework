
(function() {
    tinymce.create('tinymce.plugins.TurumimYouTube', {
        init : function(ed, url) {
            ed.addButton('brettsyoutube', {
                title : 'brettsyoutube.youtube',
                image : url+'/img/youtube.png',
                onclick : function() {
                    console.log(url);
                    idPattern = /(?:(?:[^v]+)+v.)?([^&=]{11})(?=&|$)/;
                    var vidId = prompt("YouTube Video", "Insira a url do vídeo");
                    var m = vidId;
                    if (m != null && m != 'undefined')
                        ed.execCommand('mceInsertContent', false, '[video]'+m+'[/video]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                longname : "Turumim Youtube Shortcode",
                author : 'Sérgio Vilar',
                authorurl : 'http://about.me/vilar',
                infourl : 'http://turumim.feelsen.com/',
                version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add('brettsyoutube', tinymce.plugins.TurumimYouTube);
})();