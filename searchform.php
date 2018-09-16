<?php
/**
 * The search form in the sidebar.
 *
 * @package WordPress
 * @subpackage Judgment
 * @since Judgment 1.0
 */

 ?>
 
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <input type="text" placeholder="Search" value="" name="s" id="s" />
    </div>
</form>