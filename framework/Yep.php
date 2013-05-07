<?php
/**
 * Yep class file
 * 
 * @author Kacper Czochara <kacperczochara@gmail.com>
 * @copyright Copyright (C) 2013 Kacper Czochara
 */

/**
 * Yep is a helper class serving common framework functionalities.
 */
class Yep {

        /**
         * @var object An application instance.
         */
        private static $_app;

        /**
         * @var array Contains all base framework classes.
         */
        private static $_coreClasses = array(
                // base
                'Application' => 'base/Application.php',
                'HttpRequest' => 'base/HttpRequest.php',
                'Router' => 'base/Router.php',
                'Controller' => 'base/Controller.php',
                'Model' => 'base/Model.php',
                'View' => 'base/View.php',
                // components
                'Database' => 'components/Database.php',
        );

        /**
         * Creates an application.
         */
        public static function createApplication($config) {
                return new Application($config);
        }

        /**
         * Stores the application instance in the class static member.
         * This method helps implement a singleton pattern for CApplication.
         * To retrieve the application instance, use {@link app()}.
         * @param CApplication $app the application instance. If this is null, the existing
         * application singleton will be removed.
         * @throws CException if multiple application instances are registered.
         */
        public static function setApplication($app) {
                // if application not created yet
                if (self::$_app === null) {
                        self::$_app = $app;
                } else {
                        throw new Exception('Yep application can only be created once.');
                }
        }

        /**
         * @return object The application singleton.
         */
        public static function app() {
                return self::$_app;
        }

        /**
         * @param string $key
         * @return configuration for feature specified in $key
         */
        public static function getConfiguration($key) {
                if (isset($this->config[$key])) {
                        return $this->config[$key];
                } else {
                        return null;
                        // NOTE: or exception maybe, i dont know yet
                }
        }

        /**
         * Autoload method also known as "Lazy loading".
         * This method is provided to be invoked within an __autoload() magic method.
         * @param string $className class name
         * @return boolean whether the class has been loaded successfully
         */
        public static function autoload($className) {
                // use include so that the error PHP file may appear
                $controllerPath = BASE_PATH . '/application/controllers/' . $className . '.php';
                $modelPath = BASE_PATH . '/application/models/' . $className . '.php';
                if (isset(self::$_coreClasses[$className])) {
                        include self::$_coreClasses[$className];
                } else {
                        if (is_file($controllerPath)) {
                                include $controllerPath;
                        } elseif (is_file($modelPath)) {
                                include $modelPath;
                        } else {
                                throw new Exception('Requested class does not exist or is not set in 
                                $_coreClasses');
                        }
                }
                return true;
        }

}

spl_autoload_register(array('Yep', 'autoload'));