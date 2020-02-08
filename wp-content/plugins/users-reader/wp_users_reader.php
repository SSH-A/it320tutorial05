<?php
/*
*   Plugin Name: WP Users Reader
*   Description: plugin to read the MySQL DB Users table
*   Version: 1.0 
*   Author: Salman Shaikh
*   File: users-reader.php
*   Folder to create: users-tbl-reader
*   Short code: [wp-users-reader-shortcode]
*/
   
  add_shortcode( 'users-reader-shortcode', 'wp_users_reader_entry_point' );


function wp_users_reader_entry_point ( $attributes ) {
	
	global $wpdb;
 
 	//
	// PLEASE NOTE
	//    "users" is the database table name without the prefix
	//    *** YOU MUST add the prefix before the table name***
	//    ***  We will use the $wpdb object prefix value ***
	// 
	
	//Use the concatinaiton operator to join the table prefix to the word comments
	// to create the correct db prefix + table name
	//
	$tableName =   $wpdb->prefix . "users"; 

	//Echo out the $tablename varaible, which is the db prefix + table name
	//
	//echo "$tableName";
	  

	//Query the vomments table and assign the returned array of table row objects
	// to the $result variable
	//
	$result = $wpdb->get_results( "SELECT * FROM $tableName");

    //Echo out a table header using start string values
    //
	echo "<table border=\"2\">";
	echo "<tr>";
	echo "<th>"  . "User Nicename"        . "</th>" 
		. "<th>" . "User Email"                 . "</th>" 
		. "<th>" . "User Status"                . "</th>";
	echo "</tr>";

	//Iterate the array of DB row objects and put them in HTML table cells
	// 
	foreach($result as $row)  {
	 echo "<tr>";
	
	 //Each table row column data item is accessed using it's column name 
	 // 
	 echo   "<td>" . $row->user_nicename . "</td>"
		  . "<td>" . $row->user_email . "</td>"
		  . "<td>" . $row->user_status   . "</td>";
		  
	 echo "</tr>";
	}

	echo "</table>";
}
?>