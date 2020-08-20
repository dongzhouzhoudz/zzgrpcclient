<?php
/**
 * Created by PhpStorm.
 * User: dongzhou
 * Date: 2020/8/20
 * Time: 4:01 PM
 */

namespace GrpServiceClient;


interface GRPService {
    public function sendRequestAndReturn($serviceName, $mothodName, $paramJson);
}