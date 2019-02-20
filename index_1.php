<?php 
//index.php
/**
 * index.php generates the initial page the user sees when using this app.
 * It uses the class file items.php to instantiate the objects that store the data for the menu: the item names, description and price.
 *
 * In addition, this page contains a form that has:
 *      number input field for the quantity for each item
 *      checkboxes to select additional toppings/extras
 *      button to submit the order
 *
 * The form checks if the user input was valid,
 * stores the user data into an array, calls the calculation methods
 * and displays the order summary, subtotal(per item) price and total.
 *
 *
 */
 require 'items.php';
include 'includes/header.php';
         //displays a menu of items and allows the user to place an order
            define('THIS_PAGE', basename($_SERVER['PHP_SELF']));
            //checks for input
            if (isset($_POST['order'])) {      
                    echo '<h3>Your order has been placed.</h3>';
                    
                        $subtotal = 0;
                        $valid = false;
                
                        //create the order summary showing all the items and toppings ordered,
                        //the subtotal for each item, and a cumulative total cost due.
                        foreach($_POST as $order => $numberOfItems) { // loop the form elements
                            // if form name attribute starts with 'item_', process it as an item
                             if (substr($order, 0, 5) == 'item_') {
                                // explode the string into an array on the "_"
                                $order_array = explode('_', $order);
                                // id is the second element of the array
                                // forcibly cast to an int in the process
                                $orderID = (int)$order_array[1];
                                if (is_numeric($numberOfItems) && ctype_digit($numberOfItems) && $numberOfItems > 0) { 
                                    $valid = true;
                                    
                                    //gets item information
                                    $orderID -= 1; // since array index is 1 smaller
                                    echo '<p>' . $numberOfItems . ' x ' . $items[$orderID]->Name . ' - $' . number_format($items[$orderID]->Price, 2) . ' each</p>';
                                    
                                    //calculates the subtotal of each item ordered
                                    $subtotal += ($numberOfItems * $items[$orderID]->Price);
                    
                                } elseif  ((is_numeric($numberOfItems) == false && strlen($numberOfItems) > 0) || (is_numeric($numberOfItems) == true && $numberOfItems < 0) || (ctype_digit($numberOfItems) == false && strlen($numberOfItems) > 0)){
                                    $valid = false;
                                    $orderID -= 1; // since array index is 1 smaller
                                    echo '<p style="color:red;"><b>' . $items[$orderID]->Name . ':</b>  '. $numberOfItems . ' is not a valid option.  Item was removed from order.  Please return to the previous page and enter a numeric value.</p>';
                                } elseif (strlen($numberOfItems) == 0){
                                    $valid = false;
                                }
                                
                            }
                            // if form name attribute starts with 'extra_', process it as an extra
                            if (substr($order, 0, 6) == 'extra_' && $valid == true){
                                // the extra's name is the second element of the array
                                echo '<pre>           +' . substr($order, 6) . '   + $0.25</pre>';
                                $subtotal += 0.25;
                            }
                            
                        }
                         echo '<p>Subtotal: $' . number_format($subtotal, 2) . '</p>';
                
                
                
                
                
                
                
                
                        //calculates and displays the sales tax of subtotal
                        //10.1% Seattle sales tax, round total to 2 decimal places
                        //if soda is ordered, include sugar tax of 1.75 cents per 1 fl oz. Assuming drinks are 8 fl oz, sugar tax is 14 cents per drink ordered.
                
                
                
                        //if item ID 6 (Jarritos) or ID 7 (Fanta) or ID 8 (Mexican Coke) is in the order
                        
                        if(/*?????   $ID=6 || $ID=7 || $ID=8    ?????*/){
                            echo '<p>Tax: $' . number_format(($subtotal * 0.101), 2) . '</p>';
                            echo '<p>Sugar Tax: $' . number_format(   /* (# OF SODA * 0.14) */  , 2) . '</p>';
                            echo '<p>Total: $' . number_format(($subtotal + ($subtotal * 0.101) + /* (# OF SODA * 0.14) */), 2) . '</p>';
                        }   
                
                        else{
                            echo '<p>Tax: $' . number_format(($subtotal * 0.101), 2) . '</p>';
                            echo '<p>Total: $' . number_format(($subtotal + ($subtotal * 0.101)), 2) . '</p>';
                        }

                
                
                
                
                
                
                
                
                        echo '<p><a href="' . THIS_PAGE . '">Clear</a></p>';
                    
                    break;
            }else{  //allows user to place an order
                    //shows a form so users can place an order
                    echo '<div class="col-sm-6" id="content">
                          <h3>Menu</h3>';
                    foreach ($items as $item) {
                        echo '<div class = "menuItem">
                              <h5 class="foodName">' . $item->Name . '</h5>
                              <p class="price"> | $' . number_format($item->Price, 2) . '</p>
                              <p>' . $item->Description . '</p>
                              </div>';
                    }
                    echo '</div>';                         
                          
                    echo '<form action="' . THIS_PAGE . '" method="post" name="foodOrderForm">
                          <div id = "food" class="col-sm-6">
                          <img src="img/food-truck.jpg" alt="Image of FoodTruck">
                          <h3 class="text-center">What can we make for you today?</h4>';
                    //iterate through the item objects and populate the menu with data from the objects
                    foreach ($items as $item) {
                        echo '<h2>' . $item->Name . '</h2>
                              <h4>$' . number_format($item->Price, 2) . '</h4>
                              <input type="text" name="item_' . $item->ID . ' placeholder="QTY">';//holds the desired quantity
                        // if extras exist
                        if (count($item->Extras) > 0) {
                            echo '<div class="toppings">';
                            foreach ($item->Extras as $extra) {
                                echo '<label><input type="checkbox" name="extra_' . $extra . '" />' . $extra . '<br /></label>';
                            }
                            echo '</div>';
                        }
                    }   
                    echo '<input type="submit" value="Order">
                          <input type="hidden" name="order" value="display" />
                          
                          </form>';
            }
 include 'includes/footer.php';
?> 
