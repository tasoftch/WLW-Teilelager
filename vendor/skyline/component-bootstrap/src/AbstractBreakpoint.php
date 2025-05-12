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


abstract class AbstractBreakpoint implements StructFormatInterface
{
    const BREAKPOINT_EXTRA_SMALL        = 'xs';
    const BREAKPOINT_SMALL              = 'sm';
    const BREAKPOINT_MEDIUM             = 'md';
    const BREAKPOINT_LARGE              = 'lg';
    const BREAKPOINT_EXTRA_LARGE        = 'xl';

    const BREAKPOINT_DEFAULT = self::BREAKPOINT_EXTRA_SMALL;

    const FORMAT_BP_SYMBOL = '%x';
    const FORMAT_VAL_SYMBOL = '%v';


    private $breakpoints = [];

    /**
     * AbstractBreakpoint constructor.
     * @param mixed $value
     * @param int $breakpoint
     */
    public function __construct($value, string $breakpoint = self::BREAKPOINT_DEFAULT)
    {
        $this->breakpoints[$breakpoint] = $value;
    }

    /**
     * @param string $breakpoint
     * @return mixed|null
     */
    public function getBreakpoint(string $breakpoint) {
        return $this->breakpoints[$breakpoint] ?? NULL;
    }

    /**
     * @param string $breakpoint
     * @param $value
     * @return static
     */
    public function setBreakpoint(string $breakpoint, $value) {
        $this->breakpoints[$breakpoint] = $value;
        return $this;
    }

    /**
     * @param int $breakpoint
     * @return bool
     */
    public function hasBreakpoint(string $breakpoint): bool {
        return isset($this->breakpoints[$breakpoint]);
    }


    /**
     *
     *
     * @param $format
     * @return string
     */
    public function getCSS($format): string
    {
        $classes = [];
        $bps = sprintf("/\-%s/", static::FORMAT_BP_SYMBOL);
        $vbp = sprintf("/\-%s/", static::FORMAT_VAL_SYMBOL);

        if(preg_match($bps, $format)) {
            foreach($this->breakpoints as $e => $value) {
                if($value = $this->getFormattedValue($value, $e)) {
                    if($e == self::BREAKPOINT_DEFAULT) {
                        $f = preg_replace($bps, "", $format);
                    } else {
                        $f = preg_replace($bps, "-$e", $format);
                    }

                    $f = preg_replace($vbp, "-$value", $f);
                    if($f)
                        $classes[] = $f;
                }
            }
        } elseif($value = $this->getBreakpoint( static::BREAKPOINT_DEFAULT )) {
            if($value = $this->getFormattedValue($value, static::BREAKPOINT_DEFAULT)) {
                $f = preg_replace($vbp, "-$value", $format);
                if($f)
                    $classes[] = $f;
            }
        }
        return implode(" ", $classes);
    }

    /**
     * @param $value
     * @param $breakpoint
     * @return string
     */
    abstract protected function getFormattedValue($value, $breakpoint): string;
}