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

namespace Skyline\HTML\Bootstrap\Form\Style;


use Skyline\HTML\Bootstrap\Size;
use Skyline\HTML\Element;
use Skyline\HTML\ElementInterface;
use Skyline\HTML\Form\Control\Button\ButtonControl;
use Skyline\HTML\Form\Control\ControlInterface;
use Skyline\HTML\Form\Control\Text\StaticTextFieldControl;
use Skyline\HTML\Form\Style\AbstractStyleMap;

class BootstrapGridStyleMap extends AbstractStyleMap
{
    private $controlSize = Size::NORMAL;

    private $gridSettings = [
        'size' => [2, 10, Size::BREAKPOINT_MEDIUM]
    ];

    /**
     * Create css classes
     *
     * @param bool $forLabel
     * @return array
     * @internal
     */
    private function getApplyedGridClasses(bool $forLabel) {
        $classes = [];
        if(isset($this->gridSettings["def"])) {
            list($label, $cnt) = $this->gridSettings["def"];
            if($forLabel)
                $classes[] = "col-$label";
            else
                $classes[] = "col-$cnt";
        }
        if(isset($this->gridSettings["size"])) {
            list($label, $cnt, $bp) = $this->gridSettings["size"];

            if($forLabel)
                $classes = array_merge($classes, sky_bootstrap_size_classes($bp, "col-%-$label"));
            else
                $classes = array_merge($classes, sky_bootstrap_size_classes($bp, "col-%-$cnt"));
        }
        return $classes;
    }



    public function styleUpElement(ElementInterface $element, string $elementName, ?ControlInterface $control): ElementInterface
    {
        if($elementName == self::CONTAINER_ELEMENT) {
            $element["class"] = 'form-group row';

            if($element instanceof Element) {
                /** @var Element $cnt */
                if($cnt = $element->getElementsByClass('control')[0] ?? NULL) {
                    if($e = $element->getElementsByClass("valid-feedback")[0] ?? NULL) {
                        $element->removeElement($e);
                        $cnt->appendElement($e);
                    }
                    if($e = $element->getElementsByClass("invalid-feedback")[0] ?? NULL) {
                        $element->removeElement($e);
                        $cnt->appendElement($e);
                    }
                    if($e = $element->getElementsByClass("text-muted")[0] ?? NULL) {
                        $element->removeElement($e);
                        $cnt->appendElement($e);
                    }
                }
            }
        } elseif($elementName == self::CONTROL_ELEMENT) {
            if(!($control instanceof ButtonControl) && !($control instanceof StaticTextFieldControl)) {
                $classes = ['form-control'];

                if($this->isControlRequired($control))
                    $classes[] = "required";
                if($this->isControlValidated($control)) {
                    $classes[] = $this->isControlValid($control) ? 'is-valid' : 'is-invalid';
                }
                if(($size = $this->getControlSize()) != SKY_BOOTSTRAP_NORMAL) {
                    $classes[] = $size == SKY_BOOTSTRAP_LARGE ? 'form-control-lg' : 'form-control-sm';
                }

                $element["class"] = implode(" ", $classes);
            }

            $e = new Element("div");
            $e["class"] = implode(" ", $this->getApplyedGridClasses(false));
            $e->appendElement($element);
            return $e;
        } elseif($elementName == self::LABEL_ELEMENT) {
            $element["class"] = implode(" ", $this->getApplyedGridClasses(true));
        } elseif($elementName == self::DESCRIPTION_ELEMENT) {
            $element["class"] = 'form-text text-muted';
        } elseif($elementName == self::FEEDBACK_VALID_ELEMENT) {
            $element["class"] =  'valid-feedback';
        } elseif($elementName == self::FEEDBACK_INVALID_ELEMENT) {
            $element["class"] =  'invalid-feedback';
        }

        return $element;
    }

    /**
     * @return int
     */
    public function getControlSize(): int
    {
        return $this->controlSize;
    }

    /**
     * @param int $controlSize
     * @see SKY_BOOTSTRAP_SMALL
     * @see SKY_BOOTSTRAP_NORMAL
     * @see SKY_BOOTSTRAP_LARGE
     */
    public function setControlSize(int $controlSize): void
    {
        $this->controlSize = $controlSize;
    }

    public function setGridSize(int $label, int $control, int $breakpoint = SKY_BOOTSTRAP_SM) {
        $this->gridSettings["size"] = [$label, $control, $breakpoint];
    }

    public function setDefaultGridSize(int $label, int $control) {
        $this->gridSettings["def"] = [$label, $control];
    }
}