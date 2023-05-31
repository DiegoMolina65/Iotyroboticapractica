from flask import Flask, request

app = Flask(__name__)

# Estado inicial del LED
led_encendido = False

# Ruta para encender el LED
@app.route('/encender_led', methods=['POST'])
def encender_led():
    global led_encendido
    if not led_encendido:
        led_encendido = True
        print("LED encendido")
        return 'LED encendido'
    else:
        return 'LED ya está encendido'

# Ruta para apagar el LED
@app.route('/apagar_led', methods=['POST'])
def apagar_led():
    global led_encendido
    if led_encendido:
        led_encendido = False
        print("LED apagado")
        return 'LED apagado'
    else:
        return 'LED ya está apagado'

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
