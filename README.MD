# Lab: Catálogo de Patrones en BovWeight CR

**Curso:** IF7100 – Ingeniería del Software I
**Proyecto:** LabCatalogoPatrones

---

# Descripción General

En este laboratorio se implementaron cuatro patrones de diseño clásicos para resolver problemas comunes de arquitectura de software en el sistema BovWeight CR.

Los patrones implementados fueron:

1. Factory
2. Repository
3. Observer
4. Strategy

Cada patrón se desarrolló dentro del mismo proyecto, utilizando una estructura organizada por carpetas (`Contracts`, `Factories`, `Repositories`, `Observers`, `Strategies`, `Services`, `ValueObjects`, `Models`, `Domain`).

---

# 1. Factory

## ¿Qué es?

El patrón Factory centraliza la creación de objetos.

En lugar de usar directamente instrucciones como:

```php
new Brahman();
new Nelore();
```

se utiliza una clase fábrica que decide cuál objeto crear.

## Problema que resuelve

Si la creación de objetos está dispersa en muchos archivos, cualquier cambio obliga a modificar múltiples puntos del sistema.

## Solución implementada

Se creó una fábrica llamada `RazaFactory` que recibe el nombre de una raza y devuelve la instancia correspondiente.

## Archivos creados

* `Contracts/IRazaFactory.php`
* `Factories/RazaFactory.php`
* `Domain/Razas/Raza.php`
* `Domain/Razas/Brahman.php`
* `Domain/Razas/Nelore.php`
* `Domain/Razas/Angus.php`

## Beneficios

* La creación de objetos queda centralizada.
* Agregar una nueva raza es sencillo.
* El código cliente no depende de clases concretas.

---

# 2. Repository

## ¿Qué es?

El patrón Repository abstrae el acceso a los datos.

La lógica de negocio no consulta directamente la base de datos, sino que utiliza una interfaz.

## Problema que resuelve

Cuando el código usa directamente consultas a la base de datos, queda acoplado al ORM o a la tecnología de persistencia.

## Solución implementada

Se definió la interfaz `IAnimalRepository` y dos implementaciones:

* `EloquentAnimalRepository`
* `InMemoryAnimalRepository`

El servicio `ReporteService` utiliza la interfaz en lugar de acceder directamente a los datos.

## Archivos creados

* `Contracts/IAnimalRepository.php`
* `Repositories/EloquentAnimalRepository.php`
* `Repositories/InMemoryAnimalRepository.php`
* `Models/Animal.php`
* `Services/ReporteService.php`

## Beneficios

* La lógica de negocio no depende de Eloquent.
* Es más fácil cambiar la tecnología de persistencia.
* Se facilitan las pruebas unitarias.

---

# 3. Observer

## ¿Qué es?

El patrón Observer permite que varios objetos reaccionen automáticamente cuando ocurre un evento.

## Problema que resuelve

Cuando una acción debe desencadenar muchas tareas (notificar, recalcular, enviar webhooks, etc.), el código se vuelve grande y fuertemente acoplado.

## Solución implementada

Se creó un `RegistroPesoSubject` que mantiene una lista de observadores.

Cada vez que se registra un peso, todos los observadores reciben la notificación.

## Observadores implementados

* `NotificadorPropietario`
* `RecalculadorICC`
* `WebhookSenasa`
* `AlertaSMS`

## Archivos creados

* `Contracts/IRegistroPesoObserver.php`
* `Models/RegistroPeso.php`
* `Observers/RegistroPesoSubject.php`
* `Observers/NotificadorPropietario.php`
* `Observers/RecalculadorICC.php`
* `Observers/WebhookSenasa.php`
* `Observers/AlertaSMS.php`

## Beneficios

* El sujeto no conoce los detalles de los observadores.
* Se pueden agregar nuevos observadores sin modificar el código existente.
* Reduce el acoplamiento.

---

# 4. Strategy

## ¿Qué es?

El patrón Strategy encapsula diferentes algoritmos que resuelven el mismo problema.

## Problema que resuelve

Evita estructuras grandes de `if/else` o `switch` para seleccionar entre múltiples algoritmos.

## Solución implementada

Se creó la interfaz `IAlgoritmoEstimacion` y tres estrategias concretas:

* `AlgoritmoYolov8`
* `AlgoritmoRegresionLineal`
* `AlgoritmoTablaReferencia`

El servicio `EstimadorPesoService` recibe una estrategia y la ejecuta.

## Archivos creados

* `Contracts/IAlgoritmoEstimacion.php`
* `ValueObjects/ResultadoEstimacion.php`
* `Strategies/AlgoritmoYolov8.php`
* `Strategies/AlgoritmoRegresionLineal.php`
* `Strategies/AlgoritmoTablaReferencia.php`
* `Services/EstimadorPesoService.php`

## Beneficios

* Cada algoritmo está en su propia clase.
* Es fácil agregar nuevos métodos de estimación.
* El servicio principal no necesita modificarse.

---

# Estructura General del Proyecto

```text
LabCatalogoPatrones/
└── app/
    ├── Contracts/
    ├── Domain/
    ├── Factories/
    ├── Models/
    ├── Observers/
    ├── Repositories/
    ├── Services/
    ├── Strategies/
    └── ValueObjects/
```

---

# Conclusiones

La aplicación de patrones de diseño permite:

* Reducir el acoplamiento entre clases.
* Facilitar la extensión del sistema.
* Mejorar la mantenibilidad del código.
* Favorecer las pruebas unitarias.
* Organizar mejor la arquitectura del software.

Cada patrón resuelve un problema específico:

| Patrón     | Objetivo Principal                         |
| ---------- | ------------------------------------------ |
| Factory    | Centralizar la creación de objetos         |
| Repository | Abstraer el acceso a los datos             |
| Observer   | Notificar múltiples objetos ante un evento |
| Strategy   | Intercambiar algoritmos fácilmente         |

---

# Autor

Alexander
