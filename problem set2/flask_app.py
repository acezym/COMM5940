from flask import Flask, render_template, request, json, redirect, session
from flask import Markup
import requests

app = Flask(__name__)

@app.route('/')
def index():
    r = requests.get('https://api.airtable.com/v0/appfgqMQ6au7WZV26/WTA_Calendar2019?api_key=keyGHT4s0GhgAfOSe')
    dict = r.json()
    dataset = []
    for i in dict['records']:
            dict = i['fields']
            dataset.append(dict)
    return render_template('index.html', entries=dataset, title='WTA Calendar')