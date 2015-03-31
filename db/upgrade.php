<?php  //$Id: upgrade.php,v 1.7 2009/09/20 22:02:04 gage Exp $

// This file keeps track of upgrades to
// the assignment module
//
// Sometimes, changes between versions involve
// alterations to database structures and other
// major things that may break installations.
//
// The upgrade function in this file will attempt
// to perform all the necessary actions to upgrade
// your older installtion to the current version.
//
// If there's something it cannot do itself, it
// will tell you what you need to do.
//
// The commands in here will all be database-neutral,
// using the functions defined in lib/ddllib.ph

defined('MOODLE_INTERNAL') || die();

function xmldb_wwassignment_upgrade($oldversion) {

    global $CFG, $DB;

    $dbman = $DB->get_manager(); /// loads ddl manager and xmldb classes

    // I've used the version I got: 2015022101 .

    if ($oldversion < 2015030906){
        $table = new xmldb_table('wwassignment');
        // TODO: Validate if existing wwassignments have mostly a html description to use 1 at
        // add_field time
        $field = new xmldb_field('introformat', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, '0', 'description');

        // Add introformat.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }


        // Change description into intro
        $field = new xmldb_field('description', XMLDB_TYPE_TEXT);
        if ($dbman->field_exists($table, $field)) {
            $dbman->rename_field($table, $field, 'intro');
        }

        // save upgrade point
	    upgrade_mod_savepoint(true, 2015030906, 'wwassignment');
    }


/// And upgrade begins here. For each one, you'll need one 
/// block of code similar to the next one. Please, delete 
/// this comment lines once this file start handling proper
/// upgrade code.

/// if ($result && $oldversion < YYYYMMDD00) { //New version in version.php
///     $result = result of "/lib/ddllib.php" function calls
/// }

    
    
//===== 1.9.0 upgrade line ======//
// as this is for 2.0 version, which does not allow upgrading from pre-1.9.0, not needed
//    if ($result && $oldversion < 2008092818) {
    
    
    	//Define field grade to be added to wwassignment
//        $table = new xmldb_table('wwassignment');
//        $field = new xmldb_field('grade');
//        $field->set_attributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'webwork_set');
               
    	/// Launch add field grade
//        $dbman->add_field($table, $field);
       
	
    	/// Define field timemodified to be added to wwassignment
//        $table = new xmldb_table('wwassignment');
//        $field = new xmldb_field('timemodified');
//        $field->set_attributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, '0', 'grade');
        
        /// Launch add field timemodified to wwassignment_bridge
//        $dbman->add_field($table, $field);
	
	/// save upgrade point
//	  upgrade_mod_savepoint(true, 2008092818, 'wwassignment');
                   
//    }

    return true;
    
}
?>

