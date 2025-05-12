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

namespace Application\Controller;


use Skyline\Application\Controller\AbstractActionController;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class GeneralHTTPErrorController extends AbstractActionController
{
	private static $problem;

	public static function canHandleException(Throwable $exception): bool {
		$code = $exception->getCode();
		$methodName = "error{$code}Action";
		if(method_exists(static::class, $methodName)) {
			self::$problem = $exception;
			return true;
		}
		return false;
	}

	/**
	 * @return Throwable
	 */
	public static function getProblem()
	{
		return self::$problem;
	}

	public function errorAction(Response $response, int $code) {
		$response->setStatusCode($code);
		$this->renderModel([
			'PROBLEM' => static::getProblem()
		]);

		$this->renderTemplate("main", [
			"Content" => $code
		]);
	}

	public function error404Action(Response $response) {
		$this->errorAction($response, 404);
	}

	public function error403Action(Response $response) {
		$this->errorAction($response, 403);
	}
}