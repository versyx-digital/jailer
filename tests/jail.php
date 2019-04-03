<?php
/**
 * Cophi PHP Jailer test.
 *
 * @author Chris Rowles
 * @package Cophi
 */

use Crowles\Cophi\Jailer;

require __DIR__ . '/../config/bootstrap.php';

init(new Jailer(), "7.3.3", true);

/**
 *
 * init test method.
 *
 * @param Jailer $jailer
 * @param $version
 * @param bool $debug
 */
function init(Jailer $jailer, $version, $debug = false)
{
    $jailer->setDebug($debug);

    $php = ['version' => $version];
    $deploy_path = "/tmp/php-{$php['version']}";

    try {
        $jailer->deploy($deploy_path);
    } catch (Exception $e) {
        echo "ERROR: [JAILER] {$e->getMessage()}";
        exit;
    }
}