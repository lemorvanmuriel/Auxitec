<?php
// fonction qui charge les classes automatiquement
function classAutoLoader($className){
    include "./classes/" . $className . ".php";
}