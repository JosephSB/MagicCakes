<?php

    class View{
        function Render($NameView){
            require 'views/'.$NameView.'.php';
        }
    }

?>