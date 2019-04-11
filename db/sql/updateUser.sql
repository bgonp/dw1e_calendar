UPDATE usuario
SET usuario.pass = {{PASS}}, usuario.mail = {{MAIL}}
WHERE usuario.id = {{ID}};