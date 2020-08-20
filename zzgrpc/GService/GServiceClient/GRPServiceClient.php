<?php
/**
 * Created by PhpStorm.
 * User: dongzhou
 * Date: 2020/8/20
 * Time: 3:40 PM
 */

namespace GrpServiceClient\GServiceClient;


interface GRPServiceClient {
    //获取GRPC 客户端实例
    public static function buildClient($hostName, $opts, $channel, $timeOut);
}