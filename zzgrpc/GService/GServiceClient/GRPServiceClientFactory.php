<?php
/**
 * Created by PhpStorm.
 * User: dongzhou
 * Date: 2020/8/20
 * Time: 3:33 PM
 */

namespace GrpServiceClient\GServiceClient;

interface GRPServiceClientFactory {

    public function createGoGrpcClient($hostName, $opts, $channel = "",
        $timeOut = 1000000);

    public function createJavaGrpcClient();

    public function createPythonGrpcClient();

}