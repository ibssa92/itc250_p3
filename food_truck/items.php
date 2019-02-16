<?php
//items.php

/**
 * Item class stores the data relevant for a menu item:
 *
 * Public fields:
 * ID - a numeric value for tracking the item
 * Name - a descriptive name that appears on the menu
 * Description - short explanation about the food item
 * Price - the food base price, without extras or tax
 * Extras - user selected additions from the list of choices.. The extras are food type specific.
 *
 *
 * In addition to these fields, the class has a constructor
 * and a public method method addExtra() (used by the constructor).
 *
 */

//instantiate initial objects representing the types of food offered and add their toppings into an array
$myItem = new Item(1, 'Enchiladas', 'Three enchiladas smothered in cheese and sauce.', 11.50);
$myItem->addExtra('Carnitas');
$myItem->addExtra('Chicken');
$myItem->addExtra('Carne Asada');
$myItem->addExtra('Salsa Verde');
$myItem->addExtra('Rice');
$myItem->addExtra('Beans');
$myItem->addExtra('Sliced Avocado');
$items[] = $myItem;
    
$myItem = new Item(2, 'El Jefe Nachos', 'Fresh tortilla chips smothered with cheese, black beans, the toppings of your choice.', 4.95);
$myItem->addExtra('Carnitas');
$myItem->addExtra('Chicken');
$myItem->addExtra('Carne Asada');
$myItem->addExtra('Salsa Verda');
$myItem->addExtra('Pico de Gallo');
$myItem->addExtra('Cilantro');
$myItem->addExtra('Sour Cream');
$myItem->addExtra('Jalapenos');
$items[] = $myItem;

$myItem = new Item(3, 'Burrito', 'Flour tortilla wrapped around the fillings of your choice.', 8.00);
$myItem->addExtra('Carnitas');
$myItem->addExtra('Chicken');
$myItem->addExtra('Carne Asada');
$myItem->addExtra('Grilled Vegetables');
$myItem->addExtra('Rice');
$myItem->addExtra('Black Beans');
$myItem->addExtra('Sour Cream');
$myItem->addExtra('Cheese');
$myItem->addExtra('Pico de Gallo');
$items[] = $myItem;

$myItem = new Item(4, 'Huevos Rancheros', 'A plate of fried eggs over lightly fried corn tortillas, covered in salsa verde or salsa martajada, cilantro and cotija cheese. Black beans, rice and sliced avocado on the side.', 10.95);
$myItem->addExtra('Salsa Verde');
$myItem->addExtra('Salsa Martajada');
$myItem->addExtra('Cilantro');
$myItem->addExtra('Cotija Cheese');
$myItem->addExtra('Black Beans');
$myItem->addExtra('Rice');
$myItem->addExtra('Sliced Avocado');
$items[] = $myItem;

$myItem = new Item(5, 'Tacos', 'Corn tortillas topped with your choice of meats and/or fresh grilled vegetables and finished with  Pico de Gallo. (Comes in orders of 3)', 11.95);
$myItem->addExtra('Carne Asada');
$myItem->addExtra('Pollo Asado');
$myItem->addExtra('Carnitas');
$myItem->addExtra('Cochinita Pibil');
$myItem->addExtra('Tripas');
$myItem->addExtra('Adobada');
$myItem->addExtra('Lengua');
$myItem->addExtra('Chorizo');
$myItem->addExtra('Cabeza');
$myItem->addExtra('Fish');
$myItem->addExtra('Veggie');
$items[] = $myItem;

$myItem = new Item(6, 'Jarritos', 'In a glass bottle', 2.50);
$items[] = $myItem;

$myItem = new Item(7, 'Fanta', 'In a glass bottle', 2.50);
$items[] = $myItem;

$myItem = new Item(8, 'Mexican Coke', 'In a glass bottle', 2.50);
$items[] = $myItem;

class Item{
    //class fields
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Extras = array();
    
    public function __construct($ID, $Name, $Description, $Price){
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;        
    }//end constructor
    
    public function addExtra($extra){
        $this->Extras[] = $extra;
    }//end addExtra()
    
}//end Item class
?>
