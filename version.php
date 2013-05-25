<?php
// This file is part of the Improved Database Enrolment Plugin
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Database enrolment plugin version specification.
 *
 * @package    enrol_idatabase
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2012112900;        // The current plugin version (Date: YYYYMMDDXX)
$plugin->requires  = 2012112900;        // Requires this Moodle version
$plugin->component = 'enrol_idatabase';  // Full name of the plugin (used for diagnostics)
//TODO: should we add cron sync?
