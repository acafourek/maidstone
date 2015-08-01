### About ###

Chromatic is a responsive portfolio theme for WordPress that is perfect for showcasing vertical, horizontal, or square images. Chromatic supports seven post formats, a portfolio custom post type, slideshows and includes multiple page templates for alternate homepage designs.

*Please Note: Chromatic requires WordPress 3.4 or greater.*


### Installation ###

1. Download the zip file from your [members dashboard](https://graphpaperpress.com/dashboard/). This will always be the most current version of the theme.
2. Log in to your WordPress dashboard. This can be found at yourdomain.com/wp-admin
3. Go to Appearance &gt; Themes and click on the *Install Themes* tab
4. Click on the *Upload* link
5. Upload the zip file that you downloaded from your members dashboard and click *Install Now*
6. Click *Activate* to use the theme you just installed.

![installing your Graph Paper Press theme](http://graphpaperpress.s3.amazonaws.com/images/instructions/install_themes.png)

For more details about installing your themes, please view [Installing Your Theme](http://graphpaperpress.com/support/installing-your-theme/)

### Integration with Sell Media plugin ###

Chromatic will work without the Sell Media plugin active, but, to take advantage of many of the features you see on the theme demo site, you must activate and configure the Sell Media plugin.

1. Download and install [Sell Media](http://graphpaperpress.com/plugins/sell-media/), [Sell Media Advanced Search](http://graphpaperpress.com/?download=advanced-search) (included in the purchase of this them).
2. Configure the Sell Media plugin settings at Sell Media > Settings.
3. Configure the new Sell Media widgets at Appearance > Widgets.
4. Configure the required Sell Media page templates (see Page Templates section below)
5. Configure your menus at Appearance > Menus (see Menus section below)

#### Recommended Plugin Configuration ####

* Disable all lightbox/slideshow/gallery plugins, including the GPP Slideshow Plugin. This theme already includes a slideshow script, so using another slideshow plugin will cause a conflict.
* Install the CF Post Formats plugin (Optional). This plugin enhances the admin interface for creating Post Formats and aids in the creation of necessary post meta for styling Post Formats. Download from: [https://github.com/crowdfavorite/wp-post-formats](https://github.com/crowdfavorite/wp-post-formats)


### How to setup theme like the demo ###

To setup theme like the [demo](http://demo.graphpaperpress.com/chromatic/) go to Settings > Reading and make sure that "Front page displays" option is set to "Your latest posts".
Go to Appearance > Theme Options > Slideshow and create a slideshow by uploading or selecting images from your Media Library.
The homepage will display the slideshow followed by your latest posts and sell media items.


### Media Settings ###

This theme sets the media sizes automatically. You can review these sizes in Settings &gt; Media. The default sizes for this theme are:

* Thumbnail size
	* Width: 520
	* Height: 520
	* [checked] Crop thumbnails to exact dimensions (normally thumbnails are proportional)
* Medium size
	* Max Width: 400
	* Max Height: 0
* Large size
	* Max Width: 1200
	* Max Height: 0
* Embeds
	* [checked] When possible, embed the media content from a URL directly onto the page. For example: links to Flickr and YouTube.
	* Maximum embed size
		* Width: 1200
		* Height: 0

*Please Note: If you are switching from another theme, you will want to install and run the [Regenerate Thumbnails](http://wordpress.org/extend/plugins/regenerate-thumbnails/) WordPress plugin to resize your existing images.*


### Theme Customizer ###

With the Theme Customizer, you can set your title and tagline, upload a logo, change your color scheme, choose your fonts, set a thumbnail layout size, set a header image, set a background image, assign your menus, and choose a static home page. You can preview your changes by clicking the Customize link below your active theme on your Appearance &gt; Themes page.


### Theme Options ###

Go to Appearance &gt; Theme Options to set up your theme, choose your fonts, set a color scheme, add a welcome message, set a blog category, and add custom CSS. Styles added here will not be deleted when you update your theme.

CSS creates the style of your site. For example, to hide the description of your site, simply paste this code into the custom CSS box:
`#site-description { display: none; }`.


### Homepage Options ###

You can choose to display your Portfolio archive page or another static page on your homepage. After you have created this page, you can set this in either Settings > Reading or the Theme Customizer by assigning a static front page.

#### Set Homepage to Portfolio Template ####

To use your Portfolio page as your homepage, create a new page in Pages > Add New. Assign this page to the Portfolio page template. You do not need to add any content to the content area.

#### Set Homepage to Fullscreen Slideshow ####

To display fullscreen slideshow as your homepage, create a new Slideshow page in Pages > Add New. Assign this page to the Slideshow page template. You do not need to add any content to the content area.

#### Add a Blog Page ####

If you use a static front page, you may also want to create a Blog page to display all of your blog posts on your site. To do this, you can create a page called Blog and assign it to the Blog page template. All of your posts will appear on this page.

*Please Note: Do* not *set this page as the page to display your blog posts in Settings > Reading or in the Theme Customizer as this will break the page template's code and your posts will not appear.*


### Widgets ###

This theme supports footer widgetized area.

1. Sell Media EXIF - Use this only in either the Sell Media Below Single Item or Sidebar (Sell Media Single Items) Widgetized Areas. This widget will display the EXIF data (camera, shutter speed, focal length, aperture, ISO, copyright, creator) of the image.
2. Sell Media Social Sharing - Use this only in either the Sidebar, Sell Media Below Single Item, or Sidebar (Sell Media Single Items) Widgetized Areas. It will dislay a Facebook and Twitter icon for sharing the post on social networks.

For more detail about adding widgets to your site, please read [Adding Widgets](http://graphpaperpress.com/support/using-widgets/).


### Menus ###

Our themes use WordPress’s custom menus option. These can be created in Appearance > Menus. To add a new menu to your site:

1. Go to Appearance > Menus.
2. Create a new menu item by clicking the + tab.
3. Select the pages you want to display in your menu and click the Add to Menu button. If you do not see the type of page (category, tag, portfolio, gallery, etc) you want to display, click the Screen Options link at the top of the page and make sure the page type is checked.
4. Once you have set your menu as you want it, click the Save Menu button.
5. Then, assign that menu to your desired theme location to ensure your menu appears where you want it and click Save.

![Add a Custom Menu](http://graphpaperpress.s3.amazonaws.com/images/instructions/custom_menu.jpg)


### Social Media Icons ###

You can add social media icons to your Bottom menu.

In your Menus panel on your dashboard, click on the arrow for each menu item to open the details box. You should see an option for *CSS Classes*. If you do not see this option, click the *Screen Options* link at the top of the page and make sure *CSS Classes* is checked in the menu that opens up.

To specify which icon will display, enter the corresponding class name in the CSS Classes box. Please note that these class names are case sensitive. The corresponding class names are: facebook, twitter, vimeo, googleplus and rss.

This is an image of a correctly completed menu details section:

![Social Media custom menu](http://images.graphpaperpress.com.s3.amazonaws.com/wp-menus-social-media-class.jpg)


### Always Set Featured Images ###

This theme relies heavily on Featured Images. If your post is missing a Featured Image, the post may not appear on the homepage or on archive pages.

To choose the image you want to set as a featured image for this post and click the *Set as Featured Image* button. For best results use images that are at least 665 px wide.

![Add a Featured Image](http://graphpaperpress.s3.amazonaws.com/images/instructions/featured_image.png)


### Portfolio ###

Chromatic supports an additional post type for your Portfolio. Portfolio items are displayed on homepage and on portfolio archive pages. To add new portfolio items, go to the Portfolio section in your Dashboard. Be sure to add a featured image to your portfolio items so they display correctly on the homepage and archive pages.

You can also assign categories and tags to your portfolio items so that you can further organize your Portfolio.


### Post Formats ###

This theme supports the following post formats &mdash; gallery, image, video, quote and standard &mdash; which are unique layouts for specific types of posts. Each post format has its own unique layout on the homepage, on its archive page and on the individual single post pages. Adding the CF Post Format plugin will improve the WordPress admin interface and make creating Post Formats simple and intuitive. While all the post formats work with default behaviour, here are some that have unique characteristics:

* Gallery - To show a slideshow of images (an image gallery), upload as many images as you like using the media uploader tool and insert the Gallery into the post. Be sure to assign a Featured Image for that post. For best results, use images that are at least 800 pixels wide. All posts assigned to the Gallery Post Format will then display the Gallery at the top of the post, with any text added into your post's edit page displayed below.

    To insert a gallery:

    1. Switch to the Gallery tab.
	2. Click the Add Media button to launch the Media Uploader tool.
	3. Click the Create Gallery option.
	4. You can choose to upload images from your computer or you can use images that already exist in your Media Library. You cannot use an image from a URL on the web in your gallery.
	5. If you are uploading images, click the Select Files button and navigate to each of your images on your computer. Click the Open button to open each image.
	6. Once each of your images has been uploaded, you will have the option to add a title, caption, alternative text and description.
	7. After you have added all of the images you wish to display in the gallery, switch to your media library tab and select those images.
	8. Then, click the Create a New Gallery button.
	9. Set a featured image for your Gallery.


    ![Insert a Gallery](http://graphpaperpress.s3.amazonaws.com/images/instructions/insert_gallery.png)

* Video - To display a video in your post, switch to the Video tab. Paste your video's embed code in the Video URL or Embed Code field. The video will display above all post content on the homepage, single, and archive pages. This works for all interactive elements (videos, maps, panoramas) that have embed code. You can also add additional interactive elements into the content area, though these will appear inside the content area, rather than above it.


### Page Templates ###

This theme provides eight page templates: Default, Blog, and Portfolio, Slideshow, Collections, Lightbox, Sell Media Items, Dashboard.

1. The Default page template is the standard page layout, and will display the Sidebar if you have it activated in your widgets area.
2. The Blog page template will display all of your blog posts on this page. You can determine how many posts will appear on each page before the 'Older Entries' link in Settings &gt; Reading, by setting a value for 'Blog Pages Display at Most'.
3. The Portfolio page template displays the featured images for all of your Portfolio entries on your page. You can choose the layout for how the featured images appear on this page in your Theme Options.
4. The Slideshow page template will display a fullscreen image slideshow. To create a slideshow go to WordPress Dashboard > Appearance > Theme Options > Homepage Slideshow.
5. The Collections page template will display all your Sell Media Collections.
6. Sell Media Items page template will display your Sell Media Items.
7. Dashboard page template will display Sell Media user dashboard.

### Embed Multimedia into Posts or Pages ###

For externally hosted videos (for example a YouTube or Vimeo video), you can directly paste the link of your video page into the content editor. You do not have to paste the embed code. WordPress will automatically embed the video from the link.

You can easily embed videos from a Video hosting service such as Vimeo or YouTube into your posts or pages.

To add a video:

1. From your WordPress dashboard, add a new post or page (or edit an existing post or page).
2. Paste in your video’s URL, for example https://vimeo.com/31985752.
3. Publish or Update your post or page.

*Please note: If your video is not appearing correctly, remove the ‘s’ from the URL, so https becomes http.*

### Setting up the Lightbox ###
Setting up the Lightbox is a two step process:

1. Create a new Page called "Lighbox" and add this shortcode to the page: '[sell_media_lightbox]'
2. Add the new Lightbox page to the Top Menu. You need to apply a custom CSS class to the Lightbox menu link. Toggle open the menu link using the arrow icon. If you don't see the CSS Classes option, click the Screen Options link in the top right of the page and make sure the CSS Classes option is checked under the "Show advanced menu options" subheading. Add the css class "lightbox-menu" to the CSS classes option for the Lightbox menu link. This special CSS class will append the lighbox counter box right beside the Lightbox menu link on your site. Below is a screenshot of the Lightbox link menu css class:

![Lightbox Menu Link](https://graphpaperpress.s3.amazonaws.com/images/instructions/stock-photography-lightbox-menu.jpg)