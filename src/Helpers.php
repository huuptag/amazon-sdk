<?php

/**
 * File DateTime.php
 * Created by HuuLe at 12/08/2020 10:29
 */

namespace HuuLe\AmazonSDK;

use DateTime;
use DateTimeZone;

trait Helpers
{
    /**
     * Make Date Time function
     * @param string|int $time (default is now)
     * @param string $timezone
     * @return DateTime
     * @author HuuLe
     * @throws \Exception
     */
    public function makeDateTime($time = 'now', $timezone = null)
    {
        if (empty($timezone))
            $timezone = $this->getDefaultTimezone();
        return new DateTime($time, new DateTimeZone($timezone));
    }

    /**
     * Make Date Time For Request function
     * @param $time
     * @param string $timezone
     * @return string
     * @author HuuLe
     * @throws \Exception
     */
    public function makeDateTimeForRequest($time, $timezone = null)
    {
        return $this->makeDateTime($time, $timezone)->format(Constant::MWS_DATE_FORMAT);
    }

    /**
     * Check Formatted Date Time function
     * @param string $dateString
     * @return false|int
     * @author HuuLe
     */
    public function checkFormattedDateTime($dateString)
    {
        return preg_match('/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(\.\d{3})?Z/', $dateString);
    }

    /**
     * Convert Date Time Default Format By Formatted Value Returned From Amazon function
     * @param string $dateString
     * @return false|string
     * @author HuuLe
     */
    public function convertDateTimeDefaultFormat($dateString)
    {
        return date($this->getDefaultDateFormat(), strtotime($dateString));
    }

    /**
     * Check Is Assoc Array function
     * @param array $arr
     * @return bool
     * @author HuuLe
     */
    function isAssoc($arr)
    {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}
