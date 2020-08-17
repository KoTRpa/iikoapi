<?php
/**
 * This file for standalone use
 * Just require it and use api like
 * Iiko::methodName()
 * All magic provided by Illuminate\Support and Facades
 * thanks to Laravel Community
 */
$aliases = require __DIR__ . '/config/aliases.php';
KMA\IikoApi\Facades\AliasLoader::getInstance($aliases)->register();
