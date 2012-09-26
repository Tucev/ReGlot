<?php
gp_title(sprintf(__('%s &lt; ReGlot'), __('Welcome')));
gp_tmpl_header();
?>
	<h2>Welcome</h2>
	<p>
		Welcome to ReGlot, based on GlotPress.
	</p>
	<p>
		You can browse translations
		<ul>
			<li><a href="<?php echo gp_url_project(); ?>">by project</a></li>
			<li><a href="<?php echo gp_url_by_translation(); ?>">by language or translation sets</a></li>
		</ul>
	</p>
	<p>
		If you want to help translating instead,
		please <a href="<?php echo gp_url_login(); ?>">log in</a> to ReGlot
		or <a href="<?php echo gp_url_register(); ?>">register</a> if you don't have an account yet.
	</p>
<?php
gp_tmpl_footer();