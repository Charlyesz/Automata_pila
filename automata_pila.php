<?php
$Guardado=Array();
?>
<html>
<title>Practica No. 5</title>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<h1><center> Practica No. 5 <br /></center></h1>
	<center> Automata Pila </center>
	<center>Manual (Max 20) o aleatorio</center>
<form method="post" align="center">
<h4>Ingresa tu cadena iniciando con 0 ó escribe aleatorio<input class="boton" type="search" name="total" MAXLENGTH=20 size="25"><a><input type="submit" class="boton" value="Generar"></a></h4>
</form>
<?php
	$cadena=$_POST['total'];
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
		function generate_string($length) {
		    $characters = '01';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		} 
	if($cadena<>"aleatorio")
	{
		$tamaño = strlen($cadena)-1;
		$fila = new Pila($tamaño);
		$manual=fopen("manual_automata_pila.txt","w");
		$a=0;
		$c=0;
		echo "<center>Proceso automata pila manual</center><br/><br/>";
		while($a<=$tamaño)
		{
			$numero=$cadena[$a];
			$z=substr($cadena,$a);
			echo $z."<br/>";
			if($numero==0)
			{
				$fila->push('X');
				$Guardado[$c]=$z;
				$c++;
				print_r($fila);
				$Guardado[$c]=print_r($fila,true);
				echo "<br/>";
				$c++;
			}
			elseif($numero==1)
				{
					$fila->pop();
					$Guardado[$c]=$z;
					$c++;
					print_r($fila);
					$Guardado[$c]=print_r($fila,true);
					echo "<br/>";
					$c++;
				}
		$a++;
		}
		if($fila->isEmpty())
		{
			$si="La cadena es palindroma.";
			echo "<br>";
			$Guardado[$c]=$si;
		}
		else
		{
			$no="La cadena no es palindroma.";
			echo $no."<br>";
			$Guardado[$c]=$si;
		}
		foreach ($Guardado as $key => $value) 
		{
			fwrite($manual,$value.PHP_EOL);
		}
		fclose($manual);
	}
	else
	{
		$numero=rand(21,1000);
		$cad=generate_string($numero);
		$fila = new Pila($numero);
		$aleatorio=fopen("aleatorio_automata_pila.txt","w");
		$d=0;
		$b=0;
		echo $cad."<br/>";
		echo "<center>Proceso automata pila aleatorio</center><br/><br/>";
		while($b<$numero)
		{
			$posicion=$cad[$b];
			$z=substr($cad,$b);
			echo $z."<br/>";
			if($posicion==0)
			{
				$fila->push('X');
				$Guardado[$d]=$z;
				$d++;
				print_r($fila);
				$Guardado[$d]=print_r($fila,true);
				echo "<br/>";
				$d++;
			}
			elseif($posicion==1)
				{
					$fila->pop();
					$Guardado[$d]=$z;
					$d++;
					print_r($fila);
					$Guardado[$d]=print_r($fila,true);
					echo "<br/>";
					$d++;
				}
			$b++;
			}
		if($fila->isEmpty())
		{
			$si="La cadena es palindroma.";
			echo $si."<br>";
			$Guardado[$d]=$si;
		}
		else
		{
			$no="La cadena no es palindroma.";
			echo $no."<br/>";
			$Guardado[$d]=$no;
		}
		foreach ($Guardado as $key => $value) 
		{
			fwrite($aleatorio,$value.PHP_EOL);
		}
		fclose($aleatorio);
	}
?>
</body>
<footer>
	<table align="center">
		<tr>
			<th>Sanchez Zavala Carlos Enrique</th>
			<th>2CM11</th>
			<th>Teoria Computacional</th>
		</tr>
	</table>
</footer>
</html>