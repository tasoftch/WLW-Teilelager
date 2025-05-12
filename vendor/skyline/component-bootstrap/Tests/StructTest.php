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

/**
 * StructTest.php
 * skyline-component-bootstrap
 *
 * Created on 2019-10-02 23:52 by thomas
 */

use PHPUnit\Framework\TestCase;
use Skyline\HTML\Bootstrap\Grid;
use Skyline\HTML\Bootstrap\Size;

class StructTest extends TestCase
{
    public function testSize() {
        $size = new Size(Size::SMALL);

        $this->assertEquals("control-sm", $size->getCSS("control-%v"));

        $this->assertEquals("control-sm", $size->getCSS("control-%x-%v"));

        $size->addSize($size::LARGE, $size::BREAKPOINT_MEDIUM);

        $this->assertEquals("control-sm", $size->getCSS("control-%v"));

        $this->assertEquals("control-sm control-md-lg", $size->getCSS("control-%x-%v"));
    }

    public function testGrid() {
        $grid = new Grid(12);
        $this->assertEquals("", $grid->getCSS("col-%x-%v"));

        $grid->addColumn(6, $grid::BREAKPOINT_SMALL);
        $grid->addColumn(4, $grid::BREAKPOINT_LARGE);

        $this->assertEquals("col-sm-6 col-lg-4", $grid->getCSS("col-%x-%v"));

        $grid->setDefaultColumn(8);
        $this->assertEquals("col-8 col-sm-6 col-lg-4", $grid->getCSS("col-%x-%v"));

        $this->assertEquals("col-8 col-sm-6 col-lg-4", (string) $grid);
    }
}
