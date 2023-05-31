from flask import Flask, request

app = Flask(__name__)

# Ruta para encender el LED
@app.route('/encender_led', methods=['POST'])
def encender_led():
    # Lógica para encender el LED aquí
    print("Encender LED")
    return 'LED encendido'

# Ruta para apagar el LED
@app.route('/apagar_led', methods=['POST'])
def apagar_led():
    # Lógica para apagar el LED aquí
    print("Apagar LED")
    return 'LED apagado'

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
