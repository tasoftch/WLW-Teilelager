<?php
/**
 * BSD 3-Clause License
 *
 * Copyright (c) 2019, TASoft Applications
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *  Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 *
 *  Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 *  Neither the name of the copyright holder nor the names of its
 *   contributors may be used to endorse or promote products derived from
 *   this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
 * FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
 * OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */

use Application\Application as Application;
use Skyline\Kernel\Bootstrap as Bootstrap;
use Skyline\Kernel\Service\CORSService as CORS;

define("SKY_DEBUG", false);
define("SKY_TEST", false);

chdir( dirname(__FILE__) . DIRECTORY_SEPARATOR . '../');
require 'vendor/autoload.php';

$configuration = Bootstrap::getConfigurationPath('SkylineAppData/');

CORS::registerHost('localhost:8080', '', false, 'Main');
CORS::registerHost('localhost:8080/api/v1/', 'localhost:8080', false, 'API');


Bootstrap::bootstrap($configuration);

/** @var \TASoft\Service\ServiceManager $SERVICES */
global $SERVICES;
$SERVICES->setParameter("AppTitle", "WLW Projekt");
$SERVICES->setParameter("AppDescription", "My Website powered by Skyline CMS and TASoft Applications");

$app = new Application();
$app->run();