# LIBRERÍAS
from flask import Flask, flash, redirect, render_template, request, url_for
from flask_mysqldb import MySQL

app = Flask(__name__)

app.config["TEMPLATES_AUTO_RELOAD"] = True

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'examen2doparcial'

app.secret_key = 'mysecretkey'

mysql = MySQL(app)


@app.route('/')
def index():
    con = mysql.connection.cursor()
    con.execute('SELECT id, matricula, nombre, materia, calificacion FROM tb_calificaciones')
    conCalificaciones = con.fetchall()
    con.close()
    return render_template('index.html', listCalificaciones=conCalificaciones)


@app.route('/guardar', methods=['POST'])
def guardar():
    if request.method == 'POST':
        matricula = request.form['txtMatricula']
        nombre = request.form['txtNombre']
        materia = request.form['txtMateria']
        calificacion = request.form['txtCalificacion']

        """ CONEXIÓN CON LA BD Y EJECUCIÓN DEL INSERT """
        con = mysql.connection.cursor()
        con.execute(
            'INSERT INTO tb_calificaciones(matricula, nombre, materia, calificacion) VALUES(%s, %s, %s, %s)',
            (matricula, nombre, materia, calificacion)
        )
        mysql.connection.commit()
        con.close()

        flash('La calificación fue agregada correctamente!')
    return redirect(url_for('index'))


@app.route('/editar/<int:id>')
def editar(id):
    con = mysql.connection.cursor()
    con.execute('SELECT id, matricula, nombre, materia, calificacion FROM tb_calificaciones WHERE id=%s', (id,))
    consultarId = con.fetchone()
    con.close()
    return render_template('editarCal.html', Calificacion=consultarId, calificacion=consultarId)


@app.route('/actualizar/<int:id>', methods=['POST'])
def actualizar(id):
    if request.method == 'POST':
        matricula = request.form['txtMatricula']
        nombre = request.form['txtNombre']
        materia = request.form['txtMateria']
        calificacion = request.form['txtCalificacion']

        con = mysql.connection.cursor()
        con.execute(
            'UPDATE tb_calificaciones SET matricula=%s, nombre=%s, materia=%s, calificacion=%s WHERE id=%s',
            (matricula, nombre, materia, calificacion, id)
        )
        mysql.connection.commit()
        con.close()

        flash('Se actualizó la calificación de ' + nombre)
    return redirect(url_for('index'))


@app.route('/eliminar/<int:id>', methods=['GET', 'POST'])
def eliminar(id):
    con = mysql.connection.cursor()
    if request.method == 'POST':
        nombre = request.form.get('txtNombre', '')
        con.execute('DELETE FROM tb_calificaciones WHERE id=%s', (id,))
        mysql.connection.commit()
        con.close()
        flash('Se eliminó la calificación de ' + nombre)
        return redirect(url_for('index'))


    con.execute('SELECT id, matricula, nombre, materia, calificacion FROM tb_calificaciones WHERE id=%s', (id,))
    consultarId = con.fetchone()
    con.close()
    return render_template('eliminarCal.html', Calificacion=consultarId, calificacion=consultarId)


if __name__ == '__main__':
    app.run(debug=True)
