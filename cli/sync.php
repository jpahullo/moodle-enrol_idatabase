<?php
// This file is part of the Improved Database Enrolment Plugin
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * CLI sync for full external database synchronisation.
 *
 * Sample cron entry:
 * # 5 minutes past 4am
 * 5 4 * * * $sudo -u www-data /usr/bin/php /var/www/moodle/enrol/database/cli/sync.php
 *
 * Notes:
 *   - it is required to use the web server account when executing PHP CLI scripts
 *   - you need to change the "www-data" to match the apache user account
 *   - use "su" if "sudo" not available
 *
 * @package    enrol_idatabase
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define('CLI_SCRIPT', true);

require(dirname(dirname(dirname(dirname(__FILE__)))).'/config.php');
require_once($CFG->libdir.'/clilib.php');

// Now get cli options.
list($options, $unrecognized) = cli_get_params(array('verbose'=>false, 'help'=>false), array('v'=>'verbose', 'h'=>'help'));

if ($unrecognized) {
    $unrecognized = implode("\n  ", $unrecognized);
    cli_error(get_string('cliunknowoption', 'admin', $unrecognized));
}

if ($options['help']) {
    $help =
"Execute enrol sync with external database.
The enrol_idatabase plugin must be enabled and properly configured.

Options:
-v, --verbose         Print verbose progess information
-h, --help            Print out this help

Example:
\$sudo -u www-data /usr/bin/php enrol/database/cli/sync.php

Sample cron entry:
# 5 minutes past 4am
5 4 * * * \$sudo -u www-data /usr/bin/php /var/www/moodle/enrol/database/cli/sync.php
";

    echo $help;
    die;
}

if (!enrol_is_enabled('idatabase')) {
    echo('enrol_idatabase plugin is disabled, sync is disabled'."\n");
    exit(1);
}

$verbose = !empty($options['verbose']);
$enrol = enrol_get_plugin('idatabase');
$result = 0;

$result = $result | $enrol->sync_courses($verbose);
$result = $result | $enrol->sync_enrolments($verbose);

exit($result);