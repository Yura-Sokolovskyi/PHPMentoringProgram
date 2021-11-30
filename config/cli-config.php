<?php

require_once dirname(__DIR__, 1).'/vendor/autoload.php';

use App\DatabasesBasics\config\EntityManagerBuilder;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

return ConsoleRunner::createHelperSet(EntityManagerBuilder::build());
