<?php
/**
 * Created by PhpStorm.
 * User: dongzhou
 * Date: 2020/8/7
 * Time: 6:12 PM
 */

namespace GrpServiceClient;

use \GrpServiceProto\ServiceRequest;
use \GrpServiceProto\GrpServiceProtoClient;

class GRPServiceForGo {
    //GRPC 终端调用Client
    protected $grpcClient;

    /**
     * GRPServiceForGo constructor.
     *
     * @param $hostName
     * @param $opts
     * @param $channel
     * @param $timeOut
     * 类初始化创建
     */
    public function __construct($hostName, $opts, $channel, $timeOut) {
        $this->grpcClient = new GrpServiceProtoClient($hostName,
            ['credentials' => \Grpc\ChannelCredentials::createInsecure(),
             'timeout'     => $timeOut,]);
    }

    /**
     * @param $serviceName
     * @param $mothodName
     * @param $paramJson
     *
     * @return array
     * Grpc 调用结果返回
     */
    public function sendRequestAndReturn($serviceName, $mothodName,
        $paramJson) {
        $request = new ServiceRequest();
        $request->setMethodName($mothodName);
        $request->setParamsJson($paramJson);
        $request->setServiceName($serviceName);
        list($response, $status) = $this->grpcClient->CallService($request)
            ->wait();
        if ($status->code == 0) {
            $code = $response->getCode();
            $message = $response->getMessage();
            $resultJson = $response->getResultJson();

            return compact("status", "code", "message", "resultJson");
        } else {//GRPC 调用失败
            $code = "99999";
            $message = "远程服务不可用,或者远程调用错误";
            $resultJson = "";

            return compact("status", "code", "message", "resultJson");
        }
    }

}