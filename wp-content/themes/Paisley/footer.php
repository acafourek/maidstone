</section><!-- .container -->

<?php ace_newsletter_bottom(); ?>

<footer class="footer" id="footer" itemscope itemtype="https://schema.org/WPFooter">

  <?php if(is_active_sidebar('footer-widget-1')) : ?>
  <section class="footer-inner-wrap" role="complementary">
  <section class="footer-inner">
    <article class="col-f1"><?php dynamic_sidebar('footer-widget-1'); ?></article>
    <article class="col-f2"><?php dynamic_sidebar('footer-widget-2'); ?></article>
    <article class="col-f3"><?php dynamic_sidebar('footer-widget-3'); ?></article>
    <article class="col-f4"><?php dynamic_sidebar('footer-widget-4'); ?></article>
    <article class="col-f5"><?php dynamic_sidebar('footer-widget-5'); ?></article>
  </section><!-- .footer-inner -->
  </section><!-- .footer-inner-wrap -->
  <?php endif; ?>

  <?php echo ace_footer_heading(); ?>

  <nav class="footer-nav" role="navigation">
    <?php wp_nav_menu('theme_location=footer_menu&container_class=menu&menu_class=menu&fallback_cb=false&depth=1&show_home=1'); ?>
  </nav><!-- .footer-nav -->

  <section class="footer-copy" role="contentinfo">
    <?php if(get_option('ace_footer_credit') == true) { echo stripslashes_deep(get_option('ace_footer_credit')); } else { ?>&copy; <?php _e('Copyright', 'ace'); ?> <a href="<?php echo esc_url(home_url()); ?>" itemtype="copyrightHolder"><?php bloginfo('name'); ?></a> <span itemtype="copyrightYear" content="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></span>. <?php _e('Theme by', 'ace'); ?> <a href="<?php echo esc_url('https://www.bluchic.com'); ?>">Bluchic</a>.<?php } ?>
    <?php ace_footer_privacy(); ?>
  </section>

</footer><!-- .footer -->

</section><!-- .wrap -->

<?php if(is_active_sidebar('footer-widget-instagram')) : ?>
<footer class="footer-instagram" role="complementary">
  <?php dynamic_sidebar('footer-widget-instagram'); ?>
</footer><!-- .footer-instagram -->
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
