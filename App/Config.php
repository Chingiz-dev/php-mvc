<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{

    /**
     * Database host
     * @var string
     */
    const DB_HOST = '127.0.0.1:3306';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'usersphpmvc';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '12345';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;
}
