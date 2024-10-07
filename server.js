const express = require('express');
const fs = require('fs'); // Para leer el archivo JSON
const app = express();
const PORT = 3000;

// Ruta para obtener los productos
app.get('/api/productos', (req, res) => {
    fs.readFile('./productos.json', 'utf8', (err, data) => {
        if (err) {
            return res.status(500).json({ error: 'Error al leer el archivo' });
        }
        const productos = JSON.parse(data);
        res.json(productos);
    });
});

app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
