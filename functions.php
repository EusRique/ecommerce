<?php

use \HCSolution\Model\User;
use \HCSolution\Model\Cart;

function formatPrice($vlprice) {

    if(!$vlprice > 0) $vlprice = 0;
    
    $format = number_format($vlprice, 2, ",", ".");

    return $format;
}

function formatDate($date) {

    return date('d/m/Y', strtotime($date));
}

function checkLogin($inadmin = true) {

    return User::checkLogin($inadmin);

}

function getUserName() {

    $user = User::getFromSession();

    return $user->getdesperson();
}

function getCartNrQtd() {

    $cart = Cart::getFromSession();

    $totals = $cart->getProductsTotals();

    return $totals['nrqtd'];
}

function getCartVlSubtotal() {

    $cart = Cart::getFromSession();

    $totals = $cart->getProductsTotals();

    return formatPrice($totals['vlprice']);
}

