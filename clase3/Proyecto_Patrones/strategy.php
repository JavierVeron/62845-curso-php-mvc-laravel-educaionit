<?php

interface Strategy {
   public function doOperation($num1, $num2);
}

class OperationAdd implements Strategy{
   public function doOperation( $num1,  $num2) {
      return $num1 + $num2;
   }
}

class OperationSubstract implements Strategy{
   public function  doOperation( $num1,  $num2) {
      return $num1 - $num2;
   }
}

class OperationMultiply implements Strategy{
   public function  doOperation( $num1,  $num2) {
      return $num1 * $num2;
   }
}

class Context {
   private $strategy;

   public function  Context(Strategy $strategy){
      $this->strategy = $strategy;
   }

   public function  executeStrategy( $num1,  $num2){
      return $this->strategy->doOperation($num1, $num2);
   }
}

$context = new Context(new OperationAdd());		
echo "10 + 5 = " . $context->executeStrategy(10, 5);
echo '<br>';
/* $context = new Context(new OperationSubstract());		
echo "10 - 5 = " . $context->executeStrategy(10, 5);
echo '<br>';
$context = new Context(new OperationMultiply());		
echo "10 * 5 = " . $context->executeStrategy(10, 5); */
