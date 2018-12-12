<?php

use \Brightree\BrightreeClient;

$bt = new BrightreeClient("username", "password");
echo $bt->orderEntryService->call;
