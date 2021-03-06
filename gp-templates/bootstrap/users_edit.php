<?php
$exists = $user && $user->id;
gp_title($exists ? __('Edit User') : __('Create User'));
gp_tmpl_header();
?>
<h2><?php echo wptexturize($exists ? sprintf(__('User #%d'), $user->id) : __('New User')); ?></h2>
<ul class="nav nav-tabs">
    <?php if (!$register) { ?>
        <li><a href="<?php echo gp_url('/admin/users'); ?>" class="btn"><i class="icon-chevron-left"></i> <?php echo __('go back'); ?></a></li>
    <?php } ?>
    <li class="active"><a href="#"><?php echo __('Basic Information'); ?></a></li>
</ul>
<form action="" method="post" class="form-horizontal">
    <input type="hidden" name="user[gp_handle_settings]" value="on">
    <input type="hidden" name="user[gp_user_id]" value="<?php echo $exists ? $user->id : '' ?>">
    <div class="control-group">
        <label class="control-label" for="user[user_login]"><?php echo __('Login Username'); ?></label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" name="user[user_login]" value="<?php echo $user->user_login; ?>" id="user[user_login]" placeholder="<?php echo __('Login Username'); ?>">
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="user[display_name]"><?php echo __('Display Name'); ?></label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-heart"></i></span>
                <input type="text" name="user[display_name]" value="<?php echo $user->display_name; ?>" id="user[display_name]" placeholder="<?php echo __('Display Name'); ?>">
                <span class="help-inline"><?php _e('The name that will be used for display on the website') ?></span>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="user[user_pass]"><?php echo __('Password'); ?></label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-eye-close"></i></span>
                <input type="password" name="user[user_pass]" value="" id="user[user_pass]" placeholder="<?php echo __('Password'); ?>">
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="user[user_pass2]"><?php echo __('Confirm Password'); ?></label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-eye-close"></i></span>
                <input type="password" name="user[user_pass2]" value="" id="user[user_pass2]" placeholder="<?php echo __('Confirm Password'); ?>">
                <?php if (!$register) { ?>
                    <span class="help-block"><?php _e('Leave both password fields blank to leave password unchanged') ?></span>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="user[user_email]"><?php echo __('Email Address'); ?></label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                <input type="text" name="user[user_email]" value="<?php echo $user->user_email; ?>" id="user[user_email]" placeholder="<?php echo __('Email Address'); ?>">
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="user[user_url]"><?php echo __('Website URL (if any)'); ?></label>
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i></span>
                <input type="text" name="user[user_url]" value="<?php echo $user->user_url; ?>" id="user[user_url]" placeholder="<?php echo __('Website URL (if any)'); ?>">
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <input type="submit" name="submit" value="<?php echo esc_attr(__('Save')); ?>" id="submit" class="btn btn-primary" />
            <?php if (!$register) { ?>
                <a class="btn" href="<?php echo gp_url('/admin/users'); ?>"><?php _e('go back'); ?></a>
            <?php } ?>
        </div>
    </div>
    <?php echo gp_js_focus_on('user[user_login]'); ?>
</form> 
</div>
<?php gp_tmpl_footer(); ?>