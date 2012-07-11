<div id="flickrsets2wp-admin">
	<h2>Sets FlicksetsR2WP options</h2>
	<form method="post" action="options.php">
	<?php settings_fields('flickrsets2WP-plugin-settings'); ?>
	<?php $options = get_option('flickrsets2WP_plugin_settings'); ?>
		<table>
			<tr>
				<td class="label"><label for="account">Default FlickR account to follow:</label></td>
				<td class="value"><input type="text" width="150" name="flickrsets2WP_plugin_settings[account]" id="account" value="<?php echo $options['account']; ?>" /></td>
			</tr>
			<tr>
				<td class="label"><label for="apikey">FlickR API Key:</label></td>
				<td class="value"><input type="text" width="150" name="flickrsets2WP_plugin_settings[apikey]" id="apikey" value="<?php echo $options['apikey']; ?>" /></td>
			</tr>
		</table>
		<input  type="submit" name="Save" value="<?php _e("Save Options"); ?>" id="submitbutton" />
	</form>
</div>