<?php
/**
 * Created by PhpStorm.
 * User: dongzhou
 * Date: 2020/8/20
 * Time: 3:44 PM
 */

namespace GrpServiceClient\GServiceClient;


use GrpServiceClient\GRPService;
use GrpServiceClient\GRPServiceForGo;

class GRPServiceClientForGo implements GRPServiceClient {

    private static $_goClientInstanceList;

    /**
     * @param        $hostName
     * @param        $opts
     * @param string $channel
     * @param int    $timeOut
     *
     * @return GRPServiceForGo
     * 创建GO GRPC 终端CLIENT
     */
    public static function buildClient($hostName, $opts, $channel, $timeOut) {
        // TODO: Implement buildClient() method.
        if ( ! isset(self::$_goClientInstanceList[$hostName]) ||
            ! self::$_goClientInstanceList[$hostName] instanceof GRPService) {
            $goClient = new GRPServiceForGo($hostName, $opts, $channel,
                $timeOut);
            self::$_goClientInstanceList[$hostName] = $goClient;

            return $goClient;
        } else {
            return self::$_goClientInstanceList[$hostName];
        }
    }
}