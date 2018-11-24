<h1>Мои настройки</h1>

<form method="post" action="options.php">
	
  <?php settings_fields( 'my-settings-group' ); ?>
  <?php do_settings_sections( 'my-settings-group' ); ?>

  <table class="form-table">

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