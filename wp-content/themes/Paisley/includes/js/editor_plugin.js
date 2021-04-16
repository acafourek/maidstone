( function() {
  tinymce.create( 'tinymce.plugins.ace', {
    init : function( ed, url ) {

      ed.addButton( 'ace_hr', {
        title:    'Horizontal line',
        image:    url+'/editor_imgs/hr.png',
        onclick:  function() {
          ed.selection.setContent( '[line]' );
        }
      });

      ed.addButton( 'ace_2columns', {
        title:    '2 Columns',
        image:    url+'/editor_imgs/2col.png',
        onclick:  function() {
          ed.selection.setContent( '<p>[left]' + ed.selection.getContent() + '[/left]<p>[right][/right]</p>' );
        }
      });

      ed.addButton( 'ace_3columns', {
        title:    '3 Columns',
        image:    url+'/editor_imgs/3col.png',
        onclick:  function() {
          ed.selection.setContent( '<p>[col1]' + ed.selection.getContent() + '[/col1]</p><p>[col2][/col2]</p><p>[col3][/col3]</p>' );
        }
      });

      ed.addButton( 'ace_3halfcolumns', {
        title:    '3 Half Columns',
        image:    url+'/editor_imgs/3half.png',
        onclick:  function() {
          ed.selection.setContent( '<p>[col3_2]' + ed.selection.getContent() + '[/col3_2]</p><p>[col3_1][/col3_1]</p>' );
        }
      });

      ed.addButton( 'ace_boxw', {
        title:    'Warning box',
        image:    url+'/editor_imgs/boxw.png',
        onclick:  function() {
          ed.selection.setContent( '[warning]' + ed.selection.getContent() + '[/warning]' );
        }
      });

      ed.addButton( 'ace_boxd', {
        title:    'Disclaim box',
        image:    url+'/editor_imgs/boxd.png',
        onclick:  function() {
          ed.selection.setContent( '[disclaim]' + ed.selection.getContent() + '[/disclaim]' );
        }
      });

      ed.addButton( 'ace_boxq', {
        title:    'Question box',
        image:    url+'/editor_imgs/boxq.png',
        onclick:  function() {
          ed.selection.setContent( '[question]' + ed.selection.getContent() + '[/question]' );
        }
      });

      ed.addButton( 'ace_slider', {
        title:    'Slider',
        image:    url+'/editor_imgs/slider.png',
        onclick:  function() {
          ed.selection.setContent( '[slide id="Slider_id"]<br />[images src="http://image.jpg" title="image title" caption="image caption" url="url"]<br />[/slide]' );
        }
      });

      ed.addButton( 'ace_pullquote', {
        title:    'Pull Quote',
        image:    url+'/editor_imgs/pullquote.png',
        onclick:  function() {
          ed.selection.setContent( '[pullquote width="300" float="left"]' + ed.selection.getContent() + '[/pullquote]' );
        }
      });

      ed.addButton( 'ace_lightbox', {
        title:    'Lightbox',
        image:    url+'/editor_imgs/lightbox.png',
        onclick:  function() {
          ed.selection.setContent( '[lightbox title="LightboxTitle" url="PageURL" width="900" height="500"]' + ed.selection.getContent() + '[/lightbox]' );
        }
      });

      ed.addButton( 'ace_tooltips', {
        title:    'Tooltip',
        image:    url+'/editor_imgs/tooltip.png',
        onclick:  function() {
          ed.selection.setContent( '[tooltip text="TooltipText"]' + ed.selection.getContent() + '[/tooltip]' );
        }
      });

      ed.addButton( 'ace_buttons', {
        title:    'Button',
        image:    url+'/editor_imgs/button.png',
        onclick:  function() {
          ed.selection.setContent( '[button url="URL"]' + ed.selection.getContent() + '[/button]' );
        }
      });

      ed.addButton( 'ace_accordion', {
        title:    'Accordion',
        image:    url+'/editor_imgs/accordion.png',
        onclick:  function() {
          ed.selection.setContent( '[accordion title="Title"]' + ed.selection.getContent() + '[/accordion]' );
        }
      });

      ed.addButton( 'ace_full_width', {
        title:    'Full Width',
        image:    url+'/editor_imgs/full_width.png',
        onclick:  function() {
          ed.selection.setContent( '[full_width background="#ffffff" image=""]' + ed.selection.getContent() + '[/full_width]' );
        }
      });

      ed.addButton( 'ace_dropcap', {
        title:    'Dropcap',
        image:    url+'/editor_imgs/dropcap.png',
        onclick:  function() {
          ed.selection.setContent( '[ace_dropcap]' + ed.selection.getContent() + '[/ace_dropcap]' );
        }
      });

    },
    createControl : function( n, cm ) {
      return null;
    },
    getInfo : function() {
      return {
        longname:   'Ace Shortcodes',
        author:     'Bluchic Team',
        authorurl:  'http://www.bluchic.com',
        infourl:    'http://www.bluchic.com',
        version:    '18.01'
      };
    }

  });

  tinymce.PluginManager.add( 'ace', tinymce.plugins.ace );

})();