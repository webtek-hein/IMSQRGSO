<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: markr
 * Date: 26/07/2017
 * Time: 7:15 PM
 */

$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
$config['newline']  = "\r\n";
$config['mailtype'] = 'text';

$config['protocol'] = 'smtp';
$config['smtp_host']='smtp.gmail.com';
$config['smtp_port']='465';
$config['smtp_user'] = 'emailpassswordsup@gmail.com';
$config['smtp_pass'] = 'adminadmin123';
$config['smtp_crypto'] = 'ssl';

