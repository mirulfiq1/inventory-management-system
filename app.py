from flask import Flask, jsonify
import datetime

app = Flask(__name__)

@app.route('/api/clock', methods=['GET'])
def get_current_time():
    now = datetime.datetime.utcnow()
    formatted_time = now.strftime('%Y-%m-%d %H:%M:%S UTC')
    return jsonify({'time': formatted_time})

if __name__ == '__main__':
    app.run(debug=True)