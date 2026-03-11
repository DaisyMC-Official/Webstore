<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/Basket/BasketSession.php';

BasketSession::start();
BasketSession::handleApiRequest();
