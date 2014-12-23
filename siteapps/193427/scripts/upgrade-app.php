<?php
require_once('app-util.php');
require_once('file-util.php');

function upgrade_app($from_ver, $from_rel, $config_files, $db_ids, $psa_modify_hash, $db_modify_hash, $settings_modify_hash, $crypt_settings_modify_hash, $settings_enum_modify_hash, $additional_modify_hash){
//    $upgrade_schema_files = get_upgrade_schema_files($argv[2], $argv[3]);
    $upgrade_schema_files = array();
    configure($config_files, $upgrade_schema_files, $db_ids, $psa_modify_hash, $db_modify_hash, $settings_modify_hash, $crypt_settings_modify_hash, $settings_enum_modify_hash, $additional_modify_hash);

    $db_id = $db_ids[0];
    mysql_db_connect(get_db_address($db_id),
	    get_db_login($db_id),
	    get_db_password($db_id),
	    get_db_name($db_id));
    $result = mysql_list_tables(get_db_name($db_id));
    if (!$result) {
	print "DB Error, could not list tables\n";
	print 'MySQL Error: ' . mysql_error();
	exit(1);
    }
    $wp_old_tables = array (
	get_db_prefix($db_id).'comments',
	get_db_prefix($db_id).'links',
	get_db_prefix($db_id).'options',
	get_db_prefix($db_id).'postmeta',
	get_db_prefix($db_id).'posts',
	get_db_prefix($db_id).'terms',
	get_db_prefix($db_id).'term_relationships',
	get_db_prefix($db_id).'term_taxonomy',
	get_db_prefix($db_id).'usermeta',
	get_db_prefix($db_id).'users',
    );
    while ($row = mysql_fetch_row($result)) {
	if(is_array ( $wp_old_tables ) && in_array( $row[0], $wp_old_tables )){
	    switch ($row[0]) {
	    case get_db_prefix($db_id).'options':
		mysql_query("UPDATE ".$row[0]." SET option_name='".get_db_prefix($db_id)."wp_user_roles' WHERE option_name='wp_user_roles';");
		break;
	    case get_db_prefix($db_id).'usermeta':
		mysql_query("UPDATE ".$row[0]." SET meta_key='".get_db_prefix($db_id)."wp_capabilities' WHERE meta_key='wp_capabilities';");
		mysql_query("UPDATE ".$row[0]." SET meta_key='".get_db_prefix($db_id)."wp_user_level' WHERE meta_key='wp_user_level';");
		break;
	    }
	    mysql_query("ALTER TABLE ".$row[0]." RENAME ".get_db_prefix($db_id).'wp_'.substr( $row['0'], strlen( get_db_prefix ( $db_id )), strlen($row['0']) ).";");
	}
    }

/*
    $url = $psa_modify_hash["@@ROOT_URL@@"].'/wp-admin/upgrade.php?step=1';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
    $result = curl_exec($ch); // run the whole process
	if ($result === false) {
		echo "error: ".curl_error($ch);
		curl_close($ch);
		return 1;
	}
    curl_close($ch);
	if (! preg_match('/No Upgrade Required|Upgrade Complete/', $result) ) {
		echo "error: $result";
		return 1;
	}
*/
    return 0;
}
?>
