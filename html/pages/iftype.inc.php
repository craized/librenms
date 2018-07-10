<table class="table table-condensed table-hover table-striped">

<?php

if ($bg == '#ffffff') {
    $bg = '#e5e5e5';
} else {
    $bg = '#ffffff';
}

$types_array = explode(',', $vars['type']);
$ports = get_ports_from_type($types_array);

$port_groups = [];
$port_groups_port_ids = [];
foreach ($ports as $port) {
    $port_group = get_host_group_for_hostname($port['hostname']);
    if (!array_key_exists($port_group, $port_groups)) {
        $port_groups[$port_group] = [];
    }
    $port_groups[$port_group][] = $port;
    $port_groups_port_ids[$port_group][] = $port['port_id'];
}

for ($i = 0; $i < count($types_array);
$i++) {
    $types_array[$i] = ucfirst($types_array[$i]);
}

$types = implode(' + ', $types_array);

foreach ($port_groups as $group => $port_list) {
    $if_list = join(",", $port_groups_port_ids[$group]);

    echo "<tr class='iftype'>
        <td colspan='5'><span class=list-large><div class='panel panel-default'><div class='panel-heading'>".$group.' Hosts</div></div></span></td></tr>';

    echo "<tr class='iftype'>
        <td colspan='5'><span class=list-large>Total Graph for ports of type : ".$types.'</span><br />';

    if ($if_list) {
        $graph_type      = 'multiport_bits_separate';
        $port['port_id'] = $if_list;

        include 'includes/print-interface-graphs.inc.php';

        echo '</td></tr>';
        echo "<tr bgcolor='$iftype'>
            <th>Device</th>
            <th>Interface</th>
            <th>Speed</th>
            <th>Circuit</th>
            <th>Notes</th>
        </tr>";

        foreach ($port_list as $port) {
            $port = cleanPort($port);
            $done = 'yes';
            unset($class);
            $port['ifAlias'] = str_ireplace($type.': ', '', $port['ifAlias']);
            $port['ifAlias'] = str_ireplace('[PNI]', 'Private', $port['ifAlias']);
            $ifclass         = ifclass($port['ifOperStatus'], $port['ifAdminStatus']);
            if ($bg == '#ffffff') {
                $bg = '#e5e5e5';
            } else {
                $bg = '#ffffff';
            }

            echo "<tr class='iftype'>
                <td><span class=list-large>".generate_port_link($port, $port['port_descr_descr'])."</span><br />
                <span class=interface-desc style='float: left;'>".generate_device_link($port).' '.generate_port_link($port).' </span></td>
                <td>'.generate_port_link($port, makeshortif($port['ifDescr'])).'</td>
                <td>'.$port['port_descr_speed'].'</td>
                <td>'.$port['port_descr_circuit'].'</td>
                <td>'.$port['port_descr_notes']."</td>
                </tr>
                <tr class='iftype'>
                <td colspan='5'";

            if (dbFetchCell('SELECT count(*) FROM mac_accounting WHERE port_id = ?', array($port['port_id']))) {
                echo "<span style='float: right;'><a href='" . generate_url(array('page'=>'device', 'device'=>$port['device_id'], 'tab'=>'port', 'port'=>$port['port_id'], 'view'=>'macaccounting')) . "'><i class='fa fa-pie-chart fa-lg icon-theme' aria-hidden='true'></i> MAC Accounting</a></span>";
            }

            echo '<br />';

            if (file_exists(get_port_rrdfile_path($port['hostname'], $port['port_id']))) {
                $graph_type = 'port_bits';

                include 'includes/print-interface-graphs.inc.php';
            }

            echo '</td></tr>';
        }
    } else {
        echo 'None found.</td></tr>';
    }
}

?>
</table>
