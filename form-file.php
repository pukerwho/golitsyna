<h1>Мои настройки</h1>

<form method="post" action="options.php">
	
  <?php settings_fields( 'my-settings-group' ); ?>
  <?php do_settings_sections( 'my-settings-group' ); ?>

  <table class="form-table">

    <tr valign="top">
    <th scope="row">Facebook</th>
    <td><input type="text" name="facebook_link" value="<?php echo esc_attr( get_option('facebook_link') ); ?>" /></td>
    </tr>

    <tr valign="top">
    <th scope="row">Vk</th>
    <td><input type="text" name="vk_link" value="<?php echo esc_attr( get_option('vk_link') ); ?>" /></td>
    </tr>

    <tr valign="top">
    <th scope="row">Instagram</th>
    <td><input type="text" name="instagram_link" value="<?php echo esc_attr( get_option('instagram_link') ); ?>" /></td>
    </tr>

    <tr valign="top">
    <th scope="row">YouTube</th>
    <td><input type="text" name="youtube_link" value="<?php echo esc_attr( get_option('youtube_link') ); ?>" /></td>
    </tr>

    <tr valign="top">
    <th scope="row">Одноклассники</th>
    <td><input type="text" name="odnoklasniki_link" value="<?php echo esc_attr( get_option('odnoklasniki_link') ); ?>" /></td>
    </tr>

    <tr valign="top">
    <th scope="row">Whatsapp</th>
    <td><input type="text" name="whatsapp_link" value="<?php echo esc_attr( get_option('whatsapp_link') ); ?>" /></td>
    </tr>

    <tr valign="top">
    <th scope="row">Код Google Analytics</th>
    <td><input type="text" name="google_analytics" value="<?php echo esc_attr( get_option('google_analytics') ); ?>" /></td>
    </tr>

    <tr valign="top">
    <th scope="row">Биография (первая часть, видимая)</th>
    <td><textarea name="biography_one" rows="5"><?php echo esc_attr( get_option('biography_one') ); ?></textarea></td>
    </tr>

    <tr valign="top">
    <th scope="row">Биография (вторая часть, раскрывающая)</th>
    <td><textarea name="biography_two" rows="5"><?php echo esc_attr( get_option('biography_two') ); ?></textarea></td>
    </tr>
  </table>
    <?php submit_button(); ?>
</form>