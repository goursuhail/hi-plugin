<?php

class Ajax{

    function __construct()
    {

        add_shortcode('AJAXCODE', [$this, 'ajaxfunction']);

        add_action('wp_ajax_hi_calc', [ $this, 'calc']);
        add_action('wp_ajax_nopriv_hi_calc', [ $this, 'calc']);

    }

    function calc(){

       $operator = $_POST['choose'];
       $result = '';
       switch ($operator){

           case 'add':
               $result = $_POST['no1'] + $_POST['no2'];

               break;
           case 'subtract':
               $result = $_POST['no1'] - $_POST['no2'];

               break;
           case 'multiply':
               $result = $_POST['no1'] * $_POST['no2'];

               break;
           case 'division':
               $result = $_POST['no1'] / $_POST['no2'];

               break;
       }

        wp_send_json($result);
    }


    function ajaxfunction(){

    ?>

        <div class="container">
            <div>
                <input id="abc" type="text" name="num1">
            </div>
            <div>
                <input id="def" type="text" name="num2">
            </div>
            <div>
                <select id="cal" name="operator">
                    <option value="add">Add</option>
                    <option value="subtract">Subtract</option>
                    <option value="multiply">Multiply</option>
                    <option value="division">Division</option>
                </select>
            </div>
            <div>
                <button id="ajax-submit">Submit</button>
            </div>
            <div>
                <input id="xyz" type="text" name="val">
            </div>
        </div>
<?php


    }


}

new Ajax();

