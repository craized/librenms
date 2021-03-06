<?php

/*
 * LibreNMS
 *
 * Copyright (c) 2014 Neil Lathwood <https://github.com/laf/ http://www.lathwood.co.uk/fa>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

use LibreNMS\Authentication\LegacyAuth;

$no_refresh = true;

?>

<!-- API URL Modal -->
<div class="modal fade" id="new-config-api" role="dialog" aria-hidden="true" title="Create new config item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" class="new_config_form">
                    <div class="form-group">
                        <span class="message"></span>
                    </div>
                    <div class="form-group">
                        <label for="new_conf_name">Method</label>
                        <select name="new_method" id="new_method" class="form-control">
                            <option value="get">GET</option>
                            <option value="post">POST</option>
                            <option value="put">PUT</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="new_conf_value">API URL</label>
                        <input type="text" class="form-control validation" name="new_conf_value" id="new_conf_value" placeholder="Enter the config value" required pattern="[a-zA-Z0-9]{1,5}://.*">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="submit">Add config</button>
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- End API URL Modal -->

<!-- Slack Modal -->
<div class="modal fade" id="new-config-slack" role="dialog" aria-hidden="true" title="Create new config item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" class="new_config_form">
                    <div class="form-group">
                        <span class="message"></span>
                    </div>
                    <div class="form-group">
                        <label for="slack_value">Slack API URL</label>
                        <input type="text" class="form-control validation" name="slack_value" id="slack_value" placeholder="Enter the Slack API url" required pattern="[a-zA-Z0-9]{1,5}://.*">
                    </div>
                    <div class="form-group">
                        <label for="slack_extra">Slack options (specify one per line key=value)</label>
                        <textarea class="form-control" name="slack_extra" id="slack_extra" placeholder="Enter the config options"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="submit-slack">Add config</button>
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- End Slack Modal -->

<!-- Discord Modal -->
<div class="modal fade" id="new-config-discord" role="dialog" aria-hidden="true" title="Create new config item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" class="new_config_form">
                    <div class="form-group">
                        <span class="message"></span>
                    </div>
                    <div class="form-group">
                        <label for="discord_value">Discord API URL</label>
                        <input type="text" class="form-control validation" name="discord_value" id="discord_value" placeholder="Enter the Discord API url" required pattern="[a-zA-Z0-9]{1,5}://.*">
                    </div>
                    <div class="form-group">
                        <label for="discord_extra">Discord options (specify one per line key=value)</label>
                        <textarea class="form-control" name="discord_extra" id="discord_extra" placeholder="Enter the config options"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="submit-discord">Add config</button>
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- End Discord Modal -->

<!-- Rocket.Chat Modal -->
<div class="modal fade" id="new-config-rocket" role="dialog" aria-hidden="true" title="Create new config item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" class="new_config_form">
                    <div class="form-group">
                        <span class="message"></span>
                    </div>
                    <div class="form-group">
                        <label for="rocket_value">Rocket.Chat API URL</label>
                        <input type="text" class="form-control validation" name="rocket_value" id="rocket_value" placeholder="Enter the Rocket.Chat API url" required pattern="[a-zA-Z0-9]{1,5}://.*">
                    </div>
                    <div class="form-group">
                        <label for="rocket_extra">Rocket.Chat options (specify one per line key=value)</label>
                        <textarea class="form-control" name="rocket_extra" id="rocket_extra" placeholder="Enter the config options"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="submit-rocket">Add config</button>
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- End RocketChat Modal -->

<!-- Hipchat Modal -->
<div class="modal fade" id="new-config-hipchat" role="dialog" aria-hidden="true" title="Create new config item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" class="new_config_form">
                    <div class="form-group">
                        <span class="message"></span>
                    </div>
                    <div class="form-group">
                        <label for="hipchat_value">Hipchat API URL</label>
                        <input type="text" class="form-control validation" name="hipchat_value" id="hipchat_value" placeholder="Enter the Hipchat API url" required pattern="[a-zA-Z0-9]{1,5}://.*">
                    </div>
                    <div class="form-group">
                        <label for="new_room_id">Room ID</label>
                        <input type="text" class="form-control validation" name="new_room_id" id="new_room_id" placeholder="Enter the room ID" required pattern="[^\s]{1,100}">
                    </div>
                    <div class="form-group">
                        <label for="new_from">From</label>
                        <input type="text" class="form-control validation" name="new_from" id="new_from" placeholder="Enter the from details" pattern=".{1,64}">
                    </div>
                    <div class="form-group">
                        <label for="hipchat_extra">Hipchat options (specify one per line key=value)</label>
                        <textarea class="form-control" name="hipchat_extra" id="hipchat_extra" placeholder="Enter the config options"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="submit-hipchat">Add config</button>
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- End Hipchat Modal -->

<!-- Pushover Modal -->
<div class="modal fade" id="new-config-pushover" role="dialog" aria-hidden="true" title="Create new config item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" class="new_config_form">
                    <div class="form-group">
                        <span class="message"></span>
                    </div>
                    <div class="form-group">
                        <label for="pushover_value">Pushover Apikey</label>
                        <input type="text" class="form-control validation" name="pushover_value" id="pushover_value" placeholder="Enter the Pushover Apikey" required>
                    </div>
                    <div class="form-group">
                        <label for="new_userkey">Room ID</label>
                        <input type="text" class="form-control validation" name="new_userkey" id="new_userkey" placeholder="Enter the Userkey" required>
                    </div>
                    <div class="form-group">
                        <label for="pushover_extra">Pushover options (specify one per line key=value)</label>
                        <textarea class="form-control" name="pushover_extra" id="pushover_extra" placeholder="Enter the config options"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="submit-pushover">Add config</button>
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- End Pushover Modal -->

<!-- ShellExec Modal -->
<div class="modal fade" id="new-config-shellexec" role="dialog" aria-hidden="true" title="Create new config item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" class="new_config_form">
                    <div class="form-group">
                        <span class="message"></span>
                    </div>
                    <div class="form-group">
                        <label for="shellexec_identifier">ShellExec Identifier</label>
                        <input type="text" class="form-control validation" name="shellexec_identifier" id="shellexec_identifier" placeholder="Enter the ShellExec Identifier" required>
                    </div>
                    <div class="form-group">
                        <label for="shellexec_path">ShellExec Script Path</label>
                        <input type="text" class="form-control validation" name="shellexec_path" id="shellexec_path" placeholder="Enter the ShellExec Script Path" required>
                    </div>
                    <div class="form-group">
                        <label for="shellexec_extra">ShellExec Command Line Arguments</label>
                        <textarea class="form-control" name="shellexec_extra" id="shellexec_extra" placeholder="Enter the config options"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="submit-shellexec">Add config</button>
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- End ShellExec Modal -->

<!-- Boxcar Modal -->
<div class="modal fade" id="new-config-boxcar" role="dialog" aria-hidden="true" title="Create new config item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" class="new_config_form">
                    <div class="form-group">
                        <span class="message"></span>
                    </div>
                    <div class="form-group">
                        <label for="boxcar_value">Boxcar Access token</label>
                        <input type="text" class="form-control validation" name="boxcar_value" id="boxcar_value" placeholder="Enter the Boxcar Access token" required>
                    </div>
                    <div class="form-group">
                        <label for="boxcar_extra">Boxcar options (specify one per line key=value)</label>
                        <textarea class="form-control" name="boxcar_extra" id="boxcar_extra" placeholder="Enter the config options"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="submit-boxcar">Add config</button>
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- End Boxcar Modal -->

<!-- Telegram Modal -->
<div class="modal fade" id="new-config-telegram" role="dialog" aria-hidden="true" title="Create new config item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" class="new_config_form">
                    <div class="form-group">
                        <span class="message"></span>
                    </div>
                    <div class="form-group">
                        <label for="telegram_value">Telegram Chat ID</label>
                        <input type="text" class="form-control validation" name="telegram_value" id="telegram_value" placeholder="Enter the Telegram Chat ID" required pattern="-?[\d]+">
                    </div>
                    <div class="form-group">
                        <label for="telegram_token">Telegram Token</label>
                        <input type="text" class="form-control validation" name="telegram_token" id="telegram_token" placeholder="Enter the Telegram Token" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="submit-telegram">Add config</button>
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- End Telegram Modal -->

<?php
if (isset($_GET['error'])) {
    print_error('We had issues connecting to your Pager Duty account, please try again');
}

if (isset($_GET['account']) && isset($_GET['service_key']) && isset($_GET['service_name'])) {
    set_config_name('alert.transports.pagerduty', $_GET['service_key']);
    set_config_name('alert.pagerduty.account', $_GET['account']);
    set_config_name('alert.pagerduty.service', $_GET['service_name']);
}

if (isset($vars['del_pagerduty']) && $vars['del_pagerduty'] == true && LegacyAuth::user()->hasGlobalAdmin()) {
    set_config_name('alert.transports.pagerduty', '');
    set_config_name('alert.pagerduty.account', '');
    set_config_name('alert.pagerduty.service', '');
}

$config_groups = get_config_by_group('alerting');

if (isset($config['base_url']) && filter_var($config['base_url'].'/'.$_SERVER['REQUEST_URI'], FILTER_VALIDATE_URL)) {
    $callback = $config['base_url'].'/'.$_SERVER['REQUEST_URI'].'/';
} else {
    $callback = get_url().'/';
}

$callback = urlencode($callback);

$general_conf = array(
    array('name'               => 'alert.disable',
          'descr'              => 'Disable alerting',
          'type'               => 'checkbox',
    ),
    array('name'               => 'alert.admins',
          'descr'              => 'Issue alerts to admins',
          'type'               => 'checkbox',
    ),
    array('name'               => 'alert.globals',
          'descr'              => 'Issue alerts to read only users',
          'type'               => 'checkbox',
    ),
    array('name'               => 'alert.users',
        'descr'                => 'Issue alerts to normal users',
        'type'                 => 'checkbox',
    ),
    array('name'               => 'alert.syscontact',
          'descr'              => 'Issue alerts to sysContact',
          'type'               => 'checkbox',
    ),
    array('name'               => 'alert.default_only',
          'descr'              => 'Send alerts to default contact only',
          'type'               => 'checkbox',
    ),
    array('name'               => 'alert.default_copy',
          'descr'              => 'Copy all email alerts to default contact',
          'type'               => 'checkbox',
    ),
    array('name'               => 'alert.default_mail',
          'descr'              => 'Default contact',
          'type'               => 'text',
          'pattern'            => '[a-zA-Z0-9_\-\.\+]+@[a-zA-Z0-9_\-\.]+\.[a-zA-Z]{2,18}',
    ),
    array('name'               => 'alert.tolerance_window',
          'descr'              => 'Tolerance window for cron',
          'type'               => 'numeric',
          'required'           => true,
    ),
    array('name'               => 'alert.fixed-contacts',
          'descr'              => 'Updates to contact email addresses not honored',
          'type'               => 'checkbox',
    ),
    [
        'name'                 => 'alert.ack_until_clear',
        'descr'                => 'Default acknowledge until alert clears option',
        'type'                 => 'checkbox',
    ]
);

$mail_conf = array(
    array('name'               => 'alert.transports.mail',
          'descr'              => 'Enable email alerting',
          'type'               => 'checkbox',
    ),
    array('name'               => 'email_backend',
          'descr'              => 'How to deliver mail',
          'options'            => $config['email_backend_options'],
          'type'               => 'select',
    ),
    array('name'               => 'email_user',
          'descr'              => 'From name',
          'type'               => 'text',
    ),
    array('name'               => 'email_from',
          'descr'              => 'From email address',
          'type'               => 'text',
          'pattern'            => '[a-zA-Z0-9_\-\.\+]+@[a-zA-Z0-9_\-\.]+\.[a-zA-Z]{2,18}',
    ),
    array('name'               => 'email_html',
          'descr'              => 'Use HTML emails',
          'type'               => 'checkbox',
    ),
    array('name'               => 'email_sendmail_path',
          'descr'              => 'Sendmail path',
          'type'               => 'text',
    ),
    array('name'               => 'email_smtp_host',
          'descr'              => 'SMTP Host',
          'type'               => 'text',
          'pattern'            => '[a-zA-Z0-9_\-\.]+',
    ),
    array('name'               => 'email_smtp_port',
          'descr'              => 'SMTP Port',
          'type'               => 'numeric',
          'required'           => true,
    ),
    array('name'               => 'email_smtp_timeout',
          'descr'              => 'SMTP Timeout',
          'type'               => 'numeric',
          'required'           => true,
    ),
    array('name'               => 'email_smtp_secure',
          'descr'              => 'SMTP Secure',
          'type'               => 'select',
          'options'            => $config['email_smtp_secure_options'],
    ),
    array('name'               => 'email_auto_tls',
          'descr'              => 'SMTP Auto TLS Support',
          'type'               => 'select',
          'options'            => array('true', 'false'),
    ),
    array('name'               => 'email_smtp_auth',
          'descr'              => 'SMTP Authentication',
          'type'               => 'checkbox',
    ),
    array('name'               => 'email_smtp_username',
          'descr'              => 'SMTP Authentication Username',
          'type'               => 'text',
    ),
    array('name'               => 'email_smtp_password',
          'descr'              => 'SMTP Authentication Password',
          'type'               => 'password',
    ),
);

echo '
<div class="well"><strong>DEPRECATED</strong>: Please use the new Alert Transports section under Alerts to configure transports - <a href="https://docs.librenms.org/Alerting/Transports/" target="_blank">docs</a>.</div>
<div class="panel-group" id="accordion">
    <form class="form-horizontal" role="form" action="" method="post">
';

echo generate_dynamic_config_panel('General alert settings', $config_groups, $general_conf);
echo generate_dynamic_config_panel('Email transport', $config_groups, $mail_conf, 'mail');

echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#api_transport_expand"><i class="fa fa-caret-down"></i> API transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="api" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="api_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-xs" type="button" name="new_config" id="new_config_item" data-toggle="modal" data-target="#new-config-api">Add API URL</button>
                        </div>
                    </div>';
                    $api_urls = get_config_like_name('alert.transports.api.%.');
foreach ($api_urls as $api_url) {
    $api_split  = explode('.', $api_url['config_name']);
    $api_method = $api_split[3];
    echo '<div class="form-group has-feedback" id="'.$api_url['config_id'].'">
                        <label for="api_url" class="col-sm-4 control-label">API URL ('.$api_method.') </label>
                        <div class="col-sm-4">
                            <input id="api_url" class="form-control" type="text" name="global-config-input" value="'.$api_url['config_value'].'" data-config_id="'.$api_url['config_id'].'">
                            <span class="form-control-feedback">
                                <i class="fa" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-danger del-api-config" name="del-api-call" data-config_id="'.$api_url['config_id'].'"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>';
}

                    echo '<div class="form-group has-feedback hide" id="api_url_template">
                        <label for="api_url" class="col-sm-4 control-label api-method">API URL </label>
                        <div class="col-sm-4">
                            <input id="api_url" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                            <span class="form-control-feedback">
                                <i class="fa" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-danger del-api-config" name="del-api-call" data-config_id=""><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#pagerduty_transport_expand"><i class="fa fa-caret-down"></i> Pagerduty transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="pagerduty" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="pagerduty_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-2">
                            <a href="https://connect.pagerduty.com/connect?vendor=2fc7c9f3c8030e74aae6&callback='.$callback.'"><img src="images/pd_connect_button.png" width="202" height="36" alt="Connect to PagerDuty"></a>
                        </div>
                        <div class="col-sm-1">';
if (empty($config_groups['alert.transports.pagerduty']['config_value']) === false) {
    echo "<i class='fa fa-check-square-o fa-col-success fa-3x'></i>";
} else {
    echo "<i class='fa fa-check-square-o fa-col-danger fa-3x'></i>";
}
                    echo '</div>
                        <div class="col-sm-offset-8 col-sm-1">';
if (empty($config_groups['alert.transports.pagerduty']['config_value']) === false) {
    echo '<a href = "settings/sub=alerting/?del_pagerduty=true" class="btn btn-xs btn-danger pull-right" > Delete</a >';
}
                    echo '</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#nagios_transport_expand"><i class="fa fa-caret-down"></i> Nagios compatible transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="nagios" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="nagios_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="nagios" class="col-sm-4 control-label">Nagios compatible FIFO </label>
                        <div data-toggle="tooltip" title="'.$config_groups['alert.transports.nagios']['config_descr'].'" class="toolTip fa fa-question-sign"></div>
                        <div class="col-sm-4">
                            <input id="nagios" class="form-control" type="text" name="global-config-input" value="'.$config_groups['alert.transports.nagios']['config_value'].'" data-config_id="'.$config_groups['alert.transports.nagios']['config_id'].'">
                            <span class="form-control-feedback">
                                <i class="fa" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#irc_transport_expand"><i class="fa fa-caret-down"></i> IRC transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="irc" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="irc_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="irc" class="col-sm-4 control-label">Enable irc transport </label>
                        <div data-toggle="tooltip" title="'.$config_groups['alert.transports.irc']['config_descr'].'" class="toolTip fa fa-question-circle"></div>
                        <div class="col-sm-4">
                            <input id="irc" type="checkbox" name="global-config-check" '.$config_groups['alert.transports.irc']['config_checked'].' data-on-text="Yes" data-off-text="No" data-size="small" data-config_id="'.$config_groups['alert.transports.irc']['config_id'].'">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#slack_transport_expand"><i class="fa fa-caret-down"></i> Slack transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="slack" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="slack_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-xs" type="button" name="new_config" id="new_config_item" data-toggle="modal" data-target="#new-config-slack">Add Slack URL</button>
                        </div>
                    </div>';
                    $slack_urls = get_config_like_name('alert.transports.slack.%.url');
foreach ($slack_urls as $slack_url) {
    unset($upd_slack_extra);
    $new_slack_extra = array();
    $slack_extras    = get_config_like_name('alert.transports.slack.'.$slack_url['config_id'].'.%');
    foreach ($slack_extras as $extra) {
        $split_extra = explode('.', $extra['config_name']);
        if ($split_extra[4] != 'url') {
            $new_slack_extra[] = $split_extra[4].'='.$extra['config_value'];
        }
    }

    $upd_slack_extra = implode(PHP_EOL, $new_slack_extra);
    echo '<div id="'.$slack_url['config_id'].'">
                        <div class="form-group has-feedback">
                            <label for="slack_url" class="col-sm-4 control-label">Slack URL </label>
                            <div class="col-sm-4">
                                <input id="slack_url" class="form-control" type="text" name="global-config-input" value="'.$slack_url['config_value'].'" data-config_id="'.$slack_url['config_id'].'">
                                <span class="form-control-feedback">
                                    <i class="fa" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-slack-config" name="del-slack-call" data-config_id="'.$slack_url['config_id'].'"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_slack_extra" placeholder="Enter the config options" data-config_id="'.$slack_url['config_id'].'" data-type="slack">'.$upd_slack_extra.'</textarea>
                                <span class="form-control-feedback">
                                    <i class="fa" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>';
}//end foreach

                    echo '<div class="hide" id="slack_url_template">
                        <div class="form-group has-feedback">
                            <label for="slack_url" class="col-sm-4 control-label api-method">Slack URL </label>
                            <div class="col-sm-4">
                                <input id="slack_url" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
                                    <i class="fa" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-slack-config" name="del-slack-call" data-config_id=""><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_slack_extra" placeholder="Enter the config options" data-config_id="" data-type="slack"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#discord_transport_expand"><i class="fa fa-caret-down"></i> Discord transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="discord" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="discord_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-xs" type="button" name="new_config" id="new_config_item" data-toggle="modal" data-target="#new-config-discord">Add Discord URL</button>
                        </div>
                    </div>';
                    $discord_urls = get_config_like_name('alert.transports.discord.%.url');
foreach ($discord_urls as $discord_url) {
    unset($upd_discord_extra);
    $new_discord_extra = array();
    $discord_extras    = get_config_like_name('alert.transports.discord.'.$discord_url['config_id'].'.%');
    foreach ($discord_extras as $extra) {
        $split_extra = explode('.', $extra['config_name']);
        if ($split_extra[4] != 'url') {
            $new_discord_extra[] = $split_extra[4].'='.$extra['config_value'];
        }
    }

    $upd_discord_extra = implode(PHP_EOL, $new_discord_extra);
    echo '<div id="'.$discord_url['config_id'].'">
                        <div class="form-group has-feedback">
                            <label for="discord_url" class="col-sm-4 control-label">Discord URL </label>
                            <div class="col-sm-4">
                                <input id="discord_url" class="form-control" type="text" name="global-config-input" value="'.$discord_url['config_value'].'" data-config_id="'.$discord_url['config_id'].'">
                                <span class="form-control-feedback">
                                    <i class="fa" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-discord-config" name="del-discord-call" data-config_id="'.$discord_url['config_id'].'"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_discord_extra" placeholder="Enter the config options" data-config_id="'.$discord_url['config_id'].'" data-type="discord">'.$upd_discord_extra.'</textarea>
                                <span class="form-control-feedback">
                                    <i class="fa" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>';
}//end foreach

                    echo '<div class="hide" id="discord_url_template">
                        <div class="form-group has-feedback">
                            <label for="discord_url" class="col-sm-4 control-label api-method">Discord URL </label>
                            <div class="col-sm-4">
                                <input id="discord_url" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
                                    <i class="fa" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-discord-config" name="del-discord-call" data-config_id=""><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_discord_extra" placeholder="Enter the config options" data-config_id="" data-type="discord"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#rocket_transport_expand"><i class="fa fa-caret-down"></i> Rocket.chat transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="rocket" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="rocket_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-xs" type="button" name="new_config" id="new_config_item" data-toggle="modal" data-target="#new-config-rocket">Add rocket URL</button>
                        </div>
                    </div>';
                    $rocket_urls = get_config_like_name('alert.transports.rocket.%.url');
foreach ($rocket_urls as $rocket_url) {
    unset($upd_rocket_extra);
    $new_rocket_extra = array();
    $rocket_extras    = get_config_like_name('alert.transports.rocket.'.$rocket_url['config_id'].'.%');
    foreach ($rocket_extras as $extra) {
        $split_extra = explode('.', $extra['config_name']);
        if ($split_extra[4] != 'url') {
            $new_rocket_extra[] = $split_extra[4].'='.$extra['config_value'];
        }
    }

    $upd_rocket_extra = implode(PHP_EOL, $new_rocket_extra);
    echo '<div id="'.$rocket_url['config_id'].'">
                        <div class="form-group has-feedback">
                            <label for="rocket_url" class="col-sm-4 control-label">rocket URL </label>
                            <div class="col-sm-4">
                                <input id="rocket_url" class="form-control" type="text" name="global-config-input" value="'.$rocket_url['config_value'].'" data-config_id="'.$rocket_url['config_id'].'">
                                <span class="form-control-feedback">
                                    <i class="fa" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-rocket-config" name="del-rocket-call" data-config_id="'.$rocket_url['config_id'].'"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_rocket_extra" placeholder="Enter the config options" data-config_id="'.$rocket_url['config_id'].'" data-type="rocket">'.$upd_rocket_extra.'</textarea>
                                <span class="form-control-feedback">
                                    <i class="fa" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>';
}//end foreach

                    echo '<div class="hide" id="rocket_url_template">
                        <div class="form-group has-feedback">
                            <label for="rocket_url" class="col-sm-4 control-label api-method">rocket URL </label>
                            <div class="col-sm-4">
                                <input id="rocket_url" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
                                    <i class="fa" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-rocket-config" name="del-rocket-call" data-config_id=""><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_rocket_extra" placeholder="Enter the config options" data-config_id="" data-type="rocket"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#hipchat_transport_expand"><i class="fa fa-caret-down"></i> Hipchat transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="hipchat" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="hipchat_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-xs" type="button" name="new_config" id="new_config_item" data-toggle="modal" data-target="#new-config-hipchat">Add Hipchat URL</button>
                        </div>
                    </div>';
                    $hipchat_urls = get_config_like_name('alert.transports.hipchat.%.url');
foreach ($hipchat_urls as $hipchat_url) {
    unset($upd_hipchat_extra);
    $new_hipchat_extra = array();
    $hipchat_extras    = get_config_like_name('alert.transports.hipchat.'.$hipchat_url['config_id'].'.%');
    $hipchat_room_id   = get_config_by_name('alert.transports.hipchat.'.$hipchat_url['config_id'].'.room_id');
    $hipchat_from      = get_config_by_name('alert.transports.hipchat.'.$hipchat_url['config_id'].'.from');
    foreach ($hipchat_extras as $extra) {
        $split_extra = explode('.', $extra['config_name']);
        if ($split_extra[4] != 'url' && $split_extra[4] != 'room_id' && $split_extra[4] != 'from') {
            $new_hipchat_extra[] = $split_extra[4].'='.$extra['config_value'];
        }
    }

    $upd_hipchat_extra = implode(PHP_EOL, $new_hipchat_extra);
    echo '<div id="'.$hipchat_url['config_id'].'">
                        <div class="form-group has-feedback">
                            <label for="hipchat_url" class="col-sm-4 control-label">Hipchat URL </label>
                            <div class="col-sm-4">
                                <input id="hipchat_url" class="form-control" type="text" name="global-config-input" value="'.$hipchat_url['config_value'].'" data-config_id="'.$hipchat_url['config_id'].'">
                                <span class="form-control-feedback">
                                    <i class="fa" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-hipchat-config" name="del-hipchat-call" data-config_id="'.$hipchat_url['config_id'].'"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="hipchat_room_id" class="col-sm-4 control-label">Room ID</label>
                            <div class="col-sm-4">
                                <input id="hipchat_room_id" class="form-control" type="text" name="global-config-input" value="'.$hipchat_room_id['config_value'].'" data-config_id="'.$hipchat_room_id['config_id'].'">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="hipchat_from" class="col-sm-4 control-label">From</label>
                            <div class="col-sm-4">
                                <input id="hipchat_from" class="form-control" type="text" name="global-config-input" value="'.$hipchat_from['config_value'].'" data-config_id="'.$hipchat_from['config_id'].'">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_hipchat_extra" placeholder="Enter the config options" data-config_id="'.$hipchat_url['config_id'].'" data-type="hipchat">'.$upd_hipchat_extra.'</textarea>
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                    </div>';
}//end foreach

                    echo '<div id="hipchat_url_template" class="hide">
                        <div class="form-group has-feedback">
                            <label for="hipchat_url" class="col-sm-4 control-label api-method">Hipchat URL </label>
                            <div class="col-sm-4">
                                <input id="hipchat_url" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-hipchat-config" id="del-hipchat-call" name="del-hipchat-call" data-config_id=""><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="hipchat_room_id" class="col-sm-4 control-label">Room ID</label>
                            <div class="col-sm-4">
                                <input id="global-config-room_id" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="hipchat_from" class="col-sm-4 control-label">From</label>
                            <div class="col-sm-4">
                                <input id="global-config-from" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_hipchat_extra" placeholder="Enter the config options" data-config_id="" data-type="hipchat"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- ShellExec Config -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#shellexec_transport_expand"><i class="fa fa-caret-down"></i> ShellExec Transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="shellexec" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="shellexec_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-xs" type="button" name="new_config" id="new_config_item" data-toggle="modal" data-target="#new-config-shellexec">Add ShellExec Config</button>
                        </div>
                    </div>';
$shellexec_appkeys = get_config_like_name('alert.transports.shellexec.%.appkey');
foreach ($shellexec_appkeys as $shellexec_appkey) {
    $shellexec_extra = array();
    $shellexec_path = array();
    // The whole config piece goes in here
    $shellexec_extras    = get_config_like_name('alert.transports.shellexec.'.$shellexec_appkey['config_id'].'.%');
    foreach ($shellexec_extras as $extra) {
        $split_extra = explode('.', $extra['config_name']);
        if ($split_extra[4] == 'path') {
            $shellexec_path = $extra;
        } elseif ($split_extra[4] == 'extra') {
            $shellexec_extra = $extra;
        } else {
        // Toss everything unknown
        }
    }

    echo '<div id="'.$shellexec_appkey['config_id'].'">
                        <div class="form-group has-feedback">
                            <label for="shellexec_identifier" class="col-sm-4 control-label">ShellExec Identifier</label>
                            <div class="col-sm-4">
                                <input id="shellexec_identifier" class="form-control" type="text" name="global-config-input" value="'.$shellexec_appkey['config_value'].'" data-config_id="'.$shellexec_appkey['config_id'].'">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-danger del-shellexec-config" name="del-shellexec-call" data-config_id="'.$shellexec_appkey['config_id'].'"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="shellexec_path" class="col-sm-4 control-label">ShellExec Script Path</label>
                            <div class="col-sm-8">
                                <input id="shellexec_path" class="form-control" type="text" name="global-config-input" value="'.$shellexec_path['config_value'].'" data-config_id="'.$shellexec_path['config_id'].'">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="shellexec_extra" class="col-sm-4 control-label">ShellExec Command Line Arguments</label>
                            <div class="col-sm-8">
                                <input id="shellexec_extra" class="form-control" type="text" name="global-config-input" value="'.$shellexec_extra['config_value'].'" data-config_id="'.$shellexec_extra['config_id'].'">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                    </div>';
}//end foreach

echo '<div id="shellexec_appkey_template" class="hide">
                        <div class="form-group has-feedback">
                            <label for="shellexec_identifier" class="col-sm-4 control-label api-method">ShellExec Identifier</label>
                            <div class="col-sm-4">
                                <input id="shellexec_identifier" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-shellexec-config" id="del-shellexec-call" name="del-shellexec-call" data-config_id=""><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="shellexec_path" class="col-sm-4 control-label api-method">ShellExec Script Path</label>
                            <div class="col-sm-8">
                                <input id="shellexec_path" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="shellexec_extra" class="col-sm-4 control-label api-method">Shell Exec Command Line Arguments</label>
                            <div class="col-sm-8">
                                <input id="shellexec_extra" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Boxcar Transport -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#pushover_transport_expand"><i class="fa fa-caret-down"></i> Pushover transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="pushover" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="pushover_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-xs" type="button" name="new_config" id="new_config_item" data-toggle="modal" data-target="#new-config-pushover">Add Pushover config</button>
                        </div>
                    </div>';
$pushover_appkeys = get_config_like_name('alert.transports.pushover.%.appkey');
foreach ($pushover_appkeys as $pushover_appkey) {
    unset($upd_pushover_extra);
    $new_pushover_extra = array();
    $pushover_extras    = get_config_like_name('alert.transports.pushover.'.$pushover_appkey['config_id'].'.%');
    $pushover_userkey   = get_config_by_name('alert.transports.pushover.'.$pushover_appkey['config_id'].'.userkey');
    foreach ($pushover_extras as $extra) {
        $split_extra = explode('.', $extra['config_name']);
        if ($split_extra[4] != 'appkey' && $split_extra[4] != 'userkey') {
            $new_pushover_extra[] = $split_extra[4].'='.$extra['config_value'];
        }
    }

    $upd_pushover_extra = implode(PHP_EOL, $new_pushover_extra);
    echo '<div id="'.$pushover_appkey['config_id'].'">
                        <div class="form-group has-feedback">
                            <label for="pushover_appkey" class="col-sm-4 control-label">Pushover Appkey </label>
                            <div class="col-sm-4">
                                <input id="pushover_appkey" class="form-control" type="text" name="global-config-input" value="'.$pushover_appkey['config_value'].'" data-config_id="'.$pushover_appkey['config_id'].'">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-pushover-config" name="del-pushover-call" data-config_id="'.$pushover_appkey['config_id'].'"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="pushover_userkey" class="col-sm-4 control-label">Userkey</label>
                            <div class="col-sm-4">
                                <input id="pushover_userkey" class="form-control" type="text" name="global-config-input" value="'.$pushover_userkey['config_value'].'" data-config_id="'.$pushover_userkey['config_id'].'">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_pushover_extra" placeholder="Enter the config options" data-config_id="'.$pushover_appkey['config_id'].'" data-type="pushover">'.$upd_pushover_extra.'</textarea>
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                    </div>';
}//end foreach

echo '<div id="pushover_appkey_template" class="hide">
                        <div class="form-group has-feedback">
                            <label for="pushover_appkey" class="col-sm-4 control-label api-method">Pushover Appkey </label>
                            <div class="col-sm-4">
                                <input id="pushover_appkey" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-pushover-config" id="del-pushover-call" name="del-pushover-call" data-config_id=""><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="pushover_userkey" class="col-sm-4 control-label">Userkey</label>
                            <div class="col-sm-4">
                                <input id="global-config-userkey" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_pushover_extra" placeholder="Enter the config options" data-config_id="" data-type="pushover"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#boxcar_transport_expand"><i class="fa fa-caret-down"></i> Boxcar transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="boxcar" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="boxcar_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-xs" type="button" name="new_config" id="new_config_item" data-toggle="modal" data-target="#new-config-boxcar">Add Boxcar config</button>
                        </div>
                    </div>';
$boxcar_appkeys = get_config_like_name('alert.transports.boxcar.%.access_token');
foreach ($boxcar_appkeys as $boxcar_appkey) {
    unset($upd_boxcar_extra);
    $new_boxcar_extra = array();
    $boxcar_extras    = get_config_like_name('alert.transports.boxcar.'.$boxcar_appkey['config_id'].'.%');
    foreach ($boxcar_extras as $extra) {
        $split_extra = explode('.', $extra['config_name']);
        if ($split_extra[4] != 'access_token') {
            $new_boxcar_extra[] = $split_extra[4].'='.$extra['config_value'];
        }
    }

    $upd_boxcar_extra = implode(PHP_EOL, $new_boxcar_extra);
    echo '<div id="'.$boxcar_appkey['config_id'].'">
                        <div class="form-group has-feedback">
                            <label for="boxcar_access_token" class="col-sm-4 control-label">Boxcar Access token </label>
                            <div class="col-sm-4">
                                <input id="boxcar_access_token" class="form-control" type="text" name="global-config-input" value="'.$boxcar_appkey['config_value'].'" data-config_id="'.$boxcar_appkey['config_id'].'">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-boxcar-config" name="del-boxcar-call" data-config_id="'.$boxcar_appkey['config_id'].'"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_boxcar_extra" placeholder="Enter the config options" data-config_id="'.$boxcar_appkey['config_id'].'" data-type="boxcar">'.$upd_boxcar_extra.'</textarea>
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                    </div>';
}//end foreach

echo '<div id="boxcar_appkey_template" class="hide">
                        <div class="form-group has-feedback">
                            <label for="boxcar_access_token" class="col-sm-4 control-label api-method">Boxcar Access token </label>
                            <div class="col-sm-4">
                                <input id="boxcar_access_token" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-boxcar-config" id="del-boxcar-call" name="del-boxcar-call" data-config_id=""><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-sm-offset-4 col-sm-4">
                                <textarea class="form-control" name="global-config-textarea" id="upd_boxcar_extra" placeholder="Enter the config options" data-config_id="" data-type="boxcar"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Telegram -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#telegram_transport_expand"><i class="fa fa-caret-down"></i> Telegram transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="telegram" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="telegram_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <button class="btn btn-success btn-xs" type="button" name="new_config" id="new_config_item" data-toggle="modal" data-target="#new-config-telegram">Add Telegram config</button>
                        </div>
                    </div>';
$telegram_chatids = get_config_like_name('alert.transports.telegram.%.chat_id');
foreach ($telegram_chatids as $index => $chat_id) {
    $telegram_token   = get_config_by_name('alert.transports.telegram.'.$chat_id['config_id'].'.token');
    echo '<div id="'.$chat_id['config_id'].'">
                        <div class="form-group has-feedback">
                            <label for="telegram_chat_id" class="col-sm-4 control-label">Telegram Chat ID</label>
                            <div class="col-sm-4">
                                <input id="telegram_chat_id" class="form-control" type="text" name="global-config-input" value="'.$chat_id['config_value'].'" data-config_id="'.$chat_id['config_id'].'">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="telegram_token" class="col-sm-4 control-label">Telegram token</label>
                            <div class="col-sm-4">
                                <input id="telegram_token" class="form-control" type="text" name="telegram_token" value="'.$telegram_token['config_value'].'" data-config_id="'.$chat_id['config_id'].'">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-telegram-config" name="del-telegram-call" data-config_id="'.$chat_id['config_id'].'"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                    </div>';
}//end foreach

echo '<div id="telegram_chat_id_template" class="hide">
                        <div class="form-group has-feedback">
                            <label for="telegram_chat_id" class="col-sm-4 control-label api-method">Telegram Chat ID</label>
                            <div class="col-sm-4">
                                <input id="telegram_chat_id" class="form-control" type="text" name="global-config-input" value="" data-config_id="">
                                <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="telegram_token" class="col-sm-4 control-label">Telegram token</label>
                            <div class="col-sm-4">
                                <input id="telegram_token" class="form-control" type="text" name="telegram_token" value="" data-config_id="">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger del-telegram-config" id="del-telegram-call" name="del-telegram-call" data-config_id=""><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pushbullet -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#pushbullet_transport_expand"><i class="fa fa-caret-down"></i> Pushbullet</a> <button name="test-alert" id="test-alert" type="button" data-transport="pushbullet" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="pushbullet_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="pushbullet" class="col-sm-4 control-label">Pushbullet Access Token </label>
                        <div data-toggle="tooltip" title="'.$config_groups['alert.transports.pushbullet']['config_descr'].'" class="toolTip fa fa-question-circle"></div>
                        <div class="col-sm-4">
                            <input id="pushbullet" class="form-control" type="text" name="global-config-input" value="'.$config_groups['alert.transports.pushbullet']['config_value'].'" data-config_id="'.$config_groups['alert.transports.pushbullet']['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#victorops_transport_expand"><i class="fa fa-caret-down"></i> VictorOps</a> <button name="test-alert" id="test-alert" type="button" data-transport="victorops" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="victorops_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="victorops" class="col-sm-4 control-label">Post URL </label>
                        <div data-toggle="tooltip" title="'.$config_groups['alert.transports.victorops.url']['config_descr'].'" class="toolTip fa fa-question-circle"></div>
                        <div class="col-sm-4">
                            <input id="victorops" class="form-control validation" type="text" name="global-config-input" value="'.$config_groups['alert.transports.victorops.url']['config_value'].'" data-config_id="'.$config_groups['alert.transports.victorops.url']['config_id'].'" pattern="[a-zA-Z0-9]{1,5}://.*">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#opsgenie_transport_expand"><i class="fa fa-caret-down"></i> OpsGenie</a> <button name="test-alert" id="test-alert" type="button" data-transport="opsgenie" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
        </div>
        <div id="opsgenie_transport_expand" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="form-group has-feedback">
                    <label for="opsgenie" class="col-sm-4 control-label">OpsGenie URL </label>
                    <div data-toggle="tooltip" title="' . $config_groups['alert.transports.opsgenie.url']['config_descr'] . '" class="toolTip fa fa-question-circle"></div>
                    <div class="col-sm-4">
                        <input id="opsgenie" class="form-control validation" type="text" name="global-config-input" value="' . $config_groups['alert.transports.opsgenie.url']['config_value'] . '" data-config_id="' . $config_groups['alert.transports.opsgenie.url']['config_id'] . '" pattern="[a-zA-Z0-9]{1,5}://.*">
                        <span class="form-control-feedback">
                            <i class="fa" aria-hidden="true"></i>
                        </span>
                    </div>
                    </div>
                </div>
            </div>
        </div>';

$clickatell   = get_config_by_name('alert.transports.clickatell.token');
$mobiles      = get_config_like_name('alert.transports.clickatell.to.%');
$new_mobiles = array();
foreach ($mobiles as $mobile) {
    $new_mobiles[] = $mobile['config_value'];
}
$upd_mobiles = implode(PHP_EOL, $new_mobiles);

echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#clickatell_transport_expand"><i class="fa fa-caret-down"></i> Clickatell transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="clickatell" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="clickatell_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="clickatell_token" class="col-sm-4 control-label">Clickatell Token </label>
                        <div class="col-sm-4">
                            <input id="clickatell_token" class="form-control" type="text" name="global-config-input" value="'.$clickatell['config_value'].'" data-config_id="'.$clickatell['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="clickatell_to" class="col-sm-4 control-label">Mobile numbers</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="global-config-textarea" id="clickatell_to" placeholder="Enter the config options" data-config_id="'.$clickatell['config_id'].'" data-type="clickatell">'.$upd_mobiles.'</textarea>
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
$playsms_url     = get_config_by_name('alert.transports.playsms.url');
$playsms_user    = get_config_by_name('alert.transports.playsms.user');
$playsms_token   = get_config_by_name('alert.transports.playsms.token');
$playsms_from    = get_config_by_name('alert.transports.playsms.from');
$mobiles         = get_config_like_name('alert.transports.playsms.to.%');
$new_mobiles = array();
foreach ($mobiles as $mobile) {
    $new_mobiles[] = $mobile['config_value'];
}
$upd_mobiles = implode(PHP_EOL, $new_mobiles);
echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#playsms_transport_expand"><i class="fa fa-caret-down"></i> PlaySMS transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="playsms" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="playsms_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="playsms_url" class="col-sm-4 control-label">PlaySMS URL </label>
                        <div class="col-sm-4">
                            <input id="playsms_url" class="form-control validation" type="text" name="global-config-input" value="'.$playsms_url['config_value'].'" data-config_id="'.$playsms_url['config_id'].'" pattern="[a-zA-Z0-9]{1,5}://.*">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="playsms_user" class="col-sm-4 control-label">User</label>
                        <div class="col-sm-4">
                            <input id="playsms_user" class="form-control" type="text" name="global-config-input" value="'.$playsms_user['config_value'].'" data-config_id="'.$playsms_user['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="playsms_token" class="col-sm-4 control-label">Token</label>
                        <div class="col-sm-4">
                            <input id="playsms_token" class="form-control" type="text" name="global-config-input" value="'.$playsms_token['config_value'].'" data-config_id="'.$playsms_token['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="playsms_from" class="col-sm-4 control-label">From</label>
                        <div class="col-sm-4">
                            <input id="playsms_from" class="form-control" type="text" name="global-config-input" value="'.$playsms_from['config_value'].'" data-config_id="'.$playsms_from['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="clickatell_to" class="col-sm-4 control-label">Mobiles</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="global-config-textarea" id="playsms_to" placeholder="Enter the config options" data-config_id="'.$playsms_url['config_id'].'" data-type="playsms">'.$upd_mobiles.'</textarea>
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
$canopsis_host   = get_config_by_name('alert.transports.canopsis.host');
$canopsis_port   = get_config_by_name('alert.transports.canopsis.port');
$canopsis_user   = get_config_by_name('alert.transports.canopsis.user');
$canopsis_passwd = get_config_by_name('alert.transports.canopsis.passwd');
$canopsis_vhost  = get_config_by_name('alert.transports.canopsis.vhost');
echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#canopsis_transport_expand"><i class="fa fa-caret-down"></i> Canopsis transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="canopsis" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="canopsis_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="canopsis_host" class="col-sm-4 control-label">Canopsis Hostname </label>
                        <div class="col-sm-4">
                            <input id="canopsis_host" class="form-control validation" type="text" name="global-config-input" value="'.$canopsis_host['config_value'].'" data-config_id="'.$canopsis_host['config_id'].'" pattern="[a-zA-Z0-9_\-\.]+">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="canopsis_port" class="col-sm-4 control-label">Canopsis Port number </label>
                        <div class="col-sm-4">
                            <input id="canopsis_port" class="form-control" type="text" name="global-config-input" value="'.$canopsis_port['config_value'].'" data-config_id="'.$canopsis_port['config_id'].'" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="canopsis_user" class="col-sm-4 control-label">User</label>
                        <div class="col-sm-4">
                            <input id="canopsis_user" class="form-control" type="text" name="global-config-input" value="'.$canopsis_user['config_value'].'" data-config_id="'.$canopsis_user['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="canopsis_passwd" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-4">
                            <input id="canopsis_passwd" class="form-control" type="password" name="global-config-input" value="'.$canopsis_passwd['config_value'].'" data-config_id="'.$canopsis_passwd['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="canopsis_vhost" class="col-sm-4 control-label">Vhost</label>
                        <div class="col-sm-4">
                            <input id="canopsis_vhost" class="form-control validation" type="text" name="global-config-input" value="'.$canopsis_vhost['config_value'].'" data-config_id="'.$canopsis_vhost['config_id'].'" pattern="[a-zA-Z0-9_\-\.]+">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
$osticket_url   = get_config_by_name('alert.transports.osticket.url');
$osticket_token   = get_config_by_name('alert.transports.osticket.token');
echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#osticket_transport_expand"><i class="fa fa-caret-down"></i> osTicket transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="osticket" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="osticket_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="osticket_url" class="col-sm-4 control-label">osTicket API URL</label>
                        <div class="col-sm-4">
                            <input id="osticket_url" class="form-control validation" type="text" name="global-config-input" value="'.$osticket_url['config_value'].'" data-config_id="'.$osticket_url['config_id'].'" pattern="[a-zA-Z0-9]{1,5}://.*">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="osticket_token" class="col-sm-4 control-label">osTicket API Token</label>
                        <div class="col-sm-4">
                            <input id="osticket_token" class="form-control" type="text" name="global-config-input" value="'.$osticket_token['config_value'].'" data-config_id="'.$osticket_token['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
$msteams_url   = get_config_by_name('alert.transports.msteams.url');
echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#msteams_transport_expand"><i class="fa fa-caret-down"></i> Microsoft Teams transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="msteams" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="msteams_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="msteams_url" class="col-sm-4 control-label">Microsoft Teams Webhook URL</label>
                        <div class="col-sm-4">
                            <input id="msteams_url" class="form-control validation" type="text" name="global-config-input" value="'.$msteams_url['config_value'].'" data-config_id="'.$msteams_url['config_id'].'" pattern="[a-zA-Z0-9]{1,5}://.*">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
$ciscospark_token   = get_config_by_name('alert.transports.ciscospark.token');
$ciscospark_roomid   = get_config_by_name('alert.transports.ciscospark.roomid');
echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#ciscospark_transport_expand"><i class="fa fa-caret-down"></i> Cisco Spark transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="ciscospark" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="ciscospark_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="ciscospark_token" class="col-sm-4 control-label">Cisco Spark API Token</label>
                        <div class="col-sm-4">
                            <input id="ciscospark_token" class="form-control" type="text" name="global-config-input" value="'.$ciscospark_token['config_value'].'" data-config_id="'.$ciscospark_token['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="ciscospark_roomid" class="col-sm-4 control-label">Cisco Spark RoomID</label>
                        <div class="col-sm-4">
                            <input id="ciscospark_roomid" class="form-control" type="text" name="global-config-input" value="'.$ciscospark_roomid['config_value'].'" data-config_id="'.$ciscospark_roomid['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
$smseagle_url     = get_config_by_name('alert.transports.smseagle.url');
$smseagle_user    = get_config_by_name('alert.transports.smseagle.user');
$smseagle_token   = get_config_by_name('alert.transports.smseagle.token');
$mobiles         = get_config_like_name('alert.transports.smseagle.to.%');
$new_mobiles = array();
foreach ($mobiles as $mobile) {
    $new_mobiles[] = $mobile['config_value'];
}
$upd_mobiles = implode(PHP_EOL, $new_mobiles);
echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#smseagle_transport_expand"><i class="fa fa-caret-down"></i> SMSEagle transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="smseagle" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="smseagle_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="smseagle_url" class="col-sm-4 control-label">SMSEagle URL </label>
                        <div class="col-sm-4">
                            <input id="smseagle_url" class="form-control validation" type="text" name="global-config-input" value="'.$smseagle_url['config_value'].'" data-config_id="'.$smseagle_url['config_id'].'" pattern="[a-zA-Z0-9]{1,5}://.*">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="smseagle_user" class="col-sm-4 control-label">User</label>
                        <div class="col-sm-4">
                            <input id="smseagle_user" class="form-control" type="text" name="global-config-input" value="'.$smseagle_user['config_value'].'" data-config_id="'.$smseagle_user['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="smseagle_token" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-4">
                            <input id="smseagle_token" class="form-control" type="text" name="global-config-input" value="'.$smseagle_token['config_value'].'" data-config_id="'.$smseagle_token['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="smseagle_to" class="col-sm-4 control-label">Mobiles</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="global-config-textarea" id="smseagle_to" placeholder="Enter mobile phone numbers, one per line" data-config_id="'.$smseagle_url['config_id'].'" data-type="smseagle">'.$upd_mobiles.'</textarea>
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
$syslog_host     = get_config_by_name('alert.transports.syslog.syslog_host');
$syslog_port    = get_config_by_name('alert.transports.syslog.syslog_port');
$syslog_facility   = get_config_by_name('alert.transports.syslog.syslog_facility');
echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#syslog_transport_expand"><i class="fa fa-caret-down"></i> Syslog transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="syslog" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="syslog_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="syslog_host" class="col-sm-4 control-label">Syslog Host </label>
                        <div class="col-sm-4">
                            <input id="syslog_host" class="form-control validation" type="text" name="global-config-input" value="'.$syslog_host['config_value'].'" data-config_id="'.$syslog_host['config_id'].'" pattern="[a-zA-Z0-9_\-\.]+">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="syslog_port" class="col-sm-4 control-label">Syslog Port </label>
                        <div class="col-sm-4">
                            <input id="syslog_port" class="form-control" type="text" name="global-config-input" value="'.$syslog_port['config_value'].'" data-config_id="'.$syslog_port['config_id'].'" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="syslog_facility" class="col-sm-4 control-label">Syslog Facility </label>
                        <div class="col-sm-4">
                            <input id="syslog_facility" class="form-control" type="text" name="global-config-input" value="'.$syslog_facility['config_value'].'" data-config_id="'.$syslog_facility['config_id'].'" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
    </div>';
// Gitlab Transport Section

$gitlab_host = get_config_by_name('alert.transports.gitlab.host');
$gitlab_project = get_config_by_name('alert.transports.gitlab.project_id');
$gitlab_key = get_config_by_name('alert.transports.gitlab.key');
echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#gitlab_transport_expand"><i class="fa fa-caret-down"></i> Gitlab transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="gitlab" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="gitlab_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="gitlab_host" class="col-sm-4 control-label">Gitlab Host</label>
                        <div class="col-sm-4">
                            <input id="gitlab_host" class="form-control validation" type="url" name="global-config-input" value="'.$gitlab_host['config_value'].'" data-config_id="'.$gitlab_host['config_id'].'" pattern="[a-zA-Z0-9]{1,5}://.*">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="gitlab_project" class="col-sm-4 control-label">Gitlab Project ID</label>
                        <div class="col-sm-4">
                            <input id="gitlab_project" class="form-control" type="text" name="global-config-input" value="'.$gitlab_project['config_value'].'" data-config_id="'.$gitlab_project['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="gitlab_key" class="col-sm-4 control-label">Gitlab API Key</label>
                        <div class="col-sm-4">
                            <input id="gitlab_key" class="form-control" type="text" name="global-config-input" value="'.$gitlab_key['config_value'].'" data-config_id="'.$gitlab_key['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

        // Philips Hue Transport Section

$hue_bridge = get_config_by_name('alert.transports.hue.bridge');
$hue_user = get_config_by_name('alert.transports.hue.user');
$hue_duration = get_config_by_name('alert.transports.hue.duration');
echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#hue_transport_expand"><i class="fa fa-caret-down"></i> Philips Hue transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="hue" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="hue_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="hue_host" class="col-sm-4 control-label">Hue Host</label>
                        <div class="col-sm-4">
                            <input id="hue_host" class="form-control validation" type="url" name="global-config-input" value="'.$hue_bridge['config_value'].'" data-config_id="'.$hue_bridge['config_id'].'" pattern="[a-zA-Z0-9]{1,5}://.*">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="hue_user" class="col-sm-4 control-label">Philips Hue User</label>
                        <div class="col-sm-4">
                            <input id="hue_user" class="form-control" type="text" name="global-config-input" value="'.$hue_user['config_value'].'" data-config_id="'.$hue_user['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="hue_duration" class="col-sm-4 control-label">Philips Hue Duration</label>
                        <div class="col-sm-4">
                            <select id="hue_duration" class="form-control" name="global-config-select" data-config_id="'.$hue_duration['config_id'].'">
                                <option '.( $hue_duration['config_value'] == "" ? "selected" : ""). ' value=""></option>
                                <option '.( $hue_duration['config_value'] == "select" ? "selected" : ""). ' value="select">1 Second</option>
                                <option '.( $hue_duration['config_value'] == "lselect" ? "selected" : ""). ' value="lselect">15 Seconds</option>
                            </select>
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';


// Jira Transport Section
$jira_prj     = get_config_by_name('alert.transports.jira.prjkey');
$jira_url    = get_config_by_name('alert.transports.jira.url');
$jira_username   = get_config_by_name('alert.transports.jira.username');
$jira_password   = get_config_by_name('alert.transports.jira.password');
$jira_issuetype = get_config_by_name('alert.transports.jira.issuetype');
echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#jira_transport_expand"><i class="fa fa-caret-down"></i> Jira transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="jira" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="jira_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="jira_prj" class="col-sm-4 control-label">Jira Project Key </label>
                        <div class="col-sm-4">
                            <input id="jira_prj" class="form-control" type="text" name="global-config-input" value="'.$jira_prj['config_value'].'" data-config_id="'.$jira_prj['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="jira_url" class="col-sm-4 control-label">Jira URL </label>
                        <div class="col-sm-4">
                            <input id="jira_url" class="form-control validation" type="url" name="global-config-input" value="'.$jira_url['config_value'].'" data-config_id="'.$jira_url['config_id'].'" pattern="[a-zA-Z0-9]{1,5}://.*">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="jira_issuetype" class="col-sm-4 control-label">Jira Issue Type </label>
                        <div class="col-sm-4">
                            <input id="jira_issuetype" class="form-control" type="text" name="global-config-input" value="'.$jira_issuetype['config_value'].'" data-config_id="'.$jira_issuetype['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="jira_username" class="col-sm-4 control-label">Jira Username </label>
                        <div class="col-sm-4">
                            <input id="jira_username" class="form-control" type="text" name="global-config-input" value="'.$jira_username['config_value'].'" data-config_id="'.$jira_username['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="jira_password" class="col-sm-4 control-label">Jira Password </label>
                        <div class="col-sm-4">
                            <input id="jira_password" class="form-control" type="password" name="global-config-input" value="'.$jira_password['config_value'].'" data-config_id="'.$jira_password['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

// End Jira Transport Section

$es_host     = get_config_by_name('alert.transports.elasticsearch.es_host');
$es_port    = get_config_by_name('alert.transports.elasticsearch.es_port');
$es_index    = get_config_by_name('alert.transports.elasticsearch.es_index');
$es_proxy   = get_config_by_name('alert.transports.elasticsearch.es_proxy');
echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#es_transport_expand"><i class="fa fa-caret-down"></i> Elasticsearch transport</a> <button name="test-alert" id="test-alert" type="button" data-transport="elasticsearch" class="btn btn-primary btn-xs pull-right">Test transport</button>
                </h4>
            </div>
            <div id="es_transport_expand" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group has-feedback">
                        <label for="es_host" class="col-sm-4 control-label">Elasticsearch Host </label>
                        <div class="col-sm-4">
                            <input id="es_host" class="form-control validation" type="text" name="global-config-input" value="'.$es_host['config_value'].'" data-config_id="'.$es_host['config_id'].'" pattern="[a-zA-Z0-9_\-\.]+">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="es_port" class="col-sm-4 control-label">Elasticsearch Port </label>
                        <div class="col-sm-4">
                            <input id="es_port" class="form-control" type="text" name="global-config-input" value="'.$es_port['config_value'].'" data-config_id="'.$es_port['config_id'].'" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="es_index" class="col-sm-4 control-label">Elasticsearch Index Pattern </label>
                        <div class="col-sm-4">
                            <input id="es_index" class="form-control" type="text" name="global-config-input" value="'.$es_index['config_value'].'" data-config_id="'.$es_index['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="es_proxy" class="col-sm-4 control-label">Use proxy if configured? </label>
                        <div class="col-sm-4">
                            <input id="es_proxy" type="checkbox" name="global-config-check" '.$es_proxy['config_value'].' data-on-text="Yes" data-off-text="No" data-size="small" data-config_id="'.$es_proxy['config_id'].'">
                            <span class="form-control-feedback">
    <i class="fa" aria-hidden="true"></i>
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
';

?>

<script>

    <?php
    if (isset($_GET['service_key']) || isset($vars['del_pagerduty'])) {
        echo "$('#pagerduty_transport_expand').collapse('show');";
    }
    ?>

    $(".toolTip").tooltip();

    $("button#test-alert").click(function() {
        var $this = $(this);
        var transport = $this.data("transport");
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: { type: "test-transport", transport: transport },
            dataType: "json",
            success: function(data){
                if (data.status === 'ok') {
                    toastr.success('Test to ' + transport + ' ok');
                } else {
                    toastr.error('Test to ' + transport + ' failed<br />' + data.message);
                }
            },
            error: function(){
                toastr.error('Test to ' + transport + ' failed - general error');
            }
        });
    });

    apiIndex = 0;

    // Add API config
    $("button#submit").click(function(){
        var config_name = 'alert.transports.api.'+$('#new_method').val()+'.';
        var new_api_method = $('#new_method').val();
        var config_value = $('#new_conf_value').val();
        $.ajax({
            type: "POST",
            url: "ajax_form.php",
            data: {type: "config-item", config_group: "alerting", config_sub_group: "transports", config_name: config_name, config_value: config_value},
            dataType: "json",
            success: function(data){
                if (data.status == 'ok') {
                    apiIndex++;
                    var $template = $('#api_url_template'),
                        $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .attr('id',data.config_id)
                            .attr('api-url-index', apiIndex)
                            .insertBefore($template);
                        $clone.find('[name="global-config-input"]').attr('data-config_id',data.config_id);
                        $clone.find('[name="del-api-call"]').attr('data-config_id',data.config_id);
                        $clone.find('[name="global-config-input"]').attr('value', config_value);
                        $clone.find('.api-method').text("API URL (" + new_api_method + ")");
                    console.log(new_api_method);
                    $("#new-config-api").modal('hide');
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function(){
                $("#message").html('<div class="alert alert-danger">Error creating config item</div>');
            }
        });
    });// End Add API config

    // Add Slack config
    slackIndex = 0;
    $("button#submit-slack").click(function(){
        var config_value = $('#slack_value').val();
        var config_extra = $('#slack_extra').val();
        $.ajax({
            type: "POST",
            url: "ajax_form.php",
            data: {type: "config-item", action: 'add-slack', config_group: "alerting", config_sub_group: "transports", config_extra: config_extra, config_value: config_value},
            dataType: "json",
            success: function(data){
                if (data.status == 'ok') {
                    slackIndex++;
                    var $template = $('#slack_url_template'),
                        $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .attr('id',data.config_id)
                            .attr('slack-url-index', slackIndex)
                            .insertBefore($template);
                        $clone.find('[name="global-config-input"]').attr('data-config_id',data.config_id);
                        $clone.find('[name="del-slack-call"]').attr('data-config_id',data.config_id);
                        $clone.find('[name="global-config-input"]').attr('value', config_value);
                        $clone.find('[name="global-config-textarea"]').val(config_extra);
                        $clone.find('[name="global-config-textarea"]').attr('data-config_id',data.config_id);
                    $("#new-config-slack").modal('hide');
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function(){
                $("#message").html('<div class="alert alert-danger">Error creating config item</div>');
            }
        });
    });// End Add Slack config

    // Add Discord config
    discordIndex = 0;
    $("button#submit-discord").click(function(){
        var config_value = $('#discord_value').val();
        var config_extra = $('#discord_extra').val();
        $.ajax({
            type: "POST",
            url: "ajax_form.php",
            data: {type: "config-item", action: 'add-discord', config_group: "alerting", config_sub_group: "transports", config_extra: config_extra, config_value: config_value},
            dataType: "json",
            success: function(data){
                if (data.status == 'ok') {
                    discordIndex++;
                    var $template = $('#discord_url_template'),
                        $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .attr('id',data.config_id)
                            .attr('discord-url-index', discordIndex)
                            .insertBefore($template);
                        $clone.find('[name="global-config-input"]').attr('data-config_id',data.config_id);
                        $clone.find('[name="del-discord-call"]').attr('data-config_id',data.config_id);
                        $clone.find('[name="global-config-input"]').attr('value', config_value);
                        $clone.find('[name="global-config-textarea"]').val(config_extra);
                        $clone.find('[name="global-config-textarea"]').attr('data-config_id',data.config_id);
                    $("#new-config-discord").modal('hide');
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function(){
                $("#message").html('<div class="alert alert-danger">Error creating config item</div>');
            }
        });
    });// End Add Discord config

    // Add RocketChat config
    rocketIndex = 0;
    $("button#submit-rocket").click(function(){
        var config_value = $('#rocket_value').val();
        var config_extra = $('#rocket_extra').val();
        $.ajax({
            type: "POST",
            url: "ajax_form.php",
            data: {type: "config-item", action: 'add-rocket', config_group: "alerting", config_sub_group: "transports", config_extra: config_extra, config_value: config_value},
            dataType: "json",
            success: function(data){
                if (data.status == 'ok') {
                    rocketIndex++;
                    var $template = $('#rocket_url_template'),
                        $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .attr('id',data.config_id)
                            .attr('rocket-url-index', rocketIndex)
                            .insertBefore($template);
                        $clone.find('[name="global-config-input"]').attr('data-config_id',data.config_id);
                        $clone.find('[name="del-rocket-call"]').attr('data-config_id',data.config_id);
                        $clone.find('[name="global-config-input"]').attr('value', config_value);
                        $clone.find('[name="global-config-textarea"]').val(config_extra);
                        $clone.find('[name="global-config-textarea"]').attr('data-config_id',data.config_id);
                    $("#new-config-rocket").modal('hide');
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function(){
                $("#message").html('<div class="alert alert-danger">Error creating config item</div>');
            }
        });
    });// End Add Slack config

    // Add Hipchat config
    hipchatIndex = 0;
    $("button#submit-hipchat").click(function(){
        var config_value = $('#hipchat_value').val();
        var config_extra = $('#hipchat_extra').val();
        var config_room_id = $('#new_room_id').val();
        var config_from = $('#new_from').val();
        $.ajax({
            type: "POST",
            url: "ajax_form.php",
            data: {type: "config-item", action: 'add-hipchat', config_group: "alerting", config_sub_group: "transports", config_extra: config_extra, config_value: config_value, config_room_id: config_room_id, config_from: config_from},
            dataType: "json",
            success: function(data){
                if (data.status == 'ok') {
                    hipchatIndex++;
                    var $template = $('#hipchat_url_template'),
                        $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .attr('id',data.config_id)
                            .attr('hipchat-url-index', hipchatIndex)
                            .insertBefore($template);
                        $clone.find('[id="hipchat_url"]').attr('data-config_id',data.config_id);
                        $clone.find('[id="del-hipchat-call"]').attr('data-config_id',data.config_id);
                        $clone.find('[name="global-config-input"]').attr('value', config_value);
                        $clone.find('[id="global-config-room_id"]').attr('value', config_room_id);
                        $clone.find('[id="global-config-from"]').attr('value', config_from);
                        $clone.find('[id="upd_hipchat_extra"]').val(config_extra);
                        $clone.find('[id="upd_hipchat_extra"]').attr('data-config_id',data.config_id);
                    $("#new-config-hipchat").modal('hide');
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function(){
                $("#message").html('<div class="alert alert-danger">Error creating config item</div>');
            }
        });
    });// End Add Hipchat config

    // Add Pushover config
    pushoverIndex = 0;
    $("button#submit-pushover").click(function(){
        var config_value = $('#pushover_value').val();
        var config_extra = $('#pushover_extra').val();
        var config_userkey = $('#new_userkey').val();
        $.ajax({
            type: "POST",
            url: "ajax_form.php",
            data: {type: "config-item", action: 'add-pushover', config_group: "alerting", config_sub_group: "transports", config_extra: config_extra, config_value: config_value, config_userkey: config_userkey},
            dataType: "json",
            success: function(data){
                if (data.status == 'ok') {
                    pushoverIndex++;
                    var $template = $('#pushover_appkey_template'),
                        $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .attr('id',data.config_id)
                            .attr('pushover-appkey-index', pushoverIndex)
                            .insertBefore($template);
                    $clone.find('[id="pushover_appkey"]').attr('data-config_id',data.config_id);
                    $clone.find('[id="del-pushover-call"]').attr('data-config_id',data.config_id);
                    $clone.find('[name="global-config-input"]').attr('value', config_value);
                    $clone.find('[id="global-config-userkey"]').attr('value', config_userkey);
                    $clone.find('[id="global-config-userkey"]').attr('data-config_id',data.additional_id['userkey']);
                    $clone.find('[id="upd_pushover_extra"]').val(config_extra);
                    $clone.find('[id="upd_pushover_extra"]').attr('data-config_id',data.config_id);
                    $("#new-config-pushover").modal('hide');
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function(){
                $("#message").html('<div class="alert alert-danger">Error creating config item</div>');
            }
        });
    });// End Add Pushover config

    // Add ShellExec config
    itemIndex = 0;
    $("button#submit-shellexec").click(function(){
        var config_value = $('#shellexec_identifier').val();
        var config_path = $('#shellexec_path').val();
        var config_extra = $('#shellexec_extra').val();
        $.ajax({
            type: "POST",
            url: "ajax_form.php",
            data: {type: "config-item", action: 'add-shellexec', config_group: "alerting", config_sub_group: "transports", config_extra: config_extra, config_value: config_value, config_path: config_path},
            dataType: "json",
            success: function(data){
                if (data.status == 'ok') {
                    itemIndex++;
                    var $template = $('#shellexec_appkey_template'),
                        $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .attr('id',data.config_id)
                            .attr('shellexec-appkey-index', itemIndex)
                            .insertBefore($template);
                    $clone.find('[id="shellexec_identifier"]').attr('data-config_id',data.config_id);
                    $clone.find('[id="del-shellexec-call"]').attr('data-config_id',data.config_id);
                    $clone.find('[name="global-config-input"]').attr('value', config_value);
                    $clone.find('[id="shellexec_path"]').val(config_path);
                    $clone.find('[id="shellexec_path"]').attr('data-config_id',data.config_id);
                    $clone.find('[id="shellexec_extra"]').val(config_extra);
                    $clone.find('[id="shellexec_extra"]').attr('data-config_id',data.config_id);
                    $("#new-config-shellexec").modal('hide');
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function(){
                $("#message").html('<div class="alert alert-danger">Error creating config item</div>');
            }
        });
    });// End Add ShellExec config


    // Add Boxcar config
    itemIndex = 0;
    $("button#submit-boxcar").click(function(){
        var config_value = $('#boxcar_value').val();
        var config_extra = $('#boxcar_extra').val();
        $.ajax({
            type: "POST",
            url: "ajax_form.php",
            data: {type: "config-item", action: 'add-boxcar', config_group: "alerting", config_sub_group: "transports", config_extra: config_extra, config_value: config_value},
            dataType: "json",
            success: function(data){
                if (data.status == 'ok') {
                    itemIndex++;
                    var $template = $('#boxcar_appkey_template'),
                        $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .attr('id',data.config_id)
                            .attr('boxcar-appkey-index', itemIndex)
                            .insertBefore($template);
                    $clone.find('[id="boxcar_access_token"]').attr('data-config_id',data.config_id);
                    $clone.find('[id="del-boxcar-call"]').attr('data-config_id',data.config_id);
                    $clone.find('[name="global-config-input"]').attr('value', config_value);
                    $clone.find('[id="upd_boxcar_extra"]').val(config_extra);
                    $clone.find('[id="upd_boxcar_extra"]').attr('data-config_id',data.config_id);
                    $("#new-config-boxcar").modal('hide');
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function(){
                $("#message").html('<div class="alert alert-danger">Error creating config item</div>');
            }
        });
    });// End Add Boxcar config


    // Add Telegram config
    itemIndex = 0;
    $("button#submit-telegram").click(function(){
        var config_value = $('#telegram_value').val();
        var config_extra = $('#telegram_token').val();
        $.ajax({
            type: "POST",
            url: "ajax_form.php",
            data: {type: "config-item", action: 'add-telegram', config_group: "alerting", config_sub_group: "transports", config_extra: config_extra, config_value: config_value},
            dataType: "json",
            success: function(data){
                if (data.status == 'ok') {
                    itemIndex++;
                    var $template = $('#telegram_chat_id_template'),
                        $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .attr('id',data.config_id)
                            .attr('telegram-appkey-index', itemIndex)
                            .insertBefore($template);
                    $clone.find('[id="telegram_chat_id"]').attr('data-config_id',data.config_id);
                    $clone.find('[id="del-telegram-call"]').attr('data-config_id',data.config_id);
                    $clone.find('[name="global-config-input"]').attr('value', config_value);
                    $clone.find('[name="telegram_token"]').attr('value', config_extra);
                    $("#new-config-telegram").modal('hide');
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function(){
                $("#message").html('<div class="alert alert-danger">Error creating config item</div>');
            }
        });
    });// End Add Telegram config

    // Delete api config
    $(document).on('click', 'button[name="del-api-call"]', function(event) {
        var config_id = $(this).data('config_id');
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "config-item", action: 'remove', config_id: config_id},
            dataType: "json",
            success: function (data) {
                if (data.status == 'ok') {
                    $("#"+config_id).remove();
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function () {
                $("#message").html('<div class="alert alert-danger">An error occurred.</div>');
            }
        });
    });// End delete api config

    // Delete slack config
    $(document).on('click', 'button[name="del-slack-call"]', function(event) {
        var config_id = $(this).data('config_id');
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "config-item", action: 'remove-slack', config_id: config_id},
            dataType: "json",
            success: function (data) {
                if (data.status == 'ok') {
                    $("#"+config_id).remove();
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function () {
                $("#message").html('<div class="alert alert-danger">An error occurred.</div>');
            }
        });
    });// End delete slack config

    // Delete discord config
    $(document).on('click', 'button[name="del-discord-call"]', function(event) {
        var config_id = $(this).data('config_id');
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "config-item", action: 'remove-discord', config_id: config_id},
            dataType: "json",
            success: function (data) {
                if (data.status == 'ok') {
                    $("#"+config_id).remove();
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function () {
                $("#message").html('<div class="alert alert-danger">An error occurred.</div>');
            }
        });
    });// End delete discord config

    // Delete Rocket.Chat config
    $(document).on('click', 'button[name="del-rocket-call"]', function(event) {
        var config_id = $(this).data('config_id');
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "config-item", action: 'remove-rocket', config_id: config_id},
            dataType: "json",
            success: function (data) {
                if (data.status == 'ok') {
                    $("#"+config_id).remove();
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function () {
                $("#message").html('<div class="alert alert-danger">An error occurred.</div>');
            }
        });
    });// End delete rocket config

    // Delete hipchat config
    $(document).on('click', 'button[name="del-hipchat-call"]', function(event) {
        var config_id = $(this).data('config_id');
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "config-item", action: 'remove-hipchat', config_id: config_id},
            dataType: "json",
            success: function (data) {
                if (data.status == 'ok') {
                    $("#"+config_id).remove();
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function () {
                $("#message").html('<div class="alert alert-danger">An error occurred.</div>');
            }
        });
    });// End delete hipchat config

    // Delete pushover config
    $(document).on('click', 'button[name="del-pushover-call"]', function(event) {
        var config_id = $(this).data('config_id');
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "config-item", action: 'remove-pushover', config_id: config_id},
            dataType: "json",
            success: function (data) {
                if (data.status == 'ok') {
                    $("#"+config_id).remove();
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function () {
                $("#message").html('<div class="alert alert-danger">An error occurred.</div>');
            }
        });
    });// End delete pushover config

    // Delete ShellExec config
    $(document).on('click', 'button[name="del-shellexec-call"]', function(event) {
        var config_id = $(this).data('config_id');
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "config-item", action: 'remove-shellexec', config_id: config_id},
            dataType: "json",
            success: function (data) {
                if (data.status == 'ok') {
                    $("#"+config_id).remove();
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function () {
                $("#message").html('<div class="alert alert-danger">An error occurred.</div>');
            }
        });
    });// End delete Boxcar config

    // Delete Boxcar config
    $(document).on('click', 'button[name="del-boxcar-call"]', function(event) {
        var config_id = $(this).data('config_id');
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "config-item", action: 'remove-boxcar', config_id: config_id},
            dataType: "json",
            success: function (data) {
                if (data.status == 'ok') {
                    $("#"+config_id).remove();
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function () {
                $("#message").html('<div class="alert alert-danger">An error occurred.</div>');
            }
        });
    });// End delete Boxcar config


    // Delete Telegram config
    $(document).on('click', 'button[name="del-telegram-call"]', function(event) {
        var config_id = $(this).data('config_id');
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "config-item", action: 'remove-telegram', config_id: config_id},
            dataType: "json",
            success: function (data) {
                if (data.status == 'ok') {
                    $("#"+config_id).remove();
                } else {
                    $("#message").html('<div class="alert alert-info">' + data.message + '</div>');
                }
            },
            error: function () {
                $("#message").html('<div class="alert alert-danger">An error occurred.</div>');
            }
        });
    });// End delete Telegram config

    $( 'select[name="global-config-select"]').change(function(event) {
        event.preventDefault();
        var $this = $(this);
        var config_id = $this.data("config_id");
        var config_value = $this.val();
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "update-config-item", config_id: config_id, config_value: config_value},
            dataType: "json",
            success: function (data) {
                if (data.status == 'ok') {
                    $this.closest('.form-group').addClass('has-success');
                    $this.next().addClass('fa-check');
                    setTimeout(function(){
                        $this.closest('.form-group').removeClass('has-success');
                        $this.next().removeClass('fa-check');
                    }, 2000);
                } else {
                    $(this).closest('.form-group').addClass('has-error');
                    $this.next().addClass('fa-times');
                    setTimeout(function(){
                        $this.closest('.form-group').removeClass('has-error');
                        $this.next().removeClass('fa-times');
                    }, 2000);
                }
            },
            error: function () {
                $("#message").html('<div class="alert alert-danger">An error occurred.</div>');
            }
        });
    });

    $(document).on('blur', 'textarea[name="global-config-textarea"]', function(event) {
        event.preventDefault();
        var $this = $(this);
        var config_id = $this.data("config_id");
        var config_value = $this.val();
        var config_type = $this.data("type");
        $.ajax({
            type: 'POST',
            url: 'ajax_form.php',
            data: {type: "update-config-item", action: 'update-textarea', config_type: config_type, config_id: config_id, config_value: config_value},
            dataType: "json",
            success: function (data) {
                if (data.status == 'ok') {
                    $this.closest('.form-group').addClass('has-success');
                    $this.next().addClass('fa-check');
                    setTimeout(function(){
                        $this.closest('.form-group').removeClass('has-success');
                        $this.next().removeClass('fa-check');
                    }, 2000);
                } else {
                    $(this).closest('.form-group').addClass('has-error');
                    $this.next().addClass('fa-times');
                    setTimeout(function(){
                        $this.closest('.form-group').removeClass('has-error');
                        $this.next().removeClass('fa-times');
                    }, 2000);
                }
            },
            error: function () {
                $("#message").html('<div class="alert alert-danger">An error occurred.</div>');
            }
        });
    });
</script>

