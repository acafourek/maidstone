    <article class="article" itemscope itemtype="https://schema.org/CreativeWork">

      <header class="post-header">
        <h1 class="post-title entry-title" itemprop="headline"><?php _e('Not Found', 'ace'); ?></h1>
      </header>

      <article class="post-content entry-content" itemprop="text">

        <p><?php _e('You have come to a page that is either not existing or already been removed', 'ace'); ?>.</p>

        <?php get_search_form();?>

        <section class="split-columns">
        <article class="colleft">
          <h3><?php _e('Archives by month:', 'ace'); ?></h3>
          <ul>
            <?php wp_get_archives('type=monthly'); ?>
          </ul>
        </article>
        <article class="colright">
          <h3><?php _e('Archives by category:', 'ace'); ?></h3>
          <ul>
            <?php wp_list_categories('sort_column=name'); ?>
          </ul>
        </article>
        </section>

      </article><!-- .post-content -->

    </article><!-- .article -->
