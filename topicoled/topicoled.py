import paho.mqtt.client as mqtt
import time

# Configuración del cliente MQTT
broker_host = "104.154.170.98"
broker_port = 1883
client = mqtt.Client()

# Configuración de las credenciales de autenticación (si es necesario)
client.username_pw_set(username="diegomolina", password="diegomolina")

# Función para manejar la conexión establecida con el broker MQTT
def on_connect(client, userdata, flags, rc):
    print("Conectado al broker MQTT")
    # Suscribirse al tópico del LED después de la conexión establecida
    client.subscribe("led_topic")

# Función para manejar los mensajes recibidos desde el tópico
def on_message(client, userdata, msg):
    print("Mensaje recibido: " + msg.payload.decode())

# Configuración de los manejadores de eventos
client.on_connect = on_connect
client.on_message = on_message

# Conexión al broker MQTT
client.connect(broker_host, broker_port, 60)

# Bucle principal para mantener la conexión y procesar los mensajes
client.loop_start()

# Esperar a que la conexión se establezca
time.sleep(1)

# Detener el bucle principal y desconectarse del broker MQTT
client.loop_stop()
client.disconnect()
