<?php
interface IModel
{
    public function GetRequiredFields($name, $var);
    public function GetPostMap($template);
}