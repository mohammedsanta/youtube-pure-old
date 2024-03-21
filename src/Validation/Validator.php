<?php
namespace Santa\Validation;

class Validator
{

    public $data = [];
    public $rules = [];
    public $alias = [];
    public ErrorBag $errorBag;

    public function make($data)
    {
        $this->data = $data;
        $this->errorBag = new ErrorBag;
        $this->validator();
    }

    public function validator()
    {

        foreach($this->rules as $field => $rules){
            foreach($this->resolveRule($field,$rules) as $rule){
                $this->makeRule($field,$rule);
            }
        }

    }

    public function makeRule($field,$rule)
    {
        if(!$rule->apply($field,$this->getFieldValue($field),$rule)){
            $this->errorBag->add($field,Messanger::generate($rule,$this->alias($field)));
        }
    }

    public function alias($field)
    {
        return $this->alias[$field] ?? $field;
    }

    public function setAliases($alias)
    {
        $this->alias = $alias;
    }

    public function getFieldValue($field)
    {
        return $this->data[$field] ?? $field;
    }

    public function resolveRule($field,$rules)
    {

        $rules = explode('|',$rules);

        return array_map(function($rule){

            if(is_string($rule)){
                return getRule::getFromString($rule);
            }

        }
        ,$rules);
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    public function passes()
    {
        return empty($this->errors());
    }

    public function errors($key = null)
    {
        return $key ? $this->errorBag->errors->$key : $this->errorBag->errors;
    }

}