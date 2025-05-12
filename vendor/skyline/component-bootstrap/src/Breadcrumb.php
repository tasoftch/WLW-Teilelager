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


class Breadcrumb
{
	private $items;

	public function addItem($target, $name) {
		$this->removeItem($target);
		$this->items[$target] = $name;
		return $this;
	}

	public function setItem($target, $name) {
		$this->items[$target] = $name;
		return $this;
	}

	public function removeItem($target) {
		if(isset($this->items[$target]))
			unset($this->items[$target]);
		return $this;
	}

	public function getItems() {
		return $this->items;
	}

	public function getName($target) {
		return $this->items[$target] ?? false;
	}

	public function getTarget($name) {
		return array_search($name, $this->items);
	}

	public function __toString()
	{
		$itemString = "";
		$items = $this->getItems();
		$last = array_pop($items);

		foreach($items as $target => $name) {
			$itemString .= "<li class=\"breadcrumb-item\"><a href=\"$target\">$name</a></li>";
		}
		if($last)
			$itemString .= "<li class=\"breadcrumb-item active\" aria-current=\"page\">$last</li>";

		return "<nav aria-label=\"breadcrumb\">
	<ol class=\"breadcrumb\">
		$itemString
	</ol>
</nav>";
	}
}