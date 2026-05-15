# Lab: Catálogo de Patrones en BovWeight CR

**Curso:** IF7100 – Ingeniería del Software I
**Proyecto:** LabCatalogoPatrones

---

# Descripción General

En este laboratorio se implementaron cuatro patrones de diseño en un único proyecto:

1. Factory
2. Repository
3. Observer
4. Strategy

Además, se incluyó:

* Un archivo `README.md` con la explicación del proyecto.
* Una prueba (`RegistroPesoSubjectTest.php`) para verificar el patrón Observer.
* Ejemplos y comentarios en el código para facilitar el estudio.

---

# Estructura General del Proyecto

```text
LabCatalogoPatrones/
├── app/
│   ├── Contracts/
│   ├── Domain/
│   ├── Factories/
│   ├── Models/
│   ├── Observers/
│   ├── Repositories/
│   ├── Services/
│   ├── Strategies/
│   ├── ValueObjects/
│   └── tests/
└── README.md
```

---

# 1. Factory

## ¿Qué es?

El patrón Factory centraliza la creación de objetos.

En lugar de crear objetos directamente con `new Brahman()` o `new Nelore()`, se utiliza una fábrica (`RazaFactory`) que decide qué clase instanciar.

## Problema que resuelve

Cuando la creación de objetos está dispersa en muchos archivos, cualquier cambio obliga a modificar varios puntos del sistema.

## Implementación realizada

Se creó:

* `IRazaFactory`
* `RazaFactory`
* `Raza`
* `Brahman`
* `Nelore`
* `Angus`

La clase `RazaFactory` utiliza un arreglo asociativo para mapear el nombre de la raza a la clase correspondiente.

## Beneficios

* Centraliza la creación de objetos.
* Facilita agregar nuevas razas.
* Evita dependencias directas con clases concretas.

---

# 2. Repository

## ¿Qué es?

El patrón Repository abstrae el acceso a los datos.

La lógica de negocio no consulta directamente la base de datos, sino que utiliza una interfaz con métodos del dominio.

## Problema que resuelve

Evita que los servicios dependan directamente del ORM o de la base de datos.

## Implementación realizada

Se creó:

* `IAnimalRepository`
* `EloquentAnimalRepository`
* `InMemoryAnimalRepository`
* `Animal`
* `ReporteService`

`ReporteService` recibe `IAnimalRepository` por inyección de dependencias.

## Beneficios

* Permite cambiar la fuente de datos fácilmente.
* Facilita las pruebas unitarias.
* Reduce el acoplamiento.

---

# 3. Observer

## ¿Qué es?

El patrón Observer permite que varios objetos reaccionen automáticamente cuando ocurre un evento.

## Problema que resuelve

Evita que una sola clase tenga que llamar manualmente a muchos procesos secundarios.

## Implementación realizada

Se creó:

* `IRegistroPesoObserver`
* `RegistroPesoSubject`
* `NotificadorPropietario`
* `RecalculadorICC`
* `WebhookSenasa`
* `AlertaSMS`
* `RegistroPeso`

Cuando se registra un peso, el subject notifica a todos los observadores suscritos.

## Prueba incluida

Se agregó el archivo:

* `app/tests/RegistroPesoSubjectTest.php`

Esta prueba utiliza spies para verificar que todos los observadores reciben la notificación.

## Beneficios

* Permite agregar nuevos observadores sin modificar el subject.
* Reduce el acoplamiento.
* Facilita la extensión del sistema.

---

# 4. Strategy

## ¿Qué es?

El patrón Strategy encapsula diferentes algoritmos en clases separadas.

## Problema que resuelve

Evita el uso de grandes estructuras `if/else` o `switch` para seleccionar algoritmos.

## Implementación realizada

Se creó:

* `IAlgoritmoEstimacion`
* `ResultadoEstimacion`
* `AlgoritmoYolov8`
* `AlgoritmoRegresionLineal`
* `AlgoritmoTablaReferencia`
* `EstimadorPesoService`

`EstimadorPesoService` recibe una estrategia por constructor y la ejecuta.

## Beneficios

* Cada algoritmo está separado en su propia clase.
* Es fácil agregar nuevas estrategias.
* El servicio principal no necesita modificarse.

---

# Archivos Adicionales

## README.md

Documento con la explicación de cada patrón y el resumen del laboratorio.

## Prueba del Observer

`app/tests/RegistroPesoSubjectTest.php` verifica que todos los observadores suscritos reciben la notificación.

---

# Notas sobre Laravel

El PDF menciona registrar dependencias en el contenedor de Laravel (`singleton` y `bind`). Como este proyecto no es una aplicación Laravel completa, estas configuraciones no se ejecutan, pero el diseño del código sí sigue el mismo enfoque de inyección de dependencias.

---

# Conclusiones

La aplicación de patrones de diseño permitió:

* Reducir el acoplamiento entre clases.
* Facilitar la extensión del sistema.
* Mejorar la organización del código.
* Hacer el sistema más fácil de probar.

| Patrón     | Objetivo                           |
| ---------- | ---------------------------------- |
| Factory    | Centralizar la creación de objetos |
| Repository | Abstr                              |
