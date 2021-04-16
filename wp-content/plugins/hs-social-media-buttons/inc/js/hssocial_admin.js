jQuery( "#hssocial_form" ).validate({	
	errorPlacement: function(error, element) {
    error.appendTo( element.parent("td").next("td") );
  },
  rules: {
    hssocial_facebook: {     
      url: true
    },
	hssocial_linkedin: {     
      url: true
    }, 
	hssocial_twitter: {     
      url: true
    },
	hssocial_youtube: {     
      url: true
    },
	hssocial_google: {     
      url: true
    },
	hssocial_pintrest: {     
      url: true
    },
	hssocial_ur_web: {     
      url: true
    },
	hssocial_instagram: {     
      url: true
    },
	hssocial_flickr: {     
      url: true
    },
	hssocial_xing: {     
      url: true
    }
  }
});