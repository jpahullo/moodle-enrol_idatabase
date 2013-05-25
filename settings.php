<?php
// This file is part of the Improved Database Enrolment Plugin
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Database enrolment plugin settings and presets.
 *
 * @package    enrol_idatabase
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    //--- general settings -----------------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('enrol_idatabase_settings', '', get_string('pluginname_desc', 'enrol_idatabase')));

    $settings->add(new admin_setting_heading('enrol_idatabase_exdbheader', get_string('settingsheaderdb', 'enrol_idatabase'), ''));

    $options = array('', "access","ado_access", "ado", "ado_mssql", "borland_ibase", "csv", "db2", "fbsql", "firebird", "ibase", "informix72", "informix", "mssql", "mssql_n", "mssqlnative", "mysql", "mysqli", "mysqlt", "oci805", "oci8", "oci8po", "odbc", "odbc_mssql", "odbc_oracle", "oracle", "postgres64", "postgres7", "postgres", "proxy", "sqlanywhere", "sybase", "vfp");
    $options = array_combine($options, $options);
    $settings->add(new admin_setting_configselect('enrol_idatabase/dbtype', get_string('dbtype', 'enrol_idatabase'), get_string('dbtype_desc', 'enrol_idatabase'), '', $options));

    $settings->add(new admin_setting_configtext('enrol_idatabase/dbhost', get_string('dbhost', 'enrol_idatabase'), get_string('dbhost_desc', 'enrol_idatabase'), 'localhost'));

    $settings->add(new admin_setting_configtext('enrol_idatabase/dbuser', get_string('dbuser', 'enrol_idatabase'), '', ''));

    $settings->add(new admin_setting_configpasswordunmask('enrol_idatabase/dbpass', get_string('dbpass', 'enrol_idatabase'), '', ''));

    $settings->add(new admin_setting_configtext('enrol_idatabase/dbname', get_string('dbname', 'enrol_idatabase'), '', ''));

    $settings->add(new admin_setting_configtext('enrol_idatabase/dbencoding', get_string('dbencoding', 'enrol_idatabase'), '', 'utf-8'));

    $settings->add(new admin_setting_configtext('enrol_idatabase/dbsetupsql', get_string('dbsetupsql', 'enrol_idatabase'), get_string('dbsetupsql_desc', 'enrol_idatabase'), ''));

    $settings->add(new admin_setting_configcheckbox('enrol_idatabase/dbsybasequoting', get_string('dbsybasequoting', 'enrol_idatabase'), get_string('dbsybasequoting_desc', 'enrol_idatabase'), 0));

    $settings->add(new admin_setting_configcheckbox('enrol_idatabase/debugdb', get_string('debugdb', 'enrol_idatabase'), get_string('debugdb_desc', 'enrol_idatabase'), 0));



    $settings->add(new admin_setting_heading('enrol_idatabase_localheader', get_string('settingsheaderlocal', 'enrol_idatabase'), ''));

    $options = array('id'=>'id', 'idnumber'=>'idnumber', 'shortname'=>'shortname');
    $settings->add(new admin_setting_configselect('enrol_idatabase/localcoursefield', get_string('localcoursefield', 'enrol_idatabase'), '', 'idnumber', $options));

    $options = array('id'=>'id', 'idnumber'=>'idnumber', 'email'=>'email', 'username'=>'username'); // only local users if username selected, no mnet users!
    $settings->add(new admin_setting_configselect('enrol_idatabase/localuserfield', get_string('localuserfield', 'enrol_idatabase'), '', 'idnumber', $options));

    $options = array('id'=>'id', 'shortname'=>'shortname');
    $settings->add(new admin_setting_configselect('enrol_idatabase/localrolefield', get_string('localrolefield', 'enrol_idatabase'), '', 'shortname', $options));

    $options = array('id'=>'id', 'idnumber'=>'idnumber');
    $settings->add(new admin_setting_configselect('enrol_idatabase/localcategoryfield', get_string('localcategoryfield', 'enrol_idatabase'), '', 'id', $options));


    $settings->add(new admin_setting_heading('enrol_idatabase_remoteheader', get_string('settingsheaderremote', 'enrol_idatabase'), ''));

    $settings->add(new admin_setting_configtext('enrol_idatabase/remoteenroltable', get_string('remoteenroltable', 'enrol_idatabase'), get_string('remoteenroltable_desc', 'enrol_idatabase'), ''));

    $settings->add(new admin_setting_configtext('enrol_idatabase/remotecoursefield', get_string('remotecoursefield', 'enrol_idatabase'), get_string('remotecoursefield_desc', 'enrol_idatabase'), ''));

    $settings->add(new admin_setting_configtext('enrol_idatabase/remoteuserfield', get_string('remoteuserfield', 'enrol_idatabase'), get_string('remoteuserfield_desc', 'enrol_idatabase'), ''));

    $settings->add(new admin_setting_configtext('enrol_idatabase/remoterolefield', get_string('remoterolefield', 'enrol_idatabase'), get_string('remoterolefield_desc', 'enrol_idatabase'), ''));

    if (!during_initial_install()) {
        $options = get_default_enrol_roles(context_system::instance());
        $student = get_archetype_roles('student');
        $student = reset($student);
        $settings->add(new admin_setting_configselect('enrol_idatabase/defaultrole', get_string('defaultrole', 'enrol_idatabase'), get_string('defaultrole_desc', 'enrol_idatabase'), $student->id, $options));
    }

    $settings->add(new admin_setting_configcheckbox('enrol_idatabase/ignorehiddencourses', get_string('ignorehiddencourses', 'enrol_idatabase'), get_string('ignorehiddencourses_desc', 'enrol_idatabase'), 0));

    $options = array(ENROL_EXT_REMOVED_UNENROL        => get_string('extremovedunenrol', 'enrol'),
                     ENROL_EXT_REMOVED_KEEP           => get_string('extremovedkeep', 'enrol'),
                     ENROL_EXT_REMOVED_SUSPEND        => get_string('extremovedsuspend', 'enrol'),
                     ENROL_EXT_REMOVED_SUSPENDNOROLES => get_string('extremovedsuspendnoroles', 'enrol'));
    $settings->add(new admin_setting_configselect('enrol_idatabase/unenrolaction', get_string('extremovedaction', 'enrol'), get_string('extremovedaction_help', 'enrol'), ENROL_EXT_REMOVED_UNENROL, $options));



    $settings->add(new admin_setting_heading('enrol_idatabase_newcoursesheader', get_string('settingsheadernewcourses', 'enrol_idatabase'), ''));

    $settings->add(new admin_setting_configtext('enrol_idatabase/newcoursetable', get_string('newcoursetable', 'enrol_idatabase'), get_string('newcoursetable_desc', 'enrol_idatabase'), ''));

    $settings->add(new admin_setting_configtext('enrol_idatabase/newcoursefullname', get_string('newcoursefullname', 'enrol_idatabase'), '', 'fullname'));

    $settings->add(new admin_setting_configtext('enrol_idatabase/newcourseshortname', get_string('newcourseshortname', 'enrol_idatabase'), '', 'shortname'));

    $settings->add(new admin_setting_configtext('enrol_idatabase/newcourseidnumber', get_string('newcourseidnumber', 'enrol_idatabase'), '', 'idnumber'));

    $settings->add(new admin_setting_configtext('enrol_idatabase/newcoursecategory', get_string('newcoursecategory', 'enrol_idatabase'), '', ''));

    if (!during_initial_install()) {
        require_once($CFG->dirroot.'/course/lib.php');
        $options = array();
        $parentlist = array();
        make_categories_list($options, $parentlist);
        $settings->add(new admin_setting_configselect('enrol_idatabase/defaultcategory', get_string('defaultcategory', 'enrol_idatabase'), get_string('defaultcategory_desc', 'enrol_idatabase'), 1, $options));
        unset($parentlist);
    }

    $settings->add(new admin_setting_configtext('enrol_idatabase/templatecourse', get_string('templatecourse', 'enrol_idatabase'), get_string('templatecourse_desc', 'enrol_idatabase'), ''));
}
