<?php

function correct_phone($phone)
{

    $phone = preg_replace('/[^0-9]/', '', $phone);
    return $phone;

}