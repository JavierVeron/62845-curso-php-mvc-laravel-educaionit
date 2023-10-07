<?php
class Collection {
    private $array;
    
    function __construct($myArray) {
        $this->array = $myArray;
    }

    public function count() {
        return count($this->array);
    }

    public function each($array) {
        if (!$array) {
            $array = $this->array;
        }

        $htmlContent = '<table class="table table-striped">
        <tbody>';

        foreach ($array as $row) {
            $htmlContent .= '<tr>
            <td>' .$row .'</td>
            </tr>';
        }

        $htmlContent .= '</tbody>
        </table>';

        return $htmlContent;
    }

    public function map() {
        function mayuscula($valor) {
            return strtoupper($valor);
        }

        return array_map("mayuscula", $this->array);
    }
}