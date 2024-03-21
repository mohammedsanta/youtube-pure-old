<?php
namespace Santa\Validation\Rules\Contruct;

interface Rule
{

    public function apply($filed,$value,$data);

    public function __toString();

}