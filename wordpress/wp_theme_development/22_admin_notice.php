<?php
add_action('admin_notices', 'wp_mail_smtp_lite_deactivation_notice_mani');
if (!function_exists('wp_mail_smtp_lite_deactivation_notice_mani')) {
    function wp_mail_smtp_lite_deactivation_notice_mani()
    {
        echo '<div class="notice notice-warning">
            <p>' . esc_html__('Please deactivate the free version of the WP Mail SMTP plugin before activating WP Mail SMTP Pro.', 'wp-mail-smtp') . '</p>
        </div>';
        echo '<div class="notice notice-success">
            <p>' . esc_html__('Please deactivate the free version of the WP Mail SMTP plugin before activating WP Mail SMTP Pro.', 'wp-mail-smtp') . '</p>
        </div>';
    }
}
?>

Notice with dismissible :
------------------------
<div class="notice  notice-success notice is-dismissible">
    <p> your test content </p>
    <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
</div>

notice-error
notice-warning
notice-success
