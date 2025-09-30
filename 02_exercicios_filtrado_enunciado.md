# Ejercicios de Sanitización y Validación en PHP

## Ejercicio 1. Sanitización básica de cadenas
Crea un script que reciba varios textos con etiquetas HTML y código potencialmente malicioso.  
**Objetivo:**  
- Sanitizar las cadenas eliminando las etiquetas.  
- Mostrar el **original** y el **sanitizado**.  

Ejemplo de entradas:
```php
"<b>Hola</b> mundo",
"<script>alert('hack');</script> Bienvenido",
"<h1>Título</h1> con <a href='#'>link</a>"
```

---

## Ejercicio 2. Validar enteros y detectar errores con `0`
Pide al usuario que introduzca un número (puede venir como string) y valida si es un entero válido. Comprueba los siguientes valores:
```php
$valores = ["123", "0", "abc", -5];
```


---

## Ejercicio 3. Validar direcciones IP
Crea una lista de posibles IPs y valida cuáles son correctas y cuáles no.  

Incluye casos como:
- `192.168.1.1`  
- `256.100.50.25`  
- `127.0.0.1`  
- `::1` (IPv6 válida)  
- `127.0.0.999`  

---

## Ejercicio 4. Sanitizar y validar emails
Dado un array de emails con errores comunes:  
```php
$emails = [
  "usuario<script>@gmail.com",
  "correo@@empresa.com",
  "nombre con espacios@correo.com",
  "normal@email.com"
];
```


**Objetivo:**  
- Sanitizar primero y luego validar.  
- Imprimir una tabla con columnas: **original – sanitizado – válido (sí/no)**.

---

## Ejercicio 5. Sanitizar y validar URLs
Crea un array con URLs sospechosas:  

```php
[
  "http://mi sitio.com/test page",
  "https://ejemplo.com/\nmal",
  "https://google.com"
]
```

**Objetivo:**  
- Sanitizar y validar.  
- Marcar las que son correctas.

---

## Ejercicio 6. Validar entero dentro de un rango
Solicita al usuario un número del 1 al 10. Comprueba si son válidos:
```php
$valores = [0, 5, 10, 11, -3];
```

**Objetivo:**  
- Mostrar si está dentro del rango o no.
