<?php
	$Guardado=Array(); //Crea el arreglo 
?>
<html>
<title>Practica No. 5</title>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<h1><center> Practica No. 5 <br /></center></h1>
	<center> Automata a Pila Vacia </center>
	<center>Ingreso de caracteres manualmente (Max 20) o Aleatorio</center>
<form method="post" align="center">
<h4>Ingresa tu cadena iniciando con 0 ó escribe aleatorio<input class="boton" type="search" name="total" MAXLENGTH=20 size="25"><a><input type="submit" class="boton" value="Generar"></a></h4>
</form>
<?php
	$cadena=$_POST['total']; //El campo de texto donde se escribre la cadena de 0,1 o la palabra aleatoria
	class Pila {
			//variable $pila que conteinen el arreglo tipo pila
			public $pila;

			//funcion void para crar la pila
			public function __construct(){
				$this->pila=array();
			}

			//Inserta el elemento al tope de la pila
			public function push($elemento){
				$this->pila[]=$elemento;
			}

			//Devuelve el elemento tope de la pile, el cual es removido de la misma
			public function pop(){
				return array_pop($this->pila);
			}

			//Verifica si la pila esta vacia
			public function isEmpty(){
				return empty($this->pila);
			}

			//Devuelve el tamaño de la pila
			public function length(){
				return count($this->pila);
			}

			//Imprime el elemento tope de la pila (tope) pero sin removerlo
			public function peek(){
				return $this->pila[($this->length()-1)];
			}
		}
		function generate_string($length) {  //Funcion donde se genera la cadena
		    $characters = '01'; //Caracteres de 01
		    $charactersLength = strlen($characters); //Lee los caracteres
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) { //Ciclo donde se genera la cadena completa del tamaño n
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString; //Regresa la cadena creada
		} 
	if($cadena<>"aleatorio")  // Lee se en el campo POST si es la cadena 01 manual o aleatorio
	{
		$tamaño = strlen($cadena)-1; // Lee el tamaño de la cadena manual
		$fila = new Pila($tamaño); // Crea la pila
		$manual=fopen("manual_automata_pila.txt","w"); // Crea o sobre-escribe el archivo txt
		$c=$a=0;
		while($a<=$tamaño) // Ciclo donde recorre el tamaño de la cadena
		{
			$numero=$cadena[$a]; //Guarda la posicion de la cadena en la variable numero
			$z=substr($cadena,$a); //Extrae el caracter de la cadena
			echo $z."<br/>"; //Imprime el caracter
			if($numero==0) //Analiza si es cero el caracter
			{
				$fila->push('X'); //Apila en la pila
				$Guardado[$c]=$z; //Guarda en el arreglo para mostrar lo en el txt
				$c++; //Suma en el contador de control
				print_r($fila); //Muestra la Pila
				$Guardado[$c]=print_r($fila,true); //Guarda el muestro de la pila y lo muestra en el txt
				echo "<br/>"; //Salto de linea
				$c++; //Suma en el contador de control
			}
			elseif($numero==1) //Analiza si es un 1 el caracter
				{
					$fila->pop(); //Desapila de la pila
					$Guardado[$c]=$z; //Guarda en el arreglo para mostrar lo en el txt
					$c++; //Suma en el contador de control
					print_r($fila); //Muestra la Pila
					$Guardado[$c]=print_r($fila,true); //Guarda el muestro de la pila y lo muestra en el txt
					echo "<br/>"; //Salto de linea
					$c++; //Suma en el contador de control
				}
		$a++; // Suma en la posicion de la cadena
		}
		if($fila->isEmpty()) // Analiza si al Pila esta vacia
		{ // Si esta vacia es una cadena Palindroma
			$si="La cadena es palindroma."; 
			echo $si. "<br>";
			$Guardado[$c]=$si; //Se guarda en el arreglo para mostrar en el txt
		}
		else
		{ // Si no esta vacia es una cadena no Palindroma
			$no="La cadena no es palindroma.";
			echo $no."<br>";
			$Guardado[$c]=$no; //Se guarda en el arreglo para mostrar en el txt
		}
		foreach ($Guardado as $key => $value) // Se muestra todo el arreglo y se guarda en el txt
		{
			fwrite($manual,$value.PHP_EOL);
		}
		fclose($manual); // Se cierra el archivo txt
	}
	else
	{
		$numero=rand(21,100); // Se genera un valor aleatorio para el tamaño de la cadena
		$cad=generate_string($numero); // Genera la cadena de 01 de tamaño n
		$fila = new Pila($numero); // Crea la pila
		$aleatorio=fopen("aleatorio_automata_pila.txt","w"); // Crea el archvio o sobre-escribe el archivo
		$d=$b=0; 
		echo $cad."<br/>";
		echo "<center>Proceso automata pila aleatorio</center><br/><br/>";
		while($b<$numero) //Ciclo donde recorre el tamaño de la cadena
		{
			$posicion=$cad[$b]; //Guarda la posicion de la cadena en la variable numero
			$z=substr($cad,$b); //Extrae el caracter de la cadena
			echo $z."<br/>"; //Imprime el caracter
			if($posicion==0) //Analiza si es cero el caracter
			{
				$fila->push('X'); //Apila en la pila
				$Guardado[$d]=$z; //Guarda en el arreglo para mostrar lo en el txt
				$d++; //Suma en el contador de control
				print_r($fila); //Muestra la Pila
				$Guardado[$d]=print_r($fila,true); //Guarda el muestro de la pila y lo muestra en el txt
				echo "<br/>"; //Salto de linea
				$d++; //Suma en el contador de control
			}
			elseif($posicion==1) //Analiza si es un 1 el caracter
				{
					$fila->pop(); //Desapila de la pila
					$Guardado[$d]=$z; //Guarda en el arreglo para mostrar lo en el txt
					$d++; //Suma en el contador de control
					print_r($fila); //Muestra la Pila
					$Guardado[$d]=print_r($fila,true); //Guarda el muestro de la pila y lo muestra en el txt
					echo "<br/>"; //Salto de linea
					$d++; //Suma en el contador de control
				}
			$b++; // Suma en la posicion de la cadena
			}
		if($fila->isEmpty()) // Analiza si al Pila esta vacia
		{ // Si esta vacia es una cadena Palindroma
			$si="La cadena es palindroma.";
			echo $si."<br>";
			$Guardado[$d]=$si; //Se guarda en el arreglo para mostrar en el txt
		}
		else
		{ // Si no esta vacia es una cadena no Palindroma
			$no="La cadena no es palindroma.";
			echo $no."<br/>";
			$Guardado[$d]=$no; //Se guarda en el arreglo para mostrar en el txt
		}
		foreach ($Guardado as $key => $value) // Se muestra todo el arreglo y se guarda en el txt
		{
			fwrite($aleatorio,$value.PHP_EOL);
		}
		fclose($aleatorio); // Se cierra el archivo txt
	}
?>
</body>
<footer>
		
			<center><h4>Sanchez Zavala Carlos Enrique</h4></center>
			<center><h4>2CM11</h4></center>
			<center><h4>Teoria Computacional</h4></center>
		
</footer>
</html>
