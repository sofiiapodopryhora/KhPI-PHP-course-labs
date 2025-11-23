<?php
// static-class-cache.php

class DataProvider
{
    private static $cache = null;
    private static $cacheTime = null;
    private static $cacheDuration = 60; // 1 minute

    private static function generateData()
    {
        sleep(2); // Simulate slow data generation
        return [
            'product_count' => rand(100, 500),
            'last_update' => date('H:i:s'),
            'source' => 'Newly Generated'
        ];
    }

    public static function getData()
    {
        $isCacheValid = self::$cache !== null && (time() - self::$cacheTime) < self::$cacheDuration;

        if ($isCacheValid) {
            self::$cache['source'] = 'Static Property Cache';
            return self::$cache;
        } else {
            self::$cache = self::generateData();
            self::$cacheTime = time();
            return self::$cache;
        }
    }
}

$data = DataProvider::getData();

echo "<h2>Data from Static Class Cache</h2>";
echo "<p>Product Count: " . htmlspecialchars($data['product_count']) . "</p>";
echo "<p>Last Update: " . htmlspecialchars($data['last_update']) . "</p>";
echo "<p>Source: " . htmlspecialchars($data['source']) . "</p>";
