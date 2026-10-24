#importamos libreria de flask
from flask import Flask, redirect, render_template, request

#Importar la libreria de MYSQL para flask

from flask_mysqldb import MySQL

#Importar librerias para generar un hash y para 
# comprobar que el hash coincida con la contraseña

from werkzeug.security import generate_password_hash, check_password_hash

app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"]=True

@app.route("/")
def home():
    return render_template("login.html")

@app.route("/registro", methods=("GET", "POST"))
def registro():
    if request.method == "POST":
        nombre = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password_hash = request.form["password_hash"]
        id_rol = request.form["id_rol"]

        password = generate_password_hash(password_hash)

#configuracion de la conexion
app.config[ 'MYSQL_HOST' ] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'dbFlask'
app.secret_key = 'mysecretkey'

mysql = MySQL(app)


if __name__ == '__main__':
    app.run(port=5000, debug=True)