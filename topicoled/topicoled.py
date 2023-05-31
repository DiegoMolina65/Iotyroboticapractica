from flask import Flask, request

app = Flask(__name__)

@app.route('/led', methods=['POST'])
def control_led():
    data = request.get_json()
    estado = data['estado']
    
    # Aquí puedes implementar la lógica para controlar el LED según el estado recibido
    
    return 'OK'

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
