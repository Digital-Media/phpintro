<?php
namespace Utilities;

use Monolog\Logger;
use Monolog\ErrorHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RedisHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\WebProcessor;
use Predis;

/**
 * Offers Methods to initialize monolog and log to onlineshop/src/Utilities/onlineshop.log.
 *
 * @author  Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version v3.0.1
 */
class LogWriter
{
    /*
     * $var string $logger Holds an instance of the class Logger of monolog
     */
    private static $logger;
    private $channel;

    /*
     * Supports debugging during development
     *
     * Initilizes the class Logger
     * Registers all PHP errors to be logged by this logger
     * Adds a stream handler to the logger with level Logger::DEBUG
     */
    private function __construct(string $which_handler = 'files', $level = Logger::DEBUG, int $cap = 10)
    {
        if (!isset(self::$logger)) {
            self::$logger = new Logger('Shop');
            ErrorHandler::register(self::$logger);
            if ($which_handler === 'files') {
                $handler = new StreamHandler(__DIR__.'/onlineshop.log', $level);
            } else {
                $handler = new RedisHandler(new Predis\Client(['scheme' => 'tcp', 'host' => '192.168.7.7', 'port' => 6379, 'password' => 'geheim']), "logs", $level, true, $cap);
            }
            $handler->setFormatter(new LineFormatter("[%datetime%] %level_name%: %message% \n"));
            // next Line is for usage with WebProcessor
            //$handler->setFormatter(new LineFormatter("[%datetime%] %level_name%: %message% %extra% \n"));
            self::$logger->pushHandler($handler);
            //self::$logger->pushProcessor(new WebProcessor);
        }
    }

    /*
     * Log a Debug-Mesage
     *
     * @param mixed $debug Debug message to be logged
     */
    public function logDebug($debug)
    {
        ob_start();
        print_r(json_encode($debug));
        $debuglog = ob_get_contents();
        ob_clean();
        self::$logger->addDebug($debuglog);
    }

    /*
     * Log an Error
     *
     * @param string $error Error to be logged
     */
    public function logError($error)
    {
        self::$logger->addError($error);
    }

    /*
     * Log an Warning
     *
     * @param string $error Error to be logged
     */
    public function logWarning($warning)
    {
        self::$logger->addWarning($warning);
    }

    /*
     * Log an Info
     *
     * @param string $info Info to be logged
     */
    public function logInfo($info)
    {
        self::$logger->addInfo($info);
    }

    public static function getInstance(string $which_handler = 'files', $level = Logger::DEBUG, int $cap = 10)
    {
        return new LogWriter($which_handler, $level, $cap);
    }
}
