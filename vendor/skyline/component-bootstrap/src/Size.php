<?php
/**
 * Copyright (c) 2019 TASoft Applications, Th. Abplanalp <info@tasoft.ch>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Skyline\HTML\Bootstrap;


class Size extends AbstractBreakpoint
{
    const SMALL = -1;
    const NORMAL = 0;
    const LARGE = 1;

    /**
     * Size constructor.
     * @param $size
     */
    public function __construct($size)
    {
        parent::__construct($size, static::BREAKPOINT_DEFAULT);
    }

    /**
     * Adds a new size to a given breakpoint
     *
     * @param int $size
     * @param string $breakpoint
     * @return static
     */
    public function addSize(int $size, string $breakpoint) {
        $this->setBreakpoint($breakpoint, $size);
        return $this;
    }

    /**
     * @param int $size
     * @return static
     */
    public function setDefaultSize(int $size) {
        $this->setBreakpoint(static::BREAKPOINT_DEFAULT, $size);
        return $this;
    }

    protected function getFormattedValue($value, $breakpoint): string
    {
        switch ($value) {
            case self::SMALL: return "sm";
            case self::LARGE: return "lg";
            default:
        }
        return "";
    }
}