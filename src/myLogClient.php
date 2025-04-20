<?php

namespace Suxianjia\Xianjiasitemap;
use Exception;
use Suxianjia\Xianjiasitemap\myConfig;
class myLogClient {
    private static $instance = null;
    private static $LOG_FILE_PATH;
    private static $LOG_MODEL;

    private static $MY_DATABASE;
    // public static function getInstance( $logFilePath ,$logmodel,$myDatabase ) {
    
    public static function getInstance(   ) {
         // Load all configuration settings from myConfig
        $config = myConfig::getAllConfig();
        if (isset($config['log'])) {
            $logConfig = $config['log'];
            $logFilePath = $logConfig['path'] ?? $logFilePath;
            $logmodel = $logConfig['type'] ?? $logmodel;
            // $myDatabase = $logConfig['db'] ?? $myDatabase;
        }
        if (self::$LOG_MODEL == 'mysql') {
            $myDatabase = myDatabase::getInstance();
        } else {
            $myDatabase = null;
        }
        if (self::$LOG_FILE_PATH == null) {
            self::$LOG_FILE_PATH = $logFilePath;
        }
        if (self::$LOG_MODEL == null) {
            self::$LOG_MODEL = $logmodel;
        }
        if (self::$MY_DATABASE == null) {
            self::$MY_DATABASE = $myDatabase;
        }
        if (self::$instance === null) {
            self::$instance = new self();
        }
        self::$LOG_FILE_PATH = $logFilePath;
        self::$LOG_MODEL=$logmodel;
        self::$MY_DATABASE = $myDatabase;
        return self::$instance;
    }
    public function __destruct() {
        // Close the database connection if it exists
        if (self::$MY_DATABASE) {
            self::$MY_DATABASE->close();
        }
    }
    public function getLogModel() {
        return self::$LOG_MODEL;
    }
    public function getLogFilePath() {
        return self::$LOG_FILE_PATH;
    }
    public function getMyDatabase() {
        return self::$MY_DATABASE;
    }
 
    // 写入错误日志  myLogClient::getInstance()::writeErrorLog('Error message');
    public static function writeErrorLog(string $errorMessage, string $str =""): void {
        $logFilePath = self::$LOG_FILE_PATH . '/error_log_' . date('Y-m-d--H', time()) . '.txt';
        file_put_contents($logFilePath, $errorMessage.':' $str . PHP_EOL, FILE_APPEND);
    }


    public function __clone() {}
public function __wakeup() {}

}