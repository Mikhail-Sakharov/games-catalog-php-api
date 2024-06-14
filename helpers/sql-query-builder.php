<?php
  function getSortType($sortType) {
    switch($sortType) {
      case 'rating':
        return 'rating';
      default:
        return '';
    }
  }

  function getOrderType($orderType) {
    switch($orderType) {
      case 'asc':
        return 'ASC';
      case 'desc':
        return 'DESC';
      default:
        return '';
    }
  }

  function buildSqlQuery() {
    $path = $_SERVER['PATH_INFO'];
    $gamePathRegExp = '/(?<=^\/)game(?=\/)/';
    $gamesPathRegExp = '/(?<=^\/)games/';

    if (preg_match($gamePathRegExp, $path)) {
      $slugRegExp = "/(?<=\/game\/).+/";
      preg_match($slugRegExp, $path, $match);
      $slug = $match[0];
      $sql = strlen($slug) !== 0 ? "SELECT * FROM `games` WHERE `slug` = '$slug'" : 'SELECT * FROM games';

      return $sql;
    }
    if (preg_match($gamesPathRegExp, $path)) {
      $sortType = getSortType($_GET['sortType']);
      $orderType = getOrderType($_GET['orderType']);

      $sortTypeQuery = $sortType ? "ORDER BY `$sortType`" : '';
      $orderTypeQuery = $sortType && $orderType ? $orderType : '';

      $sql = 'SELECT * FROM games ' . $sortTypeQuery . ' ' . $orderTypeQuery;

      return $sql;
    }

    return 'SELECT * FROM games';
  }
?>
