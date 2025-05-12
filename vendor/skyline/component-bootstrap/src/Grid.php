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


class Grid extends AbstractBreakpoint
{
    const COL_1 = 1;
    const COL_2 = 2;
    const COL_3 = 3;
    const COL_4 = 4;
    const COL_5 = 5;
    const COL_6 = 6;
    const COL_7 = 7;
    const COL_8 = 8;
    const COL_9 = 9;
    const COL_10 = 10;
    const COL_11 = 11;
    const COL_12 = 12;

    /**
     * Grid constructor.
     * @param int $defaultColumn
     */
    public function __construct(int $defaultColumn)
    {
        parent::__construct($defaultColumn, static::BREAKPOINT_DEFAULT);
    }

    /**
     * @param int $column
     * @param string $breakpoint
     * @return static
     */
    public function addColumn(int $column, string $breakpoint) {
        $this->setBreakpoint($breakpoint, $column);
        return $this;
    }

    /**
     * @param int $column
     * @return static
     */
    public function setDefaultColumn(int $column) {
        $this->setBreakpoint(static::BREAKPOINT_DEFAULT, $column);
        return $this;
    }

    protected function getFormattedValue($value, $breakpoint): string
    {
        return $value == self::COL_12 ? "" : $value;
    }

    public function __toString()
    {
        return $this->getCSS("col-%x-%v");
    }
}