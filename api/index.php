<?php

// api/index.php - Vercel entry point for Laravel

// Change to Laravel root directory
chdir(dirname(__DIR__));

// Load Laravel's public index
require __DIR__ . '/../public/index.php';