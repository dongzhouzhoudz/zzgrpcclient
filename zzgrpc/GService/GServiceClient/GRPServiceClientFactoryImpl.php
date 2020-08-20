<?php
/**
 * Created by PhpStorm.
 * User: dongzhou
 * Date: 2020/8/20
 * Time: 3:38 PM
 */

namespace GrpServiceClient\GServiceClient;


class GRPServiceClientFactoryImpl implements GRPServiceClientFactory {
    private static $_grpServiceClientFactoryInstance;

    private function __construct() {

    }

    /**
     * @return GRPServiceClientFactoryImpl
     * 工厂类单例模式
     */
    public static function getInstance() {
        if ( ! self::$_grpServiceClientFactoryInstance instanceof self) {
            return self::$_grpServiceClientFactoryInstance = new self();
        } else {
            return self::$_grpServiceClientFactoryInstance;
        }
    }

    /**
     * @param        $hostName
     * @param        $opts
     * @param string $channel
     * @param int    $timeOut
     *
     * @return \GrpServiceClient\GRPServiceForGo
     * 生成GoGrpc 客户端
     *
     */
    public function createGoGrpcClient($hostName, $opts, $channel = "",
        $timeOut = 1000000) {
        $goGrpcClient = GRPServiceClientForGo::buildClient($hostName, $opts,
            $channel = "", $timeOut);
        return $goGrpcClient;
        // TODO: Implement createGoGrpcClient() method.
    }

    /**
     * @return null
     * 创建Java GRPC客户端
     */
    public function createJavaGrpcClient() {
        return null;
        // TODO: Implement createJavaGrpcClient() method.
    }

    /**
     * @return null
     * 创建Python Grpc 客户端
     */
    public function createPythonGrpcClient() {
        return null;
        // TODO: Implement createPythonGrpcClient() method.
    }


}