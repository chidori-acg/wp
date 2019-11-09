<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<footer>
    <div class="cdi-footer">
        <div class="cdi-footer-logo">
            <img src="<?php echo get_bloginfo('template_directory').'/image/site_logo.png'; ?>" />
        </div>
        <div class="cdi-footer-intro">
            <p>本站点最终所有权归属双葉委员会</p>
            <p>本站仅做ACG分享，不提供任何资源。</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
<script>
    jQuery(document).ready(function($) {
        $(".cdi-single-post-nothas-btn").click(function() {
            var ajaxurl = '<?php echo admin_url('admin-ajax.php')?>';
            var data = {
                action: "single_buy",
                post_id: "<?php echo $post->ID; ?>"
            }
            $.ajax({
                url: ajaxurl,
                method: 'post',
                data: data,
                success: function(res) {
                    console.log(res);
                    if (!res.encode) {
                        $(".cdi-single-post-nothas").after('<div class="cdi-single-post-car">'
                            + res.message.resource_url
                            + '-'
                            + res.message.resource_code + '</div>').remove();
                    }
                }
            })
        });
    });

</script>
</html>
