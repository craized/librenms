<?php
/**
 * Shell Script Transport
 * @author Tomoc <tomoc.field@sonic.com>
 * @copyright 2018 Sonic.net, LLC
 * @package LibreNMS
 * @subpackage Alerts
 */

namespace LibreNMS\Alert\Transport;

use LibreNMS\Interfaces\Alert\Transport;

class Shellexec implements Transport
{
    public function deliverAlert($obj, $opts)
    {
        foreach ($opts as $method => $script) {
            // Get script path
            $script_path = $script['path'];
            // Get command line args
            $shell_args = $script['extra'];
            // JSON encode $obj
            $obj_blob = json_encode($obj);
            // We ignore this, but storing things for potential use seems fine
            $output = array();
            // Collect exec return code
            $return_code = 0;
            // Exec to shell
            exec("echo '" . $obj_blob . "' | " . $script_path . ' ' . $shell_args, $output, $return_code);
            // exec('echo "' . $obj_blob . '" | ' . $script_path . ' ' . $shell_args, &$output, $return_code);
            // Check return
            if ($return_code != 0) {
                return 'Script returned non zero exit status: ' . $return_code;
            }
        }
        return true;
    }
}
