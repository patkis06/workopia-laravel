<?php

use Illuminate\Support\Str;

if (!function_exists('format_currency')) {
  /**
   * Format a number as currency.
   *
   * @param float $number
   * @param string $currencySymbol
   * @param int $decimalPoints
   * @return string
   */
  function format_currency($number, $currencySymbol = '$', $decimalPoints = 2)
  {
    return $currencySymbol . number_format($number, $decimalPoints);
  }
}

if (!function_exists('format_salary')) {
  /**
   * Format a number as salary.
   *
   * @param float $number
   * @param string $currencySymbol
   * @param int $decimalPoints
   * @return string
   */
  function format_salary($number, $currencySymbol = '$', $decimalPoints = 2)
  {
    return $currencySymbol . number_format($number);
  }
}

if (!function_exists('format_tags')) {
  /**
   * Format tags.
   *
   * @param string $tags
   * @return string
   */
  function format_tags($tags)
  {
    return str_replace(',', ', ', $tags);
  }
}

if (!function_exists('limit_description')) {
  /**
   * Limit_description.
   *
   * @param string $description
   * @return string
   */
  function limit_description($description)
  {
    return Str::words($description, '25');
  }
}

if (!function_exists('format_remote')) {
  /**
   * Format job remote.
   *
   * @param string $remote
   * @return string
   */
  function format_remote($remote)
  {
    return $remote ? 'Yes' : 'No';
  }
}
