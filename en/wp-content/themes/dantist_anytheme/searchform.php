<form name="search" action="<?php echo home_url( '/' ) ?>" method="get" class="search-form">
    <input type="text" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php echo __('Search'); ?>" class="input">
    <button type="submit" class="button"><?php echo __('GO'); ?></button>
</form>
