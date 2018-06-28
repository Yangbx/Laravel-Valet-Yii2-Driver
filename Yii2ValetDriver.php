<?php

class Yii2ValetDriver extends ValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return (file_exists("$sitePath/vendor/yiisoft/yii2/Yii.php")) ? true : false;
    }

    /**
     * Determine if the incoming request is for a static file.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string|false
     */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        return (file_exists($staticFilePath = "$sitePath/web/$uri")) ? $staticFilePath : false;
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        $_SERVER['SCRIPT_FILENAME'] = "$sitePath/web/index.php";
        $_SERVER['SCRIPT_NAME'] = "/index.php";
        $_SERVER['PHP_SELF'] = "index.php";
        $_SERVER['DOCUMENT_ROOT'] = $sitePath;

        return "$sitePath/web/index.php";
    }
}
