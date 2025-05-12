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

use Skyline\HTML\Form\Control\Button\ButtonControl;
use Skyline\HTML\Form\Style\DynamicStyleMap;

class BootstrapDefaultStyleMap extends DynamicStyleMap
{
    protected function loadStyles(): array
    {
        return [
            self::FORM_VALIDATED_STYLE => '',
            self::FORM_VALID_STYLE => 'is-valid',
            self::FORM_INVALID_STYLE => 'is-invalid',

            self::FEEDBACK_VALID_STYLE => 'valid-feedback',
            self::FEEDBACK_INVALID_STYLE => 'invalid-feedback',

            self::CONTAINER_STYLE => 'form-group',
            self::CONTROL_STYLE => [
                self::DEFAULT_STYLE => 'form-control',
                ButtonControl::class => NULL // Normally button classes already are styled and they do not need to be validated at all.
            ],
            self::CONTROL_REQUIRED_STYLE => 'required',
            self::CONTROL_DESCRIPTION_STYLE => 'form-text text-muted',

            self::CONTROL_VALID_STYLE => 'is-valid',
            self::CONTROL_INVALID_STYLE => 'is-invalid'
        ];
    }
}