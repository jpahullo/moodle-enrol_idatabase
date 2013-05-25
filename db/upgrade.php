<?php
// This file is part of the Improved Database Enrolment Plugin
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Database enrolment plugin upgrade.
 *
 * @package    enrol_idatabase
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
function xmldb_enrol_idatabase_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();


    // Moodle v2.3.0 release upgrade line.
    // Put any upgrade step following this.


    // Moodle v2.4.0 release upgrade line
    // Put any upgrade step following this


    return true;
}
