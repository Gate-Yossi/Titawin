<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Xhgui\Profiler\Profiler;
use Xhgui\Profiler\ProfilingFlags;

require __DIR__ . '/../../vendor/autoload.php';

$xhgui_config = [

    // If defined, use specific profiler
    // otherwise use any profiler that's found
    'profiler' => Profiler::PROFILER_TIDEWAYS_XHPROF,

    // This allows to configure, what profiling data to capture
    'profiler.flags' => array(
        ProfilingFlags::CPU,
        ProfilingFlags::MEMORY,
        ProfilingFlags::NO_BUILTINS,
        ProfilingFlags::NO_SPANS,
    ),

    // Saver to use.
    // Please note that 'pdo' and 'mongo' savers are deprecated
    // Prefer 'upload' or 'file' saver.
    'save.handler' => Profiler::SAVER_UPLOAD,

    // Saving profile data by upload is only recommended with HTTPS
    // endpoints that have IP whitelists applied.
    // https://github.com/perftools/php-profiler#upload-saver
    'save.handler.upload' => array(
        'url' => 'http://xhgui/run/import',
        // The timeout option is in seconds and defaults to 3 if unspecified.
        'timeout' => 3,
        // the token must match 'upload.token' config in XHGui
        'token' => 'token',
    ),

    // https://github.com/perftools/php-profiler#file-saver
    'save.handler.file' => array(
        // Appends jsonlines formatted data to this path
        'filename' => '/tmp/xhgui.data.jsonl',
    ),

    // https://github.com/perftools/php-profiler#stack-saver
    'save.handler.stack' => array(
        'savers' => array(
            Profiler::SAVER_UPLOAD,
            Profiler::SAVER_FILE,
        ),
        // if saveAll=false, break the chain on successful save
        'saveAll' => false,
    ),

    // Environment variables to exclude from profiling data
    'profiler.exclude-env' => array(),
    'profiler.options' => array(),

    /**
     * Determine whether the profiler should run.
     * This default implementation just disables the profiler.
     * Override this with your custom logic in your config
     * @return bool
     */
    'profiler.enable' => function () {
        return true;
    },

    /**
     * Creates a simplified URL given a standard URL.
     * Does the following transformations:
     *
     * - Remove numeric values after "=" in query string.
     *
     * @param string $url
     * @return string
     */
    'profiler.simple_url' => function ($url) {
        return preg_replace('/=\d+/', '', $url);
    },

    /**
     * Enable this to clean up the url before submitting it to XHGui.
     * This way it is possible to remove sensitive data or discard any other data.
     *
     * The URL argument is the `REQUEST_URI` or `argv` value.
     *
     * @param string $url
     * @return string
     */
    'profiler.replace_url' => function ($url) {
        return str_replace('token', '', $url);
    },

];
