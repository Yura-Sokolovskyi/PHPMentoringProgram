<?php

use App\OOPFundamentals\ObjectOrientedPHP_1\President;

$us_president = new President();

$president_name = $us_president->name;

$greetings_from_president = $us_president->greet('Donald');
