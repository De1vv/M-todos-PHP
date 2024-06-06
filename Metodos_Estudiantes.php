<?php

class Estudiante {
    private $nombre;
    private $edad;
    private $carrera;

    // Constructor
    public function __construct($nombre, $edad, $carrera) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->carrera = $carrera;
    }

    // Método para mostrar la información del estudiante
    public function mostrarInformacion() {
        echo "Nombre: " . $this->nombre . "\n";
        echo "Edad: " . $this->edad . "\n";
        echo "Carrera: " . $this->carrera . "\n\n";
    }

    // Método para mostrar la información de todos los estudiantes
    public static function mostrarTodosEstudiantes($estudiantes) {
        echo "Información de los estudiantes:\n";
        foreach ($estudiantes as $estudiante) {
            $estudiante->mostrarInformacion();
        }
    }

    // Método para mostrar la información de un estudiante específico
    public static function mostrarEstudianteEspecifico($estudiantes, $numeroEstudiante) {
        if ($numeroEstudiante >= 1 && $numeroEstudiante <= count($estudiantes)) {
            $estudiantes[$numeroEstudiante - 1]->mostrarInformacion();
        } else {
            echo "Número de estudiante inválido.\n";
        }
    }
}

// Lógica principal
$estudiantes = [];
$cantidadEstudiantes = 5;

for ($i = 0; $i < $cantidadEstudiantes; $i++) {
    echo "Ingrese el nombre del estudiante " . ($i + 1) . ":\n";
    $nombre = trim(fgets(STDIN));

    echo "Ingrese la edad del estudiante " . ($i + 1) . ":\n";
    while (true) {
        $edad = trim(fgets(STDIN));
        if (is_numeric($edad) && (int)$edad == $edad) {
            $edad = (int)$edad;
            break;
        }
        echo "Por favor, ingrese un número válido para la edad.\n";
    }

    echo "Ingrese la carrera del estudiante " . ($i + 1) . ":\n";
    $carrera = trim(fgets(STDIN));

    $estudiantes[] = new Estudiante($nombre, $edad, $carrera);
}

// Mostrar la información de todos los estudiantes
Estudiante::mostrarTodosEstudiantes($estudiantes);

// Pedir al usuario que ingrese el número del estudiante que quiere ver
echo "Ingrese el número del estudiante que desea ver (1 a 5):\n";
$numeroEstudiante = trim(fgets(STDIN));
if (is_numeric($numeroEstudiante) && (int)$numeroEstudiante == $numeroEstudiante) {
    $numeroEstudiante = (int)$numeroEstudiante;
    Estudiante::mostrarEstudianteEspecifico($estudiantes, $numeroEstudiante);
} else {
    echo "Número de estudiante inválido.\n";
}

?>
