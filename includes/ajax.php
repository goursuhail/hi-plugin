<?php

class Ajax{

    function __construct()
    {

        add_shortcode('AJAXCODE', [$this, 'ajaxfunction']);
        add_action();
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
                <button>Submit</button>
            </div>
            <div>
                <input id="xyz" type="text" name="val">
            </div>
        </div>
<?php


    }


}

new Ajax();

