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

namespace Skyline\HTML\Bootstrap\Modal;


use Skyline\HTML\Bootstrap\Type;
use Skyline\Render\Model\BoundTemplateModelInterface;

class SimpleModal implements BoundTemplateModelInterface
{
    /** @var string */
    private $ID;
    /** @var string */
    private $type;
    /** @var string */
    private $title;
    /** @var string */
    private $message;

    private $shouldShowOnLoad = false;

    /**
     * Dialog constructor.
     * @param string $ID
     * @param string $type
     * @param string $title
     * @param string $message
     */
    public function __construct(string $ID, string $title = "", string $message = "", string $type = Type::PRIMARY)
    {
        $this->ID = $ID;
        $this->type = $type;
        $this->title = $title;
        $this->message = $message;
    }


    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }



    public function getTemplate()
    {
        return "simple-modal";
    }

    /**
     * @return string
     */
    public function getID(): string
    {
        return $this->ID;
    }

    /**
     * @return bool
     */
    public function shouldShowOnLoad(): bool
    {
        return $this->shouldShowOnLoad;
    }

    /**
     * @param bool $shouldShowOnLoad
     */
    public function setShouldShowOnLoad(bool $shouldShowOnLoad): void
    {
        $this->shouldShowOnLoad = $shouldShowOnLoad;
    }
}