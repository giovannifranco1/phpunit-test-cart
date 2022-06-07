<?php

namespace src;

class Cart
{

  public function __construct(
    private $items = []
  ) {}

  # add item to cart
  public function addItem(string $item): void
  {
    if (!is_string($item)) {
      throw new \InvalidArgumentException('Invalid item');
    }

    # validate item
    array_filter($this->items, function ($itemCart) use ($item) {
      if ($itemCart['name'] === $item) {
        throw new \InvalidArgumentException('Item already exists');
      }
    });

    # add item
    $this->items[] = [
      'name' => $item,
      'qtd' => 1,
    ];

  }

  # Add a quantity of an item
  public function addQtd(string | int $nameItem, int $qtd = null): void
  {
    $indx = array_search($nameItem, array_column($this->items, 'name'));
    $this->items[$indx]['qtd'] = $qtd ?? $this->items[$indx]['qtd'] + 1;
  }

  # toString
  public function __toString()
  {
    $items = [];
    foreach ($this->items as $item) {
      $items[] = $item['name'] . ' (' . $item['qtd'] . ')';
    }
    return implode(', ', $items);
  }

}
