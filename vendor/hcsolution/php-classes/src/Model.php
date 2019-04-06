<?php

namespace HCSolution;

//A classe Model cria os set e get de qualquer classe dinamicamente
class Model {
    //esse atributo recebe todos os valores dos campos que tem dentro do objeto
    //Ex: Nome, Sobrenome, Cidade etc. Por isso recebe array.
    private $values = [];

    //Esse metodo é usado para saber quando um método é chamado
    public function __call($name, $args) {
        /*primeiro precisa ser verificado se é um método set ou get
        método get tras a informação e retorna
        método set atribui valor do atributo da informação que foi passado*/
        
        //apartir da posição 0 traga 1 e traga 2 totalizando 3 letras
        $method = substr($name, 0, 3);

        /*descobre qual o nome do campo que foi chamado, se é o campo idusuario
        então ele vai chamar do getIdusuario, agora precisamos descartar os 3 
        primeiros e pegar o restante, só que agora vai começar da posição 3 pq 0 1 e 2 já veio
        e tem que ir até o final da palavra, para isso usa a função strlen para contar*/ 
        $fieldName = substr($name, 3, strlen($name));

        switch ($method) {

            case "get":
                return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;  
            break;

            case "set":
                return $this->values[$fieldName] = $args[0];
            break;
        }
    }

    /*Criando os get e set de forma dinâmica usando os métodos mágicos, a idéia é criar um 
    método (setData) que pense quantos campos estão retornando do banco e para cada campo ele crie um 
    atributo com valor de cada um dessas informações 
    */
    public function setData($data = array()) {

        foreach ($data as $key => $value) {

            $this->{"set".$key}($value);
        }
    }

    public function getValues() {

        return $this->values;
    }
}