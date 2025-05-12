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

namespace Skyline\Router;


use Skyline\Router\Description\MutableActionDescription;
use Skyline\Router\Description\MutableActionDescriptionInterface;
use Skyline\Router\PartialAssigner\PartialAssignerInterface;
use TASoft\Collection\PriorityCollection;

/**
 * Default implementation to distribute partial routings between assigners
 *
 * @package Skyline\Router
 */
abstract class AbstractPartialAssignmentRouter extends AbstractPartialRouter
{
    /** @var PartialAssignerInterface */
    private $assigner;

    /**
     * @return PartialAssignerInterface
     */
    public function getAssigner(): PartialAssignerInterface
    {
        return $this->assigner;
    }

    /**
     * @param PartialAssignerInterface $assigner
     */
    public function setAssigner(PartialAssignerInterface $assigner): void
    {
        $this->assigner = $assigner;
    }

    /**
     *
     *
     * @param $information
     * @param MutableActionDescription $actionDescription
     * @return bool
     */
    protected function routePartial($information, MutableActionDescriptionInterface $actionDescription): bool
    {
        return $this->getAssigner()->routePartial($information, $actionDescription);
    }
}