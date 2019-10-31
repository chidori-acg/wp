<?php

get_header();

?>

<div class="member-container">
    <div class="member-card">
        <div class="member-card-left">
            <div class="member-avatar">
                <?php
                global $current_user, $display_name, $user_email;
                get_currentuserinfo();
                echo get_avatar($current_user->user_email);
                ?>
            </div>
            <div class="member-social">
                关注 0 &nbsp; 粉丝 0
            </div>
        </div>

        <div class="member-info">
            <div class="member-name"><?php echo $current_user->display_name; ?></div>
            <div class="member-rank">
                <?php
                    $rank_data = mycred_display_users_balance($current_user->ID);
                    $rank_arr = [10, 20, 100, 500, 1000];
                    $rank_index = -1;
                    for($i=0; $i<5; $i++) {
                        if ($rank_data < $rank_arr[$i]) {
                            $rank_index = $i;
                            break;
                        }
                    }
                ?>
                <div class="member-rank-num rank_lv<?php echo $rank_index + 1; ?> rank_ro_<?php echo $rank_index + 1; ?>">Lv<?php echo $rank_index + 1; ?></div>
                <div class="member-rank-line rank_lo_<?php echo $rank_index + 1; ?>">
                    <div class="member-rank-line-cover rank_lv<?php echo $rank_index + 1; ?>" style="width:<?php
                    if ($rank_index == -1) {
                        echo 0;
                    } else {
                        echo (300 * $rank_data / $rank_arr[$rank_index + 1]).'px';
                    }
                    ?>">
                    </div>
                </div>
                <?php if ($rank_index != -1) { ?>
                <div class="member-rank-all"><?php echo $rank_data.' / '.$rank_arr[$rank_index + 1] ?></div>
                <?php } ?>
            </div>
            <div class="member-coin">奉纳 <?php
                echo mycred_display_users_balance($current_user->ID, 'chidori_coin');
                ?></div>
        </div>
    </div>
    <div class="member-posts">
        <?php
        query_posts('author='.$current_user->ID);
        while (have_posts()):the_post();
        ?>
            <div class="post">
                <div class="post-cover" style="background-image:url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID))[0] ?>')">
                </div>
                <div class="post-title">
                    <?php
                    if(mb_strlen($post->post_title, 'UTF8') > 13) {
                        echo mb_substr($post->post_title, 0, 13, 'UTF8').'...';
                    } else {
                        echo $post->post_title;
                    }
                    ?>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_query();
        ?>
    </div>
</div>
